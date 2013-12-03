<?php
require_once 'Paging.php';

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'Record.php';
require_once 'Page.php';

/**
 * Paging test case.
 */
class PagingTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var Paging
	 */
	private $Paging;
	
	private $recs;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated PagingTest::setUp()
		$this->recs = array(new Record(array('1','2','3')), new Record(array('21','22','23')), new Record(array('31','32','33')));
		
		$this->Paging = new Paging();
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated PagingTest::tearDown()
		$this->Paging = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	
	/**
	 * Tests Paging->extractFirstPage()
	 */
	public function testExtractFirstPage() {
		$page = $this->Paging->extractFirstPage($this->recs);
		$this->assertInstanceOf('Page', $page);
		$this->assertEquals(1, $this->Paging->getPageIndex());
	}
	
	/**
	 * Tests Paging->extractNextPage()
	 */
	public function testExtractNextPage() {
		$page = $this->Paging->extractNextPage($this->recs);
		$this->assertInstanceOf('Page', $page);
		$this->assertEquals(2, $this->Paging->getPageIndex());
	}
	
	/**
	 * Tests Paging->extractNextPage()
	 */
	public function testExtractPreviousPage() {
		$this->Paging->extractNextPage($this->recs);
		$page = $this->Paging->extractPreviousPage($this->recs);
		$this->assertInstanceOf('Page', $page);
		$this->assertEquals(1, $this->Paging->getPageIndex());
	}
	
	
	/**
	 * Tests Paging->getPageIndex()
	 */
	public function testGetPageIndex() {
		
		$this->assertEquals(1, $this->Paging->getPageIndex());
	}
}

