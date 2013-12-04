<?php
require_once 'Question.php';
require_once 'Questionnaire.php';
require_once 'QuestionnaireParser.php';
require_once 'FileIO.php';

class QuestionnaireController extends Zend_Controller_Action {

    public function startAction() {
        $file = new FileIO();
        $raw  = $file->readFile();

        $parser        = new QuestionnaireParser();
        $questionnaire = $parser->parseQuestionnaire();

        $questionnaire = $parser->addDontKnowAnswer();

        $questionnaire_form = $this->_createQuestionnaireForm($questionnaire);

    }

    private function _createQuestionnaireForm($questionnaire = array()) {
        $form = new QuestionnaireForm();
        $form->set($questionnaire);

        return ;

    }
}