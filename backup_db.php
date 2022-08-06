<?php

    include_once('includes/Mysqldump.php');
    
    if (!isset($dumpSettings)) {
        $dumpSettings = array();
    }

    $dump = new Ifsnop\Mysqldump\Mysqldump("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword, $dumpSettings);
    $dump->start($dbFile);
    $output .= '<div class="alert-success">Datenbank-Backup erstellt<br>Der Dateiname ist '.$dbFile.'</div>'
?>