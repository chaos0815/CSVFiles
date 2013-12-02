<?php

require_once('DataParser.php');
require_once('DataWriter.php');

class csvviewer {

    const DEFAULT_PAGE_SIZE = 3;

    private $_page_size;
    private $_offset    = 0;
    private $_filename  = '';

    public function __construct() {
        $this->_getArgs();
        $this->_viewCsv();
        $this->_waitForInput();
    }

    /**
     * waiting for input and triggering process
     *
     * @return void
     */
    private function _waitForInput() {
        echo "N for previous ".$this->_page_size." lines.\n";
        echo "P for ".$this->_page_size." more lines.\n";
        echo "X for exit";
        $handle = fopen ("php://stdin","r");
        $line = trim(fgets($handle));
        switch ($line) {
            case 'N':
                $this->_offset += $this->_page_size;
                break;
            case 'P':
                $this->_offset -= $this->_page_size;
                break;
            case 'X':
                echo "\n Exiting!";
                exit;
        }
        $this->_viewCsv();
    }

    /**
     * main processing, calling reader, parser, renderer and writer
     *
     * @return void
     */
    private function _viewCsv() {
        $data_reader = new DataReader($this->filename, $this->_page_size, $this->_offset);
        $rows        = $data_reader->getRows();

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
        } else {
            $this->_page_size = self::DEFAULT_PAGE_SIZE;
        }
    }
}