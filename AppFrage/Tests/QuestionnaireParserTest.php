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

    public function testAddDontKnow() {
        $input = array(
            "?How many beers have I had yesterday",
            "5",
            "*7",
            "3",
            "nix",
            "?What is the next question",
            "a",
            "b",
            "*c"
        );

        $parser = new QuestionnaireParser();
        $result = $parser->parseQuestionnaire($input);
        $result = $parser->addDontKnowAnswers($result);

        $this->assertEquals(2, count($result), 'no new question should be added');

        $questions = $result->getArrayCopy();
        $this->assertEquals(5, count($questions[0]->getAnswers()));
        $this->assertEquals(4, count($questions[1]->getAnswers()));
    }
}

