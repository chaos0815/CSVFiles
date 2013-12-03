<?php
class CommandLine {

    /**
     * @var array
     */
    private $_commandline_args = array();

    public function __construct() {
        $this->_getInitialArgs();
    }

    /**
     * gets commandline args and sets class members accordingly
     *
     * @return void
     */
    private function getInitialArgs() {
        global $argv;
        $this->_commandline_args['filename'] = $argv[1];
    }

    /**
     * returns the filename given through commandline param
     *
     * @return string
     */
    public function extractFilename() {
        return $this->_commandline_args['filename'];
    }
}

?>