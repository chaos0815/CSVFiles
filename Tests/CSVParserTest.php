<?php
require_once 'CSVParser.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * DataParser test case.
 */
class CSVParserTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests CSVParser->parseCSV()
	 */
	public function testParseCSV() {
		$data = array('Name;Age;City','Peter;42;New York','Paul;57;London');

		$csv_parser = new CSVParser();
		$page = $csv_parser->parseCSV($data);

		$this->assertInstanceOf('ArrayIterator', $page);
		$this->assertEquals(3, count($page));
	}

}

