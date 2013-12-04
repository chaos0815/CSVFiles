<?php
require_once 'AppFrage/QuestionnaireForm.php';
require_once 'AppFrage/QuestionnaireParser.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * QuestionnaireForm test case.
 */
class QuestionnaireFormTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var QuestionnaireForm
	 */
	private $QuestionnaireForm;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated QuestionnaireFormTest::setUp()
		
		
		$input = array(
				"?How many beers have I had yesterday",
				"5",
				"*7",
				"3",
				"?Abcd",
				"a",
				"b",
				"*c"
		);
		
		$parser = new QuestionnaireParser();
		$this->QuestionnaireForm = new QuestionnaireForm($parser->parseQuestionnaire($input));
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated QuestionnaireFormTest::tearDown()
		$this->QuestionnaireForm = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests QuestionnaireForm->init()
	 */
	public function testInit() {
		echo $this->QuestionnaireForm->__toString();
		$this->assertStringStartsWith('<form ', $this->QuestionnaireForm->__toString());
	}
	
}

