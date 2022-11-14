<?php

namespace Drupal\service_user\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\service_user\services\UserServiceObject;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DeleteForm extends FormBase
{

    public function getFormId()
    {
        return 'delete_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['delete'] = array(
            '#type' => 'submit',
            '#name' => 'delete',
            '#value' => $this->t('Yes'),
            '#button_type' => 'primary',
            '#submit' => array([$this,'submit_deletion_submit']),
        );

        $form['cancel']=array(
            '#type' => 'submit',
            '#name' => 'cancel',
            '#value' => $this->t('No'),
            '#button_type' => 'primary',
            '#submit' => array([$this,'cancel_deletion_submit']),
        );

        return $form;
    }

    public function submit_deletion_submit(array &$form, FormStateInterface $form_state)
    {
        $routes=explode('/',$_SERVER['REQUEST_URI']);
        $id=$routes[count($routes)-1];

        $client=new UserServiceObject();
        $params=array(
            'id' => $id
        );
        $client->deleteUser($params);

        $response=new RedirectResponse("http://drupal.docker.localhost/mainPage");
        $response->send();
    }

    public function cancel_deletion_submit(array &$form, FormStateInterface $form_state)
    {
        $response=new RedirectResponse("http://drupal.docker.localhost/mainPage");
        $response->send();
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {

    }
}