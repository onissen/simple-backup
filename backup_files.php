<?php
    foreach ($directories as $dkey => $dvalue) {
        $directories[$dkey] = array(
            "PackagePath" => $projectPrefix.'/'.$directories[$dkey].'/',
            "ProjectPath" => $BackupLocation.$directories[$dkey]."/*"
        );
    }
    foreach ($files as $fkey => $fvalue) {
        $filePath[$fkey] = array(
            'PackagePath' => $projectPrefix.'/'.$files[$fkey]['PackageDir'],
            'ProjectPath' => $BackupLocation.$files[$fkey]['ProjectDir']
        );
    }

        $zip = new ZipArchive();
        $task = $zip->open($archiveName, ZipArchive::CREATE);
        
        
        if ($task === TRUE) {
            foreach ($directories as $dkey => $value) {
                $options = array('add_path' => $directories[$dkey]['PackagePath'], 'remove_all_path' => TRUE);
                $zip->addGlob($directories[$dkey]['ProjectPath'], 0, $options);
            }
            foreach ($files as $fkey => $fvalue) {
                $options = array('add_path' => $filePath[$fkey]['PackagePath'], 'remove_all_path' => TRUE);
                $zip->addGlob($filePath[$fkey]['ProjectPath'], 0, $options);
            }
            $zip->close();
            echo "Datei-Backup erstellt";
        }
        $zip = new ZipArchive();
        $zip->open($archiveName);
        if ($zip->open($archiveName) === TRUE) {
            $zip->deleteName('companyData/data/');
            $zip->deleteName('companyData/404.php');
            
            echo "funktioniert";
        }
        else {echo "funktioniert nicht";}
        // else {echo "Das Datei-Backup konnte nicht erstellt werden";}
?>