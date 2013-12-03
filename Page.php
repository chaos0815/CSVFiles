<?php
class Page {

    /**
     * @var ArrayIterator
     */
    private $records;

    /**
     * @var Record
     */
    private $header;

    /**
     * @var integer
     */
    private $current_page;

    /**
     * @var integer
     */
    private $page_count;


    /**
     * @param Record        $header
     * @param ArrayIterator $records
     * @param integer       $page_count
     * @param integer       $current_page
     */
    public function __construct(Record $header, ArrayIterator $records, $page_count, $current_page = 1) {
        $this->header  = $header;
        $this->records = $records;

        $this->page_count   = $page_count;
        $this->current_page = $current_page;
    }

    /**
     * @return ArrayIterator
     */
    public function getRecords() {
        return $this->records;
    }

    /**
     * @return Record
     */
    public function getHeader() {
        return $this->header;
    }

    /**
     * @return integer
     */
    public function getCurrentPage() {
        return $this->current_page;
    }

    /**
     * @return integer
     */
    public function getPageCount() {
        return $this->page_count;
    }
}

