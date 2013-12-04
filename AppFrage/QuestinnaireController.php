<?php
require_once 'Question.php';
require_once 'Questionnaire.php';
require_once 'QuestionnaireParser.php';
require_once 'FileIO.php';

class QuestionnaireController extends Zend_Controller_Action {

    public function startAction() {
        $file = new FileIO();
        $raw  = $file->readFile();

        $parser = new QuestionnaireParser();
        $questionnaire = $parser->parseQuestionnaire();

        $questionnaire = $parser->addDontKnowAnswer();

        $form = new QuestionnaireForm();

    }
}