<?php


class QuestionnaireParser {

    /**
     * @param array $lines file lines
     *
     * @return Questionnaire
     */
    public function parseQuestionnaire($lines) {
        return new Questionnaire(array());
    }
}