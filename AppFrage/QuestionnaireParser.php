<?php

class QuestionnaireParser {

    /**
     * @param array $lines file lines
     *
     * @return Questionnaire
     */
    public function parseQuestionnaire($lines) {
        $questions = array();

        $text    = '';
        $answers = array();

        foreach ($lines as $line) {
            if ($line[0] == '?') {
                if (!empty($text) && !empty($answers)) {
                    $questions[] = new Question($text, $answers);

                    $text    = ltrim($line, '?');
                    $answers = array();
                }
            } else {
                if ($line[0] == '*') {
                    $line = ltrim ($line, '*');
                }
                $answers[] = $line;
            }
        }

        return new Questionnaire($questions);
    }

    /**
     * @return Questionnaire
     */
    public function addDontKnowAnswers(Questionnaire $questionnaire) {
        return $questionnaire;
    }
}