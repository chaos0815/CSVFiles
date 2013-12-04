<?php
require_once 'Question.php';
require_once 'Questionnaire.php';
require_once 'QuestionnaireParser.php';
require_once 'QuestionnaireForm.php';
require_once 'FileIO.php';

$q = new QuestionnaireController();
$q->startAction();

/**
 *
 * @author heiko
 *
 */
class QuestionnaireController {

    /**
     * initially displays the questionnaire form
     *
     * @return void
     */
    public function startAction() {
        $file = new FileIO();
        $raw  = $file->readFile();

        $parser        = new QuestionnaireParser();
        $questionnaire = $parser->parseQuestionnaire();

        $questionnaire = $parser->addDontKnowAnswer();

        $questionnaire_form = $this->_createQuestionnaireForm($questionnaire);

        echo $questionnaire->toString();

    }

    /**
     * creates the questionnaire form
     *
     * @param Questionnaire $questionnaire
     *
     * @return ZendForm
     */
    private function _createQuestionnaireForm($questionnaire = array()) {
        $form = new QuestionnaireForm();
        $form->set($questionnaire);

        return $form->init();
    }
}