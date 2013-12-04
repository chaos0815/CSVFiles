<?php
class CommandLine {

    /**
     * gets commandline args and sets class members accordingly
     *
     * @return void
     */
    private function _getCommandLineParameters() {
        global $argv;
        return  $argv;
    }

    /**
     * returns the filename given through commandline param
     *
     * @return string
     */
    public function extractFilename($args) {
        return $args[1];
    }
    
    public function getFilename() {
    	$args = $this->_getCommandLineParameters();
    	return $this->extractFilename($args);
    }
}

?>