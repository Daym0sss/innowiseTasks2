<?php

namespace Drupal\trainee_users;

/**
 * Interface contains methods signature, which can be
 * implemented to make request for users data API
 */
interface UserServiceInterface
{

  /**
   * @return array containing the information about users
   */
  public function getList(): array;

  /**
   * @param $parameters array  containing userName, userEmail, userGender, userStatus
   * @return int as status code of request
   */
  public function createUser(array $parameters): int;

  /**
   * @param $id int as userId
   * @return int as status code of request
   */
  public function deleteUser(int $id): int;

  /**
   * @param $id int as userId
   * @param $parameters array containing userName, userEmail, userGender, userStatus
   * @return int as status code of request
   */
  public function updateUser(int $id, array $parameters): int;

  /**
   * @param $id int as userId
   * @return array containing userName, userEmail, userGender, userStatus
   */
  public function getUserById(int $id): array;
}
