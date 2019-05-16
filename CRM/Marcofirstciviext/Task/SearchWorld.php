<?php
use CRM_Marcofirstciviext_ExtensionUtil as E;

class CRM_Marcofirstciviext_Task_SearchWorld extends CRM_Activity_Form_Task {

	protected $world = 'Hello Task';
	
	/**
	* Build the form object.
	*/
	public function buildQuickForm() {
		echo $this->world;
		exit();
	}
}