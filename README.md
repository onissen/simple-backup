<!-- title: README | simpleBackup-->
# simple-backup
 Ein einfaches PHP-Script um Datei- und Datenbank-Backups zu erstellen
 
- [simple-backup](#simple-backup)
  - [Funktionen](#funktionen)
  - [Anpassen des Programms](#anpassen-des-programms)

 ## Funktionen
 Mit diesem Skript können Dateien eines Verzeichnisses als Zip-Archiv in ein Unterverzeichnis gesichert werden.
 Außerdem kann wunschweise auch eine Datenbank (oder eine Datenbanktabelle) gesichert werden.

 Die Backups werden standardmäßig unter einem Unterordner `backups/` abgelegt. Dieser Ordner muss allerdings dann manuell erstellt werden, da sonst das Skript nicht funktioniert.
 Außerdem ist es nötig, die Datei `config_backup-sample.php` zu dupizieren und in `cofig_backup.php` umzubenennen. In dieser Datei werden dann die Programmparameter angepasst.

 ## Anpassen des Programms
 In der selbst erstellten Datei `config_backup.php` kann der Programmablauf angepasst werden.
 - Die Variable **`$doFileBackup`** muss `true` sein, wenn ein Datei-Backup gemacht werden soll.
 - Die Variable **`$doDBBackup`** muss `true` sein, wenn ein Datenbank-Backup gemacht werden soll.
 - Ab Version 1.5 werden alle Unterordner der `$BackupLocation` rekursiv gesichert.
 - Im Array `$excludeDirs` können Ordner aufgelistet werden, die nicht mit in das Backup einbezogen werden sollen.
 - Im Array `$excludeFiles` können alle Dateien aufgelistet werden, die nicht gesichert werden sollen.$$

 - Die **`$BackupLocation`** kann über diese Variable verändert werden.


 - Wenn ein Datenbank-Backup gemacht werden soll, müssen unter `$dbuser` und `$dbpassword` die jeweiligen Werte ausgewählt werden.
 - Unter `$dbname` muss der Name der zu sichernden Datenbank hinterlegt werden.

- Unter `$dumpSettings` können [unterschiedliche Parameter](https://github.com/ifsnop/mysqldump-php#dump-settings) für das Datenbank-Backup verändert werden.
- Im Array zu `'exclude files'` können einzelne Tabellen ignoriert werden. Die restlichen Tabellen der Datenbank werden gesichert.
- Im Array zu `'include-files` können einzelne Tabellen zum Backup hinzugefügt werden. Alle anderen Tabellen der Datenbank werden ignoriert.