<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="includes/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="includes/style.css">
    <title>simpleBackup</title>
</head>

<?php
    error_reporting(E_ALL);
    date_default_timezone_set('Europe/Berlin');
    
    require('config_backup.php');
    
    if (isset($_POST['start'])) {
        if ($doFileBackup) {
            require('backup_files.php');
        }
        if ($doDBBackup) {
            require('backup_db.php');
        }
        if (!$doFileBackup && !$doDBBackup) {
            $output = '<div class="alert-danger">Das Script soll weder ein Datei- noch ein Datenbank-Backup machen. Es bricht nun ab.</div>';
        }
    }
?>

<body>
    <h1>simple-backup</h1>
    <hr>
    <form action="" method="post">
        <input type="submit" value="Backup starten" name="start">
    </form>
    <div class="alert"><?php 
    if (isset($output)) {
        echo $output;
    }
    ?></div>
</body>
</html>