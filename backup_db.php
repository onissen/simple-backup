<?php

    include_once('includes/Mysqldump.php');
    
    $dump = new Ifsnop\Mysqldump\Mysqldump("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $dump->start($dbFile);
    $output .= '<div class="alert-success">Datenbank-Backup erstellt<br>Der Dateiname ist '.$dbFile.'</div>'
?>