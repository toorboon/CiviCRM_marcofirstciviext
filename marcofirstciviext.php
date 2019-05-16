<?php

require_once 'marcofirstciviext.civix.php';
use CRM_Marcofirstciviext_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function marcofirstciviext_civicrm_post($op, $objectName, $objectId, &$objectRef) {
  if($op == 'create' && $objectName =='Activity'){
    Civi::log()->info('An activity got created');
    CRM_Core_Session::setStatus('An activity got created');
  }
}

function marcofirstciviext_civicrm_pageRun(&$page){
  $pageName = $page->getVar('_name');
  // Civi::log()->info('Name of the page'.$pageName);
  if($pageName == 'CRM_Marcofirstciviext_Page_MarcoPage'){
    CRM_Core_Session::setStatus('Hook fired, you opened Marcos Page!');
    $contacts = CRM_Marcofirstciviext_Page_MarcoPage::fetchContacts('Heidi');
    $page->assign('contacts', $contacts);
  }
}

function marcofirstciviext_civicrm_searchTasks($objectType, &$tasks){
  if($objectType == 'activity'){
    $tasks[] = [
      'title' => 'Set status to whatever',
      'class' => 'CRM_Marcofirstciviext_Task_SearchWorld'
    ];
  }
}

function marcofirstciviext_civicrm_config(&$config) {
  _marcofirstciviext_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function marcofirstciviext_civicrm_xmlMenu(&$files) {
  _marcofirstciviext_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function marcofirstciviext_civicrm_install() {
  _marcofirstciviext_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function marcofirstciviext_civicrm_postInstall() {
  _marcofirstciviext_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function marcofirstciviext_civicrm_uninstall() {
  _marcofirstciviext_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function marcofirstciviext_civicrm_enable() {
  // _marcofirstciviext_civix_civicrm_enable()
  _marcofirstciviext_civix_civicrm_enable();

  CRM_Core_Session::setStatus('This is my first skeleton thing!');
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function marcofirstciviext_civicrm_disable() {
  _marcofirstciviext_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function marcofirstciviext_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _marcofirstciviext_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function marcofirstciviext_civicrm_managed(&$entities) {
  _marcofirstciviext_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function marcofirstciviext_civicrm_caseTypes(&$caseTypes) {
  _marcofirstciviext_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function marcofirstciviext_civicrm_angularModules(&$angularModules) {
  _marcofirstciviext_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function marcofirstciviext_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _marcofirstciviext_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function marcofirstciviext_civicrm_entityTypes(&$entityTypes) {
  _marcofirstciviext_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function marcofirstciviext_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function marcofirstciviext_civicrm_navigationMenu(&$menu) {
  _marcofirstciviext_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _marcofirstciviext_civix_navigationMenu($menu);
} // */
