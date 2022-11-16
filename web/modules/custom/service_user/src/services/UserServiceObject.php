<?php

namespace Drupal\service_user\services;
use Drupal\service_user\interfaces\IRequest;
use GuzzleHttp;

class UserServiceObject implements IRequest
{
  private $uri="https://gorest.co.in/public/v2/users";
  private $client;
  private $token="7e8c447ccef10ba84d23ffb9d3272e8ae8cc8869b77724ad050c3af4130fcb29";

  public function __construct()
  {
      $this->client=new GuzzleHttp\Client();
  }

  public function getList(): string
  {
     $result=$this->client->request('GET',$this->uri . "?access-token=" . $this->token);
     return $result->getBody()->getContents();
  }

  public function createUser($parameters)
  {
    $result=$this->client->request('POST',$this->uri . "?access-token=$this->token",[
      'json' => ['name' => $parameters['name'],'email' => $parameters['email'], 'gender' => $parameters['gender'], 'status' => $parameters['status']]
    ]);
  }

  public function deleteUser($parameters)
  {
      $id=$parameters['id'];

      $result=$this->client->request('DELETE',$this->uri . "/$id?access-token=$this->token");
  }

  public function updateUser($parameters)
  {
    $id=$parameters['id'];

    $result=$this->client->request('PATCH',$this->uri . "/$id?access-token=$this->token",[
      'json' => ['name' => $parameters['name'],'email' => $parameters['email'], 'gender' => $parameters['gender'], 'status' => $parameters['status']]
    ]);
  }

  public function getUserDetails($parameters)
  {
    $id=$parameters['id'];
    $result=$this->client->request('GET',$this->uri . "/$id?access-token=$this->token");
    return $result->getBody()->getContents();
  }
}
