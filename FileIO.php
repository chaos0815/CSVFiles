<?php
class FileIO {

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

