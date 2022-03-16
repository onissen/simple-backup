<?php

    include_once('includes/Mysqldump.php');
    
    $dump = new Ifsnop\Mysqldump\Mysqldump("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
    $dump->start($dbFile);
    
    
?>