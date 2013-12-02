<?php

require_once('DataParser.php');
require_once('DataWriter.php');
class csvviewer {

    private $_page_size = 3;
    private $_offset    = 0;
    private $_filename  = '';

    public function __construct() {
        $this->_getArgs();
        $this->_viewCsv();
        $this->_waitForInput();
    }

    private function _waitForInput() {
        echo "N für weitere ".$this->_page_size." Zeilen.\n";
        echo "P für vorherige ".$this->_page_size." Zeilen.\n";
        $handle = fopen ("php://stdin","r");
        $line = trim(fgets($handle));
        switch ($line) {
            case 'N':
                $this->_offset += $this->_page_size;
                break;
            case 'P':
                $this->_offset -= $this->_page_size;
                break;
        }
        $this->_viewCsv();
    }

    private function _viewCsv() {
        $data_reader = new DataReader($this->filename, $this->_page_size, $this->_offset);
        $rows       = $data_reader->getRows();

        $parser = new DataParser($rows);
        $page   = $parser->getPage();

        $renderer  = new PageRenderer($page);
        $content   = $renderer->render();

        $writer = new DataWriter($content);
        $writer->write();

        $this->_waitForInput();
    }

    /**
     * gets commandline args and sets class members accordingly
     *
     * @return void
     */
    private function _getArgs() {
        global $argv;
        $this->_filename = $argv[1];
        if (isset($argv[2])) {
            $this->_page_size = $argv[2];
            if (isset($argv[3])) {
                $this->_offset = $argv[2];
            }
        }
    }
}