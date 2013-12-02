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
        if ($this->data->count() <= 1) {
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
        while ($this->data->valid()) {
            $record = $this->data->current();
            $this->data->next();
        }

        return $result;
    }

    /**
     * return void
     */
    public function _calculateMaxLengths() {
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