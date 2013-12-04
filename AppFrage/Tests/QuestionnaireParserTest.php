<?php
require_once 'AppFrage/Questionnaire.php';
require_once 'AppFrage/Question.php';
require_once 'AppFrage/QuestionnaireParser.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * QuestionnaireParser test case.
 */
class QuestionnaireParserTest extends PHPUnit_Framework_TestCase {

    public function testParse() {
        $input = array(
            "?How many beers have I had yesterday",
            "5",
            "*7",
            "3",
            "?What is the next question",
            "a",
            "b",
            "*c"
        );

        $parser = new QuestionnaireParser();
        $result = $parser->parseQuestionnaire($input);

        $this->assertInstanceOf('Questionnaire', $result);
        $this->assertEquals(2, count($result));
    }
}

