<?php

require_once 'manualdirectdebit.civix.php';

use CRM_ManualDirectDebit_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function manualdirectdebit_civicrm_config(&$config) {
  _manualdirectdebit_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function manualdirectdebit_civicrm_xmlMenu(&$files) {
  _manualdirectdebit_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function manualdirectdebit_civicrm_install() {
  _manualdirectdebit_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function manualdirectdebit_civicrm_postInstall() {
  _manualdirectdebit_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function manualdirectdebit_civicrm_uninstall() {
  _manualdirectdebit_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function manualdirectdebit_civicrm_enable() {
  _manualdirectdebit_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function manualdirectdebit_civicrm_disable() {
  _manualdirectdebit_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function manualdirectdebit_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _manualdirectdebit_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function manualdirectdebit_civicrm_managed(&$entities) {
  _manualdirectdebit_civix_civicrm_managed($entities);
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
function manualdirectdebit_civicrm_caseTypes(&$caseTypes) {
  _manualdirectdebit_civix_civicrm_caseTypes($caseTypes);
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
function manualdirectdebit_civicrm_angularModules(&$angularModules) {
  _manualdirectdebit_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function manualdirectdebit_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _manualdirectdebit_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 */
function manualdirectdebit_civicrm_navigationMenu(&$menu) {
  $directDebitMenuItem = [
    'name' => ts('Direct Debit'),
    'url' => NULL,
    'permission' => 'administer CiviCRM',
    'operator' => NULL,
    'separator' => NULL,
  ];
  _manualdirectdebit_civix_insert_navigation_menu($menu, 'Administer/', $directDebitMenuItem);

  $directDebitCodeSubMenuItem = [
    'name' => ts('Direct Debit Codes'),
    'url' => 'civicrm/admin/options/direct_debit_codes',
    'permission' => 'administer CiviCRM',
    'operator' => NULL,
    'separator' => NULL,
  ];
  _manualdirectdebit_civix_insert_navigation_menu($menu, 'Administer/' . $directDebitMenuItem['name'], $directDebitCodeSubMenuItem);

  $directDebitConfigurationSubMenuItem = [
    'name' => ts('Direct Debit Configuration'),
    'url' => 'civicrm/admin/direct_debit_configuration',
    'permission' => 'administer CiviCRM',
    'operator' => NULL,
    'separator' => NULL,
  ];
  _manualdirectdebit_civix_insert_navigation_menu($menu, 'Administer/' . $directDebitMenuItem['name'], $directDebitConfigurationSubMenuItem);

  $directDebitOriginatorNumberSubMenuItem = [
    'name' => ts('Direct Debit Originator Number'),
    'url' => 'civicrm/admin/options/direct_debit_originator_number',
    'permission' => 'administer CiviCRM',
    'operator' => NULL,
    'separator' => NULL,
  ];
  _manualdirectdebit_civix_insert_navigation_menu($menu, 'Administer/' . $directDebitMenuItem['name'], $directDebitOriginatorNumberSubMenuItem);
}

