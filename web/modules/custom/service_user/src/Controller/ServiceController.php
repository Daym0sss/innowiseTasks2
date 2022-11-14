<?php

namespace Drupal\service_user\Controller;

class ServiceController
{
    public function mainPage(): array
    {
        /*$params=array(
          'id' => '4924',
          'name' => 'Ivan Lodnya',
          'email' => 'lavandos322@gmail.com',
          'gender' => 'male',
          'status' => 'inactive'
        );
        $params=array(
          'id' => '4924'
        );*/

        $response=\Drupal::service('service_user.user_service')->getList();
        $obj_arr=json_decode($response);
        $result_arr=array();

        foreach ($obj_arr as $obj)
        {
            $temp=array();

            $temp['id']=$obj->{'id'};
            $temp['name']=$obj->{'name'};
            $temp['email']=$obj->{'email'};
            $temp['gender']=$obj->{'gender'};
            $temp['status']=$obj->{'status'};

            $result_arr[] = $temp;
        }

        return [
            '#theme' => 'main_template',
            '#data' => $result_arr,
        ];
    }
}
