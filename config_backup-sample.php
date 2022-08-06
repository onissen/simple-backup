<?php
    /* Hier Backup-MOdi an- und ausschalten */
    $doFileBackup = false;
    $doDBBackup = false;
    
    /* Core Einstellungen für Dateien-Backup */

    $excludeDirs = array(
        /* Ordner, die nicht gesichert werden sollen HIER ohne vorangestellten / angeben */
        /* Der .git Ordner sollte nicht gesichert werden, da lange Ladezeiten entstehen*/
        /* Der backup/backups- Ordner sollte nicht gesichert werden, sich dann die Backup-Dateien selbst backupen */
        'backup/backups' => 'backup/backups',
        '.git' => '.git'
    );

    $excludeFiles = array(
        /* Dateien, die nicht gesichert werden sollen HIER ohne vorangestellten angeben */
        // z.B. 'index.php' => 'index.php'
    );
    
    $projectPrefix = "prefix"; /* Präfix der normalerweise zum bennenen des $ArchiveName herangezogen wird. */
    
    $ArchiveName = 'backups/'.'backup_'.$projectPrefix."_".date("d-m-y_H-i-s").".zip";
        /* Der $archivName ist der Aufbau des späteren Namens der Zip-Datei der hier verändert werden könnte. 
        Wichtig ist, dass am Ende .zip als String steht, damit das Skript eine Zip-Datei erstellt und nicht auf die Idee kommt, die Daten in eine Datei ohne Endung zu packen oder so.
        Ratsam ist außerdem das ausstatten mit einem möglichst genauen Zeitstempel, ansonsten könnte es vorkommen, 
        dass ZipArchive::CREATE die neuen Daten in das selbe Verzeichnis wie das der alten Daten speichert. Dabei würden Daten die in der neuen Version gelöscht wurden allerdings bestehen bleiben.
        Die Bennennung mit $projectPrefix lässt den User die Dateien besser auseinander halten, sollte es einmal dazu kommen, das in einem Ordner mehrere Projekte gesichert werden.
        */

    /* Das Skript geht davon aus, das die Backup-Dateien in einem Unterordner liegen, und die Daten die gesichert werden sollen eine Ebene darüber.
    Sollte dem nicht so sein, muss der Pfad in $BackupLocation geändert werden.*/
    $BackupLocation = "../";
    
    /* Core Einstellungen Datenbank-Bachkup */

    $dbhost = 'localhost'; /* Meistens richtig */
    $dbuser = 'dbuser';
    $dbpassword = 'dbpass';
    $dbname = 'batabase-name';

    $dumpSettings = array(
        'include-tables' => array(
            /* Wenn nicht die komplette Datenbank gesichert werden soll, können hier spezielle Tabllen aufgelistet werden, die gesichert werden sollen. 
            Alle anderen Tabellen werden nicht gesichert. */
            
            /* Beispiel: 'users', 'contacts' */ /* Hier werden nur die Tabllen users und contacts gesichert */
        ),
        'exclude-tables' => array(
            /* Wenn einzelne Tabellen aus der Datenbank nicht gesichert werden sollen, können sie hier aufgelistet werden. 
            Alle anderen Tabellen der Datenbank würden gesichert werden */
            
            /* Beispiel: 'users', 'contacts' */ /* Hier werden alle Tabellen der Datenbank außer der Tabellen users und contancts gesichert. */
        ),
    );

    
    $dbFile = "backups/".$dbname."_".date('d-m-y_H-i-s').".sql"; /* Dier Wert kann nach belieben geändert werden, die Endung .sql ist allerdings nötig. */
?>