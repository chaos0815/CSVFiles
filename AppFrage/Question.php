<?php

class Question {

    private $text;

    private $answers;


    /**
     * @param string $text
     * @param array  $answers
     */
    public function __construct($text, $answers) {
        $this->text    = $text;
        $this->answers = $answers;
    }

    /**
     * @return string
     */
    public function getText() {
        return $this->text;
    }

    /**
     * @return array
     */
    public function getAnswers() {
        return $this->answers;
    }
}