<?php

class DataWriter {
    
    /**
     * @var string
     */
    private $output;
    
    /**
     * @param string $output
     */
    public function __construct($output) {
        $this->output = $output;
    }
    
    /**
     * @return void
     */
    public function write() {
        echo $this->output; // :-)
    }
}