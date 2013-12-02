<?php

require_once('DataParser.php');
require_once('DataWriter.php');
class csvviewer {

    protected $page_size = 3;

    private $_start_index = 0;

    private $_filename = '';

    function __construct() {

    }

    function _getArgs() {
        global $argv;
        $this->_filename = $argv[1];
        if (isset($argv[2])) {
            $this->page_size = $argv[2];
            if (isset($argv[3])) {
                $this->_start_index = $argv[2];
            }
        }
    }
}