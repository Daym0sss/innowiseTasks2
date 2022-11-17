<?php

namespace Drupal\trainee_users;

use GuzzleHttp;

/**
 * class implements UserServiceInterface and
 * works with users data via Go Rest API
 */
class UserService implements UserServiceInterface{

  /**
   * @var string contains uri address for requests to database
   */
  private string $uri = "https://gorest.co.in/public/v2/users";

  /**
   * @var GuzzleHttp\Client object that is used to make requests
   */
  private GuzzleHttp\Client $client;

  /**
   * @var string authorization token to access database data
   */
  private string $token = "7e8c447ccef10ba84d23ffb9d3272e8ae8cc8869b77724ad050c3af4130fcb29";

  /**
   * Creates client for further requests
   */
  public function __construct()
  {
      $this->client=new GuzzleHttp\Client();
  }

  /**
   * @return array containing the information about users
   * @throws GuzzleHttp\Exception\GuzzleException if the request fails
   */
  public function getList(): array
  {
     $result = $this->client->request('GET',$this->uri . "?access-token=" . $this->token);
     return json_decode($result->getBody()->getContents());
  }

  /**
   * @param array $parameters containing userName, userEmail, userGender, userStatus
   * @return int as status code of request
   * @throws GuzzleHttp\Exception\GuzzleException if the request fails
   */
  public function createUser(array $parameters): int
  {
    $result=$this->client->request('POST',$this->uri . "?access-token=$this->token",[
      'json' => ['name' => $parameters['name'],'email' => $parameters['email'], 'gender' => $parameters['gender'], 'status' => $parameters['status']]
    ]);
    return $result->getStatusCode();
  }

  /**
   * @param int $id as userId
   * @return int as status code of request
   * @throws GuzzleHttp\Exception\GuzzleException if the request fails
   */
  public function deleteUser(int $id): int
  {
      $result=$this->client->request('DELETE',$this->uri . "/$id?access-token=$this->token");
      return $result->getStatusCode();
  }

  /**
   * @param int $id as userId
   * @param array $parameters containing new info: userName, userEmail, userGender, userStatus
   * @return int as status code of request
   * @throws GuzzleHttp\Exception\GuzzleException if the request fails
   */
  public function updateUser(int $id, array $parameters): int
  {
    $result=$this->client->request('PATCH',$this->uri . "/$id?access-token=$this->token",[
      'json' => ['name' => $parameters['name'],'email' => $parameters['email'], 'gender' => $parameters['gender'], 'status' => $parameters['status']]
    ]);
    return $result->getStatusCode();
  }

  /**
   * @param int $id as userId
   * @return array containing userName, userEmail, userGender, userStatus
   * @throws GuzzleHttp\Exception\GuzzleException if the request fails
   */
  public function getUserById(int $id): array
  {
    $result=$this->client->request('GET',$this->uri . "/$id?access-token=$this->token");
    return json_decode($result->getBody()->getContents());
  }
}
