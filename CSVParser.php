<?php
require_once 'Record.php';

class CSVParser {

    const RECORD_DELIM = ';';

    /**
     * @param array $lines
     *
     * @return ArrayIterator
     */
    public function parseCSV($lines) {
        if (!is_array($lines)) {
            throw new InvalidArgumentException('Expected array.');
        }

        $result = new ArrayIterator();

        foreach ($lines as $line) {
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
