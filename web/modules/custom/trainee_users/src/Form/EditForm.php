<?php

namespace Drupal\trainee_users\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class EditForm extends FormBase
{
  private $id;

  public function getFormId()
  {
      return 'edit_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
      $uri = $this->getRequest()->getRequestUri();
      $routes=explode('/',$uri);
      $id=$routes[count($routes)-1];
      $this->id=$id;

      $obj=\Drupal::service('trainee_users.user_service')->getUserById($id);

      $form['name']=array(
        '#type' => 'textfield',
        '#title' => $this->t('Your name'),
        '#default_value' => $this->t($obj->{'name'}),
      );

      $form['email']=array(
        '#type' => 'email',
        '#title' => $this->t('Your email address'),
        '#default_value' => $this->t($obj->{'email'}),
      );

      $form['gender']=array(
        '#type' => 'select',
        '#title' => $this->t('Your gender'),
        '#options' => [
          'male' => $this->t('male'),
          'female' => $this->t('female')
        ],
        '#default_value ' => $this->t($obj->{'gender'}),
      );

      $form['status']=array(
        '#type' => 'select',
        '#title' => $this->t('Your status'),
        '#options' => [
          'active' => $this->t('active'),
          'inactive' => $this->t('inactive')
        ],
        '#default_value' => $this->t($obj->{'status'}),
      );

      $form['actions']['#type'] = 'actions';

      $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Edit user'),
        '#button_type' => 'primary',
      );

      return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    $resultName=explode(" ",$form_state->getValue('name'));
    if (count($resultName)==0)
    {
      $form_state->setErrorByName('name',$this->t('You must enter name like: Ivan Ivanov'));
    }
    if (!\Drupal::service('email.validator')->isValid($form_state->getValue('email')))
    {
      $form_state->setErrorByName('email',$this->t('Entered email is invalid'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
      $parameters = array();
      $parameters['id'] = $this->id;
      $parameters['name'] = $form_state->getValue('name');
      $parameters['email'] = $form_state->getValue('email');
      $parameters['gender'] = $form_state->getValue('gender');
      $parameters['status'] = $form_state->getValue('status');

      \Drupal::service('trainee_users.user_service')->updateUser($parameters);
      $form_state->setRedirect("trainee_users.main_page");
  }
}
