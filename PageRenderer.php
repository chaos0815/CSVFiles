<?php

class PageRenderer {

    const COLUMN_DELIM     = '|';
    const HEADER_DELIM     = '-';
    const HEADER_COL_DELIM = '+';
    
    /**
     * @var ArrayIterator
     */
    private $data;

    /**
     * @var array
     */
    private $max_lengths;
    
    /**
     * @param ArrayIterator $data
     */
    public function __construct(ArrayIterator $data) {
        if ($data->count() <= 1) {
            throw new RuntimeException('No data in file.');
        }

        $this->data = $data;

        $this->_calculateMaxLengths();
    }

    /**
     * @return string
     */
    public function render() {
        $result = '';

        $this->data->rewind();
        
        $result .= $this->_formatHeader($this->data->current());
        $this->data->next();
        
        while ($this->data->valid()) {
            $record = $this->data->current();

            $result .= $this->_formatLine($record);

            $this->data->next();
        }

        return $result;
    }

    /**
     * @param array $record
     *
     * @return string
     */
    private function _formatHeader($record) {
        $result = $this->_formatLine($record);
        
        foreach ($record as $k => $v) {
            $len = $this->max_lengths[$k];
            $result .= sprintf("%'" .self::HEADER_DELIM. $len . "s", '');
            $result .= self::HEADER_COL_DELIM;
        }
        
        return $result . "\n";
    }

    /**
     * @param array $record
     *
     * @return string
     */
    private function _formatLine($record) {
        $result = '';

        foreach ($record as $k => $v) {
            $len = $this->max_lengths[$k];

            $result .= sprintf("%-" . $len . "s", $v);
            $result .= self::COLUMN_DELIM;
        }

        return $result . "\n";
    }
    
    /**
     * return void
     */
    private function _calculateMaxLengths() {
        $this->max_lengths = array();

        $this->data->rewind();
        while ($this->data->valid()) {
            $record = $this->data->current();

            foreach ($record as $k => $v) {
                if (empty($this->max_lengths[$k]) || $this->max_lengths[$k] < strlen($v)) {
                    $this->max_lengths[$k] = strlen($v);
                }
            }

            $this->data->next();
        }
    }
}