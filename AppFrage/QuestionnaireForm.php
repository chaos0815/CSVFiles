<?php
class QuestionnaireForm extends Zend_Form {
	private $questionnaire;
	
	public function init() {
		foreach ($this->questionnaire as $question) {
			$this->addQuestion($question);
		}
		
	} 
	
	public function setQuestionnaire(Questionnaire $questionnaire) {
		$this->questionnaire = $questionnaire;
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