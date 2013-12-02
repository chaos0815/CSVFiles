<?php

class DataParser {
    
    const RECORD_DELIM = ';';
    
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
            $result->append($this->_parseLine($line));
        }
        
        return $result;
    }
    
    /**
     * @param string $line
     *
     * @return array
     */
    private function _parseLine($line) {
        return explode(self::RECORD_DELIM, $line);
    }
}
