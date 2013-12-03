<?php

require_once 'CSVParser.php';
require_once 'FileIO.php';
require_once 'TableFormatter.php';
require_once 'DataWriter.php';
require_once 'CommandLine.php';
require_once 'Paging.php';
require_once 'Page.php';

new csvviewer();

class csvviewer {

    /**
     * @var integer
     */
    const DEFAULT_PAGE_SIZE = 3;

    /**
     * @var integer
     */
    private $_page_size;

    /**
     * @var integer
     */
    private $_offset    = 0;

    /**
     * @var Paging
     */
    private $_paging;

    /**
     * @var Page
     */
    private $_page;

    public function __construct() {
        $this->_page_size = self::DEFAULT_PAGE_SIZE;

        $this->_paging = new Paging();
        $this->_page = $this->_getPage();

        $this->_start();
    }


    /**
     * main processing, calling reader, parser, renderer and writer
     *
     * @return void
     */
    private function _start() {
        $command_line = new CommandLine();
        $filename     = $command_line->extractFilename();

        $current_path = dirname(__FILE__);
        $data_reader = new FileIO();
        $rows        = $data_reader->readFile($current_path.'/'.$this->_filename);

        $parser = new CSVParser($rows);
        $record = $parser->parseCSV();

        $renderer = new TableFormatter($this->_page);
        $content  = $renderer->formatAsTable();

        $writer = new DataWriter($content);
        $writer->write();

        $this->_waitForInput();
    }


    /**
     * grabs the page
     *
     * @param string $which next, previous or first (default)
     *
     * @return Page
     */
    private function _getPage($which = '') {
        switch ($which) {
            case 'next':
                return $this->_paging->extractNextPage();
                break;
            case 'previous':
                return $this->_paging->extractPreviousPage();
                break;
            default:
                return $this->_paging->extractFirstPage();
        }
    }

    /**
     * sets next page as current page
     */
    private function _nextPage() {
        $this->_page = $this->_getPage('next');
    }

    /**
     * sets previous page as current page
     */
    private function _previousPage() {
        $this->_page = $this->_getPage('previous');
    }

    /**
     * waiting for input and triggering process
     *
     * @return void
     */
    private function _waitForInput() {
        echo "\n\nN for previous ".$this->_page_size." lines.\n";
        echo "P for ".$this->_page_size." more lines.\n";
        echo "X for exit\n";
        $handle = fopen ("php://stdin","r");
        $line = trim(fgets($handle));
        switch ($line) {
            case 'N':
            case 'n':
                $this->_nextPage();
                break;
            case 'P':
            case 'p':
                $this->_previousPage();
                break;
            case 'X':
            case 'x':
                echo "\n Exiting!\n\n";
                exit;
        }
        $this->_start();
    }
}