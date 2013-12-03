<?php
require_once 'FileIO.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * FileIO test case.
 */
class FileIOTest extends PHPUnit_Framework_TestCase {

	/**
	 *
	 * @var FileIO
	 */
	private $DataReader;

	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();

		// TODO Auto-generated FileIOTest::setUp()

		$this->DataReader = new FileIO(dirname(__FILE__).'/test.csv', 2);
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
		// TODO Auto-generated FileIOTest->test__construct()
		$this->markTestIncomplete ( "__construct test not implemented" );

		$this->DataReader->__construct(/* parameters */);
	}

	/**
	 * Tests DataReader->getRows()
	 */
	public function testGetRows() {
		// TODO Auto-generated FileIOTest->testGetRows()

		$array = $this->DataReader->getRows();

		$this->assertEquals(3, count($array));
	}
}

