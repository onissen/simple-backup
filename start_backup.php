<?php
    error_reporting(E_ALL);
    date_default_timezone_set('Europe/Berlin');
    
    require('config_backup.php');

    if ($doFileBackup) {
        require('backup_files.php');
    }
    if ($doDBBackup) {
        require('backup_db.php');
    }
    if (!$doFileBackup && !$doDBBackup) {
        echo "Das Script soll weder ein Datei- noch ein Datenbank-Backup machen. Es bricht nun ab.";
    }
?>