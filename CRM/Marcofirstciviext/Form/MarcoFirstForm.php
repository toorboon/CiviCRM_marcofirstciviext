<?php

use CRM_Marcofirstciviext_ExtensionUtil as E;

/**
 * Form controller class
 *
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_Marcofirstciviext_Form_MarcoFirstForm extends CRM_Core_Form {
  public function buildQuickForm() {

    $userContext = CRM_Core_Session::singleton()->readUserContext();
    if (empty($userContext)) {
      CRM_Core_Session::singleton()->pushUserContext(CRM_Utils_System::url('civicrm', 'reset=1', TRUE));
    }
    CRM_Utils_System::setTitle(E::ts('Web dept. Email Setter'));

    // add form elements
    $this->addEntityRef('contact', ts('Select Contact'));
    $this->add('text', 'new_email', ts('New Email'), array('domain' => 'marcofirstciviext'),TRUE);
    
    // validation
    $this->addRule('contact', 'Choose Contact', 'required');

    $this->addButtons(array(
      array(
        'type' => 'submit',
        'name' => E::ts('Submit'),
        'isDefault' => TRUE,
      ),
    ));


    /**/

     // export form elements
    $this->assign('elementNames', $this->getRenderableElementNames());
    parent::buildQuickForm();
  }

  /**
   * Function to add validation condition rules (overrides parent function)
   *
   * @access public
   */
  public function addRules() {
    $this->addFormRule(array('CRM_Marcofirstciviext_Form_MarcoFirstForm', 'validateEmails'));
    
  }

  public function validateEmails($fields){
    if (isset($fields['new_email'])) {
      if (!filter_var($fields['new_email'], FILTER_VALIDATE_EMAIL)) {
        $errors['new_email'] = E::ts('Scheiß Email Adresse');
        return $errors;
      }
      return TRUE;
    }

  }

  public function postProcess() {
    $values = $this->exportValues();
    CRM_Core_Session::setStatus('Email got created!');
    
    // write the fields to the database via APIv3
    $setEmail = civicrm_api3('Email', 'create', [
      'contact_id' => $values['contact'],
      'email' => $values['new_email'],
    ]);

    parent::postProcess();
  }

  /**
   * Get the fields/elements defined in this form.
   *
   * @return array (string)
   */
  public function getRenderableElementNames() {
    // The _elements list includes some items which should not be
    // auto-rendered in the loop -- such as "qfKey" and "buttons".  These
    // items don't have labels.  We'll identify renderable by filtering on
    // the 'label'.
    $elementNames = array();
    foreach ($this->_elements as $element) {
      /** @var HTML_QuickForm_Element $element */
      $label = $element->getLabel();
      if (!empty($label)) {
        $elementNames[] = $element->getName();
      }
    }
    return $elementNames;
  }

}
