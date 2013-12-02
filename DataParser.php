<?php

class DataParser {
    
    /**
     * @var array
     */
    private $lines;
    
    /**
     * @param array $lines
     */
    public function __construct($lines) {
        $this->lines = $lines;
    }
    
    /**
     * @return ArrayIterator
     */
    public function getPage() {
        $result = new ArrayIterator();
        
        foreach ($this->lines as $line) {
            
        }
        
        return $result;
    }
    
    
}