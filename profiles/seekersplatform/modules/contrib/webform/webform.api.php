<?php

/**
 * @file
 * Hooks related to Webform module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Alter the information provided in \Drupal\webform\Annotation\WebformElement.
 *
 * @param array $elements
 *   The array of webform handlers, keyed on the machine-readable element name.
 */
function hook_webform_element_info_alter(array &$elements) {

}

/**
 * Alter the information provided in \Drupal\webform\Annotation\WebformHandler.
 *
 * @param array $handlers
 *   The array of webform handlers, keyed on the machine-readable handler name.
 */
function hook_webform_handler_info_alter(array &$handlers) {

}

/**
 * Alter webform elements.
 *
 * @param array $element
 *   The webform element.
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 *   The current state of the form.
 * @param array $context
 *   An associative array containing the following key-value pairs:
 *   - webform: The webform structure to which elements is being attached.
 *
 * @see \Drupal\webform\WebformSubmissionForm::prepareElements()
 * @see hook_webform_element_ELEMENT_TYPE_form_alter()
 */
function hook_webform_element_alter(array &$element, \Drupal\Core\Form\FormStateInterface $form_state, array $context) {
  // Code here acts on all elements included in a webform.
  /** @var \Drupal\webform\WebformSubmissionForm $form_object */
  $form_object = $form_state->getFormObject();
  /** @var \Drupal\webform\WebformSubmissionInterface $webform_submission */
  $webform_submission = $form_object->getEntity();
  /** @var \Drupal\webform\WebformInterface $webform */
  $webform = $webform_submission->getWebform();

  // Add custom data attributes to all elements.
  $element['#attributes']['data-custom'] = '{custom data goes here}';
}

/**
 * Alter webform elements for a specific type.
 *
 * Modules can implement hook_webform_element_ELEMENT_TYPE_form_alter() to
 * modify a specific webform element, rather than using
 * hook_webform_element_alter() and checking the element type.
 *
 * @param array $element
 *   The webform element.
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 *   The current state of the form.
 * @param array $context
 *   An associative array. See hook_field_widget_form_alter() for the structure
 *   and content of the array.
 *
 * @see \Drupal\webform\WebformSubmissionForm::prepareElements()
 * @see hook_webform_element_alter(()
 */
function hook_webform_element_ELEMENT_TYPE_form_alter(array &$element, \Drupal\Core\Form\FormStateInterface $form_state, array $context) {
  // Add custom data attributes to a specific element type.
  $element['#attributes']['data-custom'] = '{custom data goes here}';

  // Attach a custom library to the element type.
  $element['#attached']['library'][] = 'MODULE/MODULE.element.ELEMENT_TYPE';
}

/**
 * Alter the webform options by id.
 *
 * @param array $options
 *   An associative array of options.
 * @param array $element
 *   The webform element that the options is for.
 */
function hook_webform_options_WEBFORM_OPTIONS_ID_alter(array &$options, array &$element = []) {

}

/**
 * Perform alterations before a webform submission form is rendered.
 *
 * This hook is identical to hook_form_alter() but allows the
 * hook_webform_submission_form_alter() function to be stored in a dedicated
 * include file and it also allows the Webform module to implement webform alter
 * logic on another module's behalf.
 *
 * @param array $form
 *   Nested array of form elements that comprise the webform.
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 *   The current state of the form. The arguments that
 *   \Drupal::formBuilder()->getForm() was originally called with are available
 *   in the array $form_state->getBuildInfo()['args'].
 * @param string $form_id
 *   String representing the webform's id.
 *
 * @see webform.honeypot.inc
 * @see hook_form_BASE_FORM_ID_alter()
 * @see hook_form_FORM_ID_alter()
 *
 * @ingroup form_api
 */
function hook_webform_submission_form_alter(array &$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id) {

}

/**
 * @} End of "addtogroup hooks".
 */