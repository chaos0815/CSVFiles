<?php
require_once 'Zend/Form.php';
require_once 'Zend/Form/Element/Text.php';
require_once 'Zend/Form/Element/MultiCheckbox.php';

class QuestionnaireForm extends Zend_Form {
	private $questionnaire;
	
	public function __construct(Questionnaire $questionnaire){
		$this->questionnaire = $questionnaire;
		parent::__construct();
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
		$answer = new Zend_Form_Element_MultiCheckbox('answers');
		$answer->setOptions($answers);
		
		return $answer;
	}
	
	public function __toString() {
		return '<form >hier die Frage <input type="text">huhu</input><input type="text">other</input>';
	}
	
}

?>