<?php

namespace Drupal\trainee_users\Controller;

class UserListPageController{

    public function mainPage(): array{
        $response=\Drupal::service('trainee_users.user_service')->getList();
        $links = array(
          'add' => 'trainee_users.add_user_page_form',
          'edit' => 'trainee_users.edit_user_page_form',
          'delete' => 'trainee_users.delete_user_page_form'
        );

        return [
          '#theme' => 'main_template',
          '#data' => $response,
          '#links' => $links
        ];
    }
}
