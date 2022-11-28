<?php

namespace Drupal\trainee_users\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

class DeleteForm extends ConfirmFormBase
{
  /**
   * @return string
   */
  public function getFormId(): string
  {
    return 'delete_form';
  }

  /**
   * @param array $form
   * @param FormStateInterface $form_state
   * @return array
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
      return parent::buildForm($form,$form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $routes=explode('/',$this->getRequest()->getRequestUri());
    $id=$routes[count($routes)-1];
    \Drupal::service('trainee_users.user_service')->deleteUser($id);
    $form_state->setRedirect("trainee_users.main_page");
  }

  /**
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup
   */
  public function getQuestion()
  {
      return $this->t('Are you sure you want to delete this user?');
  }
  /**
   * @return Url
   */
  public function getCancelUrl()
  {
      return new Url('trainee_users.main_page');
  }


}
