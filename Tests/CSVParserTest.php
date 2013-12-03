<?php
require_once 'CSVParser.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * DataParser test case.
 */
class CSVParserTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 * @var CSVParser
	 */
	private $csv_parser;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated DataParserTest::setUp()
		$data = array('Name;Age;City','Peter;42;New York','Paul;57;London');

		$this->csv_parser = new CSVParser($data);
	}

	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated DataParserTest::tearDown()
		$this->csv_parser = null;

		parent::tearDown ();
	}

	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}

	/**
	 * Tests DataParser->__construct()
	 */
	public function test__construct() {
		// TODO Auto-generated DataParserTest->test__construct()
		$this->markTestIncomplete ( "__construct test not implemented" );

		$this->csv_parser->__construct(/* parameters */);
	}

	/**
	 * Tests CSVParser->parseCSV()
	 */
	public function testParseCSV() {
		// TODO Auto-generated DataParserTest->testGetPage()
		$this->markTestIncomplete ( "getPage test not implemented" );

		$this->csv_parser->getPage(/* parameters */);
	}

	/**
	 * Tests DataParser->setDelimiter()
	 */
	public function testSetDelimiter() {
		// TODO Auto-generated DataParserTest->testSetDelimiter()
		$this->markTestIncomplete ( "setDelimiter test not implemented" );

		$this->csv_parser->setDelimiter(/* parameters */);
	}
}
