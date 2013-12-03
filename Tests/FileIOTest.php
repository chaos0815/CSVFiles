<?php
require_once 'FileIO.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * FileIO test case.
 */
class FileIOTest extends PHPUnit_Framework_TestCase {

    /**
     * @var FileIO
     */
    private $file_io;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp() {
        parent::setUp ();
        $this->file_io = new FileIO(dirname(__FILE__).'/test.csv');
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown() {
        $this->file_io = null;
        parent::tearDown ();
    }

    /**
     * Tests DataReader->readFile()
     */
    public function testReadFile() {
        $array = $this->file_io->readFile();

        $this->assertEquals(8, count($array));
    }
}

