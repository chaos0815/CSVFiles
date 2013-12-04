<?php
require_once 'QuestionnaireParser.php';

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
            "?Abcd",
            "a",
            "b",
            "*c"
        );

        $parser = new QuestionnaireParser();
        $result = $parser->parseQuestionnaire($input);

        $this->assertInstanceOf('Questionnaire', $result);
    }
}

