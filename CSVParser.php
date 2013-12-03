<?php
require_once 'Record.php';

class CSVParser {

    const RECORD_DELIM = ';';

    /**
     * @var array
     */
    private $lines;

    /**
     * @param array $lines
     */
    public function __construct($lines) {
        if (!is_array($lines)) {
            throw new InvalidArgumentException('Expected array.');
        }
        $this->lines = $lines;
    }

    /**
     * @return ArrayIterator
     */
    public function parseCSV() {
        $result = new ArrayIterator();

        foreach ($this->lines as $line) {
            $record = new Record($this->_parseLine($line));
            $result->append($record);
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
