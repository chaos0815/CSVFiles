<?php
require_once 'FileIO.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * FileIO test case.
 */
class FileIOTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests DataReader->readFile()
     */
    public function testReadFile() {
        $file_io = new FileIO();
        $ressult = $file_io->readFile(dirname(__FILE__).'/test.csv');

        $this->assertEquals(8, count($ressult));
    }
}

