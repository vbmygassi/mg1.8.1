<?php
require_once("mygassi-config.php");
$dest =  SQLDumpDirPath . date("U") . ".sql";
exec("mysqldump --user=root --password=2317.187.fuckingsuck --host=localhost mg6 > " . $dest);
