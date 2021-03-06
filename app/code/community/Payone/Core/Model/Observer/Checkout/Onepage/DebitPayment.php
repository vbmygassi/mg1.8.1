<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License (GPL 3)
 * that is bundled with this package in the file LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Payone_Core to newer
 * versions in the future. If you wish to customize Payone_Core for your
 * needs please refer to http://www.payone.de for more information.
 *
 * @category        Payone
 * @package         Payone_Core_Model
 * @subpackage      Observer
 * @copyright       Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @author          Matthias Walter <info@noovias.com>
 * @license         <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link            http://www.noovias.com
 */

/**
 *
 * @category        Payone
 * @package         Payone_Core_Model
 * @subpackage      Observer
 * @copyright       Copyright (c) 2012 <info@noovias.com> - www.noovias.com
 * @license         <http://www.gnu.org/licenses/> GNU General Public License (GPL 3)
 * @link            http://www.noovias.com
 */
class Payone_Core_Model_Observer_Checkout_Onepage_DebitPayment extends Payone_Core_Model_Observer_Abstract
{
    /** @var array */
    protected $paymentData = array();

    /** @var Mage_Sales_Model_Quote */
    protected $quote = null;

    /** @var Payone_Core_Model_Config_Payment_Method_Interface */
    protected $paymentConfig = null;

    /**
     * @param Varien_Event_Observer $observer
     * @return void
     */
    public function performChecks(Varien_Event_Observer $observer)
    {
        $this->init($observer);

        $paymentConfig = $this->getPaymentConfig();
        $sepaMandateEnabled = $paymentConfig->isSepaMandateEnabled();
        $checkBankaccountEnabled = $paymentConfig->isBankAccountCheckEnabled();
        $bankaccountcheckType = $paymentConfig->getBankAccountCheckType();

        if ((!$sepaMandateEnabled and $checkBankaccountEnabled)
            or ($sepaMandateEnabled and $checkBankaccountEnabled and $bankaccountcheckType == Payone_Api_Enum_BankaccountCheckType::POS_BLACKLIST)) {
            $this->performBankaccountCheck();
        }

        if ($sepaMandateEnabled) {
            $this->manageMandate();
        }
    }

    /**
     * @throws Payone_Core_Exception_PaymentMethodConfigNotFound|Mage_Core_Exception
     */
    protected function performBankaccountCheck()
    {
        $paymentData = $this->getPaymentData();

        $paymentConfig = $this->getPaymentConfig();
        $paymentMethodConfigId = $paymentConfig->getId();

        if (!$paymentConfig->isBankAccountCheckEnabled()) {
            return; // Check disabled, abort.
        }

        // Gather data:
        $bankAccountNumber = array_key_exists('payone_account_number', $paymentData) ? $paymentData['payone_account_number'] : '';
        $bankCode = array_key_exists('payone_bank_code', $paymentData) ? $paymentData['payone_bank_code'] : '';
        $iban = array_key_exists('payone_sepa_iban', $paymentData) ? $paymentData['payone_sepa_iban'] : '';
        $bic = array_key_exists('payone_sepa_bic', $paymentData) ? $paymentData['payone_sepa_bic'] : '';
        $bankCountry = array_key_exists('payone_bank_country', $paymentData) ? $paymentData['payone_bank_country'] : '';


        // Perform check:
        $serviceBankaccountCheck = $this->getFactory()
            ->getServiceVerificationBankAccountCheck($paymentMethodConfigId, $this->getQuote()->getStoreId());
        $serviceBankaccountCheck->execute($bankAccountNumber, $bankCode, $bankCountry, $iban, $bic);
    }

    /**
     *
     */
    protected function manageMandate()
    {
        $paymentConfig = $this->getPaymentConfig();
        $paymentData = $this->getPaymentData();

        $paymentMethodConfigId = $paymentData['payone_config_payment_method_id'];

        $manageMandateService = $this->getFactory()->getServiceManagementManageMandate($paymentMethodConfigId, $this->getQuote()->getStoreId());

        // Gather Data:
        $bankAccountNumber = array_key_exists('payone_account_number', $paymentData) ? $paymentData['payone_account_number'] : '';
        $bankCode = array_key_exists('payone_bank_code', $paymentData) ? $paymentData['payone_bank_code'] : '';
        $iban = array_key_exists('payone_sepa_iban', $paymentData) ? $paymentData['payone_sepa_iban'] : '';
        $bic = array_key_exists('payone_sepa_bic', $paymentData) ? $paymentData['payone_sepa_bic'] : '';
        $bankCountry = array_key_exists('payone_bank_country', $paymentData) ? $paymentData['payone_bank_country'] : '';

        $response = $manageMandateService->execute($this->getQuote(), $bankCountry, $bankAccountNumber, $bankCode, $bic, $iban);
        $mandateStatus = $response->getMandateStatus();
        $mandateText = $response->getMandateText();
        $mandateIdentification = $response->getMandateIdentification();
        $sepaMandateDownloadEnabled = $paymentConfig->getSepaMandateDownloadEnabled();

        $checkoutSession = $this->getFactory()->getSingletonCheckoutSession();
        $checkoutSession->setPayoneSepaMandateStatus($mandateStatus);
        $checkoutSession->setPayoneSepaMandateText($mandateText);
        $checkoutSession->setPayoneSepaMandateIdentification($mandateIdentification);
        $checkoutSession->setPayoneSepaMandateDownloadEnabled($sepaMandateDownloadEnabled);
    }

    /**
     * @param Varien_Event_Observer $observer
     * @throws Payone_Core_Exception_PaymentMethodConfigNotFound
     */
    protected function init(Varien_Event_Observer $observer)
    {
        $paymentData = $observer->getEvent()->getPaymentData();
        /** @var Mage_Sales_Model_Quote $quote */
        $quote = $observer->getEvent()->getQuote();
        $this->setPaymentData($paymentData);
        $this->setQuote($quote);

        // Determine if check must/can be performed:
        if (!array_key_exists('payone_config_payment_method_id', $paymentData)) {
            throw new Payone_Core_Exception_PaymentMethodConfigNotFound();
        }
        $paymentMethodConfigId = $paymentData['payone_config_payment_method_id'];
        if (empty($paymentMethodConfigId)) {
            throw new Payone_Core_Exception_PaymentMethodConfigNotFound();
        }

        $paymentConfig = $this->helperConfig()->getConfigPaymentMethodById($paymentMethodConfigId, $quote->getStoreId());
        $this->setPaymentConfig($paymentConfig);
    }

    /**
     * @param array $paymentData
     */
    public function setPaymentData(array $paymentData)
    {
        $this->paymentData = $paymentData;
    }

    /**
     * @return array
     */
    public function getPaymentData()
    {
        return $this->paymentData;
    }

    /**
     * @param Mage_Sales_Model_Quote $quote
     */
    public function setQuote(Mage_Sales_Model_Quote $quote)
    {
        $this->quote = $quote;
    }

    /**
     * @return Mage_Sales_Model_Quote
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param Payone_Core_Model_Config_Payment_Method_Interface $paymentConfig
     */
    public function setPaymentConfig($paymentConfig)
    {
        $this->paymentConfig = $paymentConfig;
    }

    /**
     * @return Payone_Core_Model_Config_Payment_Method_Interface
     */
    public function getPaymentConfig()
    {
        return $this->paymentConfig;
    }
}