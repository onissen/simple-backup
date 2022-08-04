<?php
    $ignoreFile = array();
    $ignoreDirectory = array();

    foreach ($excludeDirs as $dkey) {
        $ignoreDirectory[$dkey] = $BackupLocation.'/'.$excludeDirs[$dkey];
    }

    foreach ($excludeFiles as $fkey) {
        $ignoreFile[$fkey] = $BackupLocation.'/'.$excludeFiles[$fkey];
    }
    

    class ExtendedZip extends ZipArchive {
        // Member function to add a whole file system subtree to the archive
        public function addTree($dirname, $localname = '') {           
            if ($localname)
                $this->addEmptyDir($localname);
            $this->_addTree($dirname, $localname);
        }
    
        // Internal function, to recurse
        protected function _addTree($dirname, $localname) {
            global $ignoreDirectory;
            global $ignoreFile;
            $dir = opendir($dirname);
            
            while ($filename = readdir($dir)) {
                // Discard . and ..
                if ($filename == '.' || $filename == '..')
                    continue;
    
                // Proceed according to type
                $path = $dirname . '/' . $filename;
                $localpath = $localname ? ($localname . '/' . $filename) : $filename;
                if (is_dir($path)) {
                    if (!in_array($path, $ignoreDirectory)) {
                        // Directory: add & recurse
                        $this->addEmptyDir($localpath);
                        $this->_addTree($path, $localpath);
                    }
                }
                else if (is_file($path)) {
                    // File: just add
                    if (!in_array($path, $ignoreFile)) {
                        $this->addFile($path, $localpath);
                    }
                }
            }
            closedir($dir);
        }
    
        // Helper function
        public static function zipTree($dirname, $zipFilename, $flags = 0, $localname = '') {
            global $output;
            $zip = new self();
            $zip->open($zipFilename, $flags);
            $zip->addTree($dirname, $localname);
            $zip->close();

            $zip->open($zipFilename, $flags);
            $zip->deleteName('/backup');
            $zip->deleteName('/.git');
            $zip->close();
            $output .= '<div class="alert-success">Datei-Backup erstellt.<br>Der Dateiname ist '.$zipFilename.'</div>';
        }
    }
    
    // Example
    ExtendedZip::zipTree($BackupLocation, $ArchiveName, ZipArchive::CREATE);
?>