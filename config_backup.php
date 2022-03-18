<?php
    $doFileBackup = true;
    $doDBBackup = true;
    
    /* Core Einstellungen für Dateien-Backup */
    
    $projectPrefix = "companyData"; /* Präfix der normalerweise zum bennenen des $archiveName herangezogen wird. */
    
    $archiveName = 'backups/'.'backup_'.$projectPrefix."_".date("d-m-y_H-s-i").".zip";
        /* Der $archivName ist der Aufbau des späteren Namens der Zip-Datei der hier verändert werden könnte. 
        Wichtig ist, dass am Ende .zip als String steht, damit das Skript eine Zip-Datei erstellt und nicht auf die Idee kommt, die Daten in eine Datei ohne Endung zu packen oder so.
        Ratsam ist außerdem das ausstatten mit einem möglichst genauen Zeitstempel, ansonsten könnte es vorkommen, 
        dass ZipArchive::CREATE die neuen Daten in das selbe Verzeichnis wie das der alten Daten speichert. Dabei würden Daten die in der neuen Version gelöscht wurden allerdings bestehen bleiben.
        Die Bennennung mit $projectPrefix lässt den User die Dateien besser auseinander halten, sollte es einmal dazu kommen, das in einem Ordner mehrere Projekte gesichert werden.
        */

    /* Das Skript geht davon aus, das die Backup-Dateien in einem Unterordner liegen, und die Daten die gesichert werden sollen eine Ebene darüber.
    Sollte dem nicht so sein, muss der Pfad in $BackupLocation geändert werden.*/
    $BackupLocation = "../";
    
    /* Hier muss jeder Ordner aufgelistet werden, der gesichet werden soll */
    
        /* ACHTUNG: Hier können nur Ordner aufgelistet werden, die nur Dateien und KEINE Unterordner haben. 
            Hat ein Ordner mehrere Unterordner ohne weitere Unterordner, können diese Unterordner hier mit aufgelistet werden.
            Dann werden die Dateien in den darüber liegenden Ordnern nicht mit gesichert, können aber unter Files hinzugefügt werden.*/
    $directories = array(
        'assets',
        "bootstrap",
        // "companies",
        "css",
        "data/hr",
        "data/svg",
        "js",
        "persons",
        "sass",
        "templates"
        /* Das /backup Verzeichnis sollte normalerweise nicht in das neue Backup einbezogen werden*/
    );

    $files = array(
        array('PackageDir' => '', 'ProjectDir' => '*.*'), /*Hiermit werden die Dateien in der $BackupLocation gespeichert*/
        /* Hier sollten auch Ordner hinterlegt werden, deren Unterverzeichnisse unter $directories berücksichtigt wurden. */
        array('PackageDir' => 'data/', 'ProjectDir' => 'data/*.*')
    );

    /* Core Einstellungen Datenbank-Bachkup */

    $dbhost = 'localhost'; /* Meistens richtig */
    $dbuser = 'root';
    $dbpassword = '';
    $dbname = 'intranet';
    
    $dbFile = "backups/".$dbname."_".date('d-m-y_H-s-i').".sql"; /* Dier Wert kann nach belieben geändert werden, die Endung .sql ist allerdings nötig. */
?>