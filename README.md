# simple-backup
 A simple php-Script to do File- and Database-Backups
 
- [simple-backup](#simple-backup)
  - [Funktionen](#funktionen)
  - [Anpassen des Programms](#anpassen-des-programms)
    - [Sichern von Ordnern und Dateien](#sichern-von-ordnern-und-dateien)

 ## Funktionen
 Mit diesem Skript können Dateien eines Verzeichnisses als Zip-Archiv in ein Unterverzeichnis gesichert werden.
 Außerdem kann wunschweise auch eine Datenbank (oder eine Datenbanktabelle) gesichert werden.

 ## Anpassen des Programms
 In der Datei `config_backup.php` kann der Programmablauf angepasst werden.
 - Die Variable **`$doFileBackup`** muss `true` sein, wenn ein Datei-Backup gemacht werden soll.
 - Die Variable **`$doDBBackup`** muss `true` sein, wenn ein Datenbank-Backup gemacht werden soll.

 - Die **`$BackupLocation`** kann über diese Variable verändert werden.
 - Im Array **`$directories`** muss (fast) jeder Ordner aufgelistet werden, der gesichert werden soll
 - Im Array **`$files`** können alle Dateien, gesichert werden, die nicht über `$directories` gesichert werden.

 - Wenn ein Datenbank-Backup gemacht werden soll, müssen unter `$dbuser` und `dbpassword` die jeweiligen Werte ausgewählt werden.
 - Unter `$dbname` muss der Name der zu sichernden Datenbank hinterlegt werden.


### Sichern von Ordnern und Dateien
Unter `$directories` können nur Ordner aufgelistet werden, die keine weiteren Unterodner haben.

Sollte ein Ordner eines oder mehrere Unterverzeichnisse haben, können alle Unterverzeichnisse ohne weitere Unterordner unter `$directories` gespeichert werden.
Alle Dateien die in Ordnern oberhalb dieser Ordner liegen, müssen dann unter `$files` gesichert werden.

**Beispiel:**

```php

$directories = array(
    ...
    "data/hr",
    "data/svg",
    ...
);

$files = array(
    array('PackageDir' => 'data/', 'ProjectDir' => 'data/*.*')
);

```