<?php

/**
 * Class provide hiding "Save and New" button from Direct Debit modal window
 */
class CRM_ManualDirectDebit_Hook_BuildForm_CustomData {

  /**
   * Form object that is being altered.
   *
   * @var object
   */
  private $form;

  public function __construct($form) {
    $this->form = $form;
  }

  /**
   *  Checks if custom group 'Direct Debit Mandate' and launches hiding
   */
  public function run() {
    if ($this->checkIfDirectDebitMandateInGroupTree()) {
      $this->hideButton();
    }
  }

  /**
   * Checks if 'Direct Debit Mandate' exists in group tree
   *
   * @return bool
   */
  private function checkIfDirectDebitMandateInGroupTree() {
    $directDebitMandateId = CRM_ManualDirectDebit_Common_DirectDebitDataProvider::getGroupIDByName("direct_debit_mandate");
    $customGroupTree = $this->form->getVar('_groupTree');

    return array_key_exists($directDebitMandateId, $customGroupTree);
  }

  /**
   *  Hides 'Save and New' button
   */
  private function hideButton() {
    $buttonsGroup = $this->form->getElement('buttons');
    foreach ($buttonsGroup->_elements as $key => $button) {
      if ($button->_attributes['value'] == "Save and New") {
        unset($buttonsGroup->_elements[$key]);
      }
    }
  }

}
