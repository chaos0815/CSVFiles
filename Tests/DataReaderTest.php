<?php
require_once 'DataReader.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * DataReader test case.
 */
class DataReaderTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var DataReader
	 */
	private $DataReader;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated DataReaderTest::setUp()
		
		$this->DataReader = new DataReader(dirname($_SERVER['PHP_SELF']).'/Tests/test.csv', 2);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated DataReaderTest::tearDown()
		$this->DataReader = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests DataReader->__construct()
	 */
	public function test__construct() {
		// TODO Auto-generated DataReaderTest->test__construct()
		$this->markTestIncomplete ( "__construct test not implemented" );
		
		$this->DataReader->__construct(/* parameters */);
	}
	
	/**
	 * Tests DataReader->getRows()
	 */
	public function testGetRows() {
		// TODO Auto-generated DataReaderTest->testGetRows()
		
		$array = $this->DataReader->getRows();
		
		$this->assertEquals(2, count($array));
	}
}

