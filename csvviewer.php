<?php

require_once('DataParser.php');
require_once('DataWriter.php');
class csvviewer {

    private $_page_size = 3;
    private $_offset    = 0;
    private $_filename  = '';

    function __construct() {
        $this->_getArgs();
        $data_reader = new DataReader($this->filename, $this->_page_size, $this->_offset);
        $rows       = $data_reader->getRows();

        $parser = new DataParser($rows);
        $page   = $parser->getPage();

        $renderer  = new PageRenderer($page);
        $content   = $renderer->render();

        $writer = new DataWriter($content);
        $writer->write();

    }

    /**
     * gets commandline args and sets class members accordingly
     *
     * @return void
     */
    function _getArgs() {
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