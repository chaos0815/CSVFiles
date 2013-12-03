<?php

require_once 'DataParser.php';
require_once 'FileIO.php';
require_once 'TableFormatter.php';
require_once 'DataWriter.php';
require_once 'CommandLine.php';
require_once 'Paging.php';
require_once 'FileIO.php';

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

    private $_page;

    public function __construct() {
        $this->_page_size = self::DEFAULT_PAGE_SIZE;

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
        $data_reader = new FileIO($current_path.'/'.$this->_filename, $this->_page_size, $this->_offset);
        $rows        = $data_reader->readFile();

        $parser = new DataParser($rows);
        $record = $parser->getPage();

        $paging = new Paging($record);

        $renderer = new PageRenderer($this->_page);
        $content  = $renderer->render();

        $writer = new DataWriter($content);
        $writer->write();

        $this->_waitForInput();
    }


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
                $this->_page = $this->_getPage('next');
                break;
            case 'P':
            case 'p':
                $this->_page = $this->_getPage('previous');
                break;
            case 'X':
            case 'x':
                echo "\n Exiting!\n\n";
                exit;
        }
        $this->_start();
    }

}
