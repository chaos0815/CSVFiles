<?php

require_once 'DataParser.php';
require_once 'FileIO.php';
require_once 'PageRenderer.php';
require_once 'DataWriter.php';

new csvviewer();

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
        echo "\n\nN for previous ".$this->_page_size." lines.\n";
        echo "P for ".$this->_page_size." more lines.\n";
        echo "X for exit\n";
        $handle = fopen ("php://stdin","r");
        $line = trim(fgets($handle));
        switch ($line) {
            case 'N':
            case 'n':
                $this->_offset += $this->_page_size;
                break;
            case 'P':
            case 'p':
                $this->_offset -= $this->_page_size;
                break;
            case 'X':
            case 'x':
                echo "\n Exiting!\n\n";
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
        $current_path = dirname(__FILE__);
        $data_reader = new FileIO($current_path.'/'.$this->_filename, $this->_page_size, $this->_offset);
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
                $this->_offset = $argv[3];
            }
        } else {
            $this->_page_size = self::DEFAULT_PAGE_SIZE;
        }
    }
}