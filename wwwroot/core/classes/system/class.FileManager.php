<?php

namespace filesystem;

class FileManager
{

    /*
     * create_Folder Function
     * used to create a Folder
     *
     * @param1 string $Path
     *
     *
     */
    public function create_Folder($Path)
    {
        if (!is_dir($Path)) {
            if (substr($Path, -1) != "/") {
                $Path = $Path . "/";
            }
            if (mkdir($Path)) {
                echo $Path;
            }
        }
    }

    /*
     * create_File Function
     * used to create a File
     *
     * @param1 string $Path
     * @param2 string $Name
     *
     *
     */
    public function create_File($Path, $Name)
    {
        if (substr($Path, -1) != "/") {
            $Path = $Path . "/";
        }
        if (!file_exists($Path . $Name)) {
            $File = fopen($Path . $Name, "a+");
            if (fwrite($File, "")) {
                fclose($File);
                echo $Path . $Name;
            }
        }
    }

    /*
     * delete_Folder Function
     * used to delete a Folder
     *
     * @param1 string $Path
     *
     *
     */
    public function delete_Folder($Path)
    {
        if (is_dir($Path)) {
            if (substr($Path, -1) != "/") {
                $Path = $Path . "/";
            }
            if (rmdir($Path)) {
                // echo json_encode(array("success"=>"true"));
            }
        }
    }

    /*
     * delete_File Function
     * used to delete a File
     *
     * @param1 string $Path
     * @param2 string $Name
     *
     *
     */
    public function delete_File($Path, $File)
    {
        if (is_dir($Path)) {
            if (substr($Path, -1) != "/") {
                $Path = $Path . "/";
            }
            if (unlink($Path . $File)) {
                //return Status
            }
        }
    }

    /*
     * write_File Function
     * used to write a File
     *
     * @param1 string $Path
     * @param2 string $Name
     * @param3 string $Content
     *
     *
     */
    public function write_File($Path, $Name, $Content)
    {
        if (substr($Path, -1) != "/") {
            $Path = $Path . "/";
        }
        if (file_exists($Path . $Name)) {
            $File = fopen($Path . $Name, "w");
            fwrite($File, $Content);
            fclose($File);
        }
    }

    /*
     * read_File Function
     * used to read a File
     *
     * @param1 string $Path
     * @param2 string $Name
     *
     * @return bool
     *
     */
    public function read_File($Path, $Name)
    {
        if (substr($Path, -1) != "/") {
            $Path = $Path . "/";
        }
        if (file_exists($Path . $Name)) {
            return $Content = file_get_contents($Path . $Name);
        }
        return false;
    }

    /*
     * rename_File Function
     * used to rename a File
     *
     * @param1 string $Path
     * @param2 string $OldName
     * @param3 string $NewName
     *
     * @return bool
     *
     */
    public function rename_File($Path, $oldName, $newName)
    {
        if (substr($Path, -1) != "/") {
            $Path = $Path . "/";
        }
        if (file_exists($Path . $oldName)) {
            rename($Path . $oldName, $Path . $newName);
        }
        return false;
    }

    /*
     * scan_Folder Function
     * used to scan Folder for Files
     *
     * @param1 string $Path
     *
     * @return array $Files
     *
     */
    public function scan_Folder($Path)
    {
        if (!is_dir($Path)) {
            return false;
        }

        $files = [];
        $dirs  = [$Path];
        while (null !== ($dir = array_pop($dirs))) {
            if ($dh = opendir($dir)) {
                while (false !== ($file = readdir($dh))) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    $path = $dir . '/' . $file;
                    if (is_dir($path)) {
                        $dirs[] = $path;
                    } else {
                        $files[] = $path;
                    }
                }
                closedir($dh);
            }
        }
        return $files;
    }

    /*
     * checkFile Function
     * used to check if File exists
     *
     * @param1 string $Path
     * @param2 string $FileName
     *
     * @return bool
     *
     */
    public function checkFile($Path, $Name)
    {
        if (substr($Path, -1) != "/") {
            $Path = $Path . "/";
        }
        if (file_exists($Path . $Name)) {
            return true;
        } else {
            return false;
        }
    }
} 