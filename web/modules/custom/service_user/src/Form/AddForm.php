<?php

namespace Drupal\service_user\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\service_user\services\UserServiceObject;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AddForm extends FormBase
{

  public function getFormId()
  {
      return 'add_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
      $form['name']=array(
        '#type' => 'textfield',
        '#title' => $this->t('Your name')
      );

      $form['email']=array(
        '#type' => 'email',
        '#title' => $this->t('Your email address')
      );

      $form['gender']=array(
        '#type' => 'select',
        '#title' => $this->t('Your gender'),
        '#options' => [
          'male' => $this->t('male'),
          'female' => $this->t('female')
        ]
      );

      $form['status']=array(
        '#type' => 'select',
        '#title' => $this->t('Your status'),
        '#options' => [
          'active' => $this->t('active'),
          'inactive' => $this->t('inactive')
        ]
      );

      $form['actions']['#type'] = 'actions';

      $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Create user'),
        '#button_type' => 'primary',
      );

      return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {
      $resultName=explode(" ",$form_state->getValue('name'));
      if (count($resultName)!=2)
      {
          $form_state->setErrorByName('name',$this->t('You must enter name like: Ivan Ivanov'));
      }
      elseif (strlen($resultName[0])==0 || strlen($resultName[1])==0)
      {
          $form_state->setErrorByName('name',$this->t('You must enter name like: Ivan Ivanov'));
      }
      if (!filter_var($form_state->getValue('email'), FILTER_VALIDATE_EMAIL))
      {
          $form_state->setErrorByName('email',$this->t('Entered email is invalid'));
      }
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
      $client=new UserServiceObject();
      $parameters=array();
      $parameters['name']=$form_state->getValue('name');
      $parameters['email']=$form_state->getValue('email');
      $parameters['gender']=$form_state->getValue('gender');
      $parameters['status']=$form_state->getValue('status');

      $client->createUser($parameters);

      $response=new RedirectResponse("http://drupal.docker.localhost/mainPage");
      $response->send();
  }
}
