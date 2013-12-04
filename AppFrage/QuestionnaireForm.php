<?php
require_once 'Zend/Form.php';
class QuestionnaireForm extends Zend_Form {
	private $questionnaire;
	
	public function __construct(Questionnaire $questionnaire){
		$this->questionnaire = $questionnaire;
	}
	
	public function init() {
		foreach ($this->questionnaire as $question) {
			$this->addQuestion($question);
		}
		
	} 

	private function addQuestion(Question $question) {
		$text_element = new Zend_Form_Element_Text('qtext');
		$text_element->setValue($question->getText())->helper = 'formNote';
		
		$this->addElement($text_element);
		$this->addElement($this->getAnswers($question->getAnswers()));
	}
	
	private function getAnswers($answers) {
		$answers = new Zend_Form_Element_MultiCheckbox('answers');
		$answers->setOptions($answers);
		
		return $answers;
	}
	
	
}

?>