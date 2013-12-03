<?php
class FileIO {

    /**
     * @var string
     */
    private $filename;

    /**
     * new instance of FileIO
     *
     * @param string $filename
     */
    public function __construct($filename) {
        $this->filename = $filename;
    }

    /**
     * get array of row strings
     *
     * @return array
     */
    public function readFile() {
        $result = file($this->filename);

        if ($result === false) {
            throw new RuntimeException('File not Found: ' . $this->filename);
        }
        return $result;
    }

}

