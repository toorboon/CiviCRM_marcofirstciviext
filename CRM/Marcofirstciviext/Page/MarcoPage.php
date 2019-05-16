<?php
use CRM_Marcofirstciviext_ExtensionUtil as E;

class CRM_Marcofirstciviext_Page_MarcoPage extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(E::ts('Holzkopf'));

    // Example: Assign a variable for use in a template
    $this->assign('currentTime', date('Y-m-d H:i:s'));
	
	$contacts = $this->fetchContacts('Adam');
	$this->assign('contacts', $contacts);
	
	parent::run();
  }

  public static function fetchContacts($name){
  	$contacts = civicrm_api3('Contact', 'get', [
	  'sequential' => 1,
	  'return' => ["last_name"],
	  'first_name' => $name,
	  'options' => ['limit' => 25],
	]);

	return $contacts;
  }

   

}
