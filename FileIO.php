<?php
class FileIO {

    /**
     * new instance of FileIO
     *
     * @param string $filename
     */
    public function __construct() {
    }

    /**
     * get array of row strings
     *
     * @return array
     */
    public function readFile($filename) {
        $result = file($filename);

        if ($result === false) {
            throw new RuntimeException('File not Found: ' . $filename);
        }
        return $result;
    }

}

