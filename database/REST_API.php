<?php

/**
 * @OA\Info(
 *     title="REST API GoRest",
 *     version="0.1"
 * )
 * @OA\Server(
 *     url="https://gorest.co.in/public/v2/users"
 * )
 */
class REST_API extends Database implements IRequest
{
    private $token = "7e8c447ccef10ba84d23ffb9d3272e8ae8cc8869b77724ad050c3af4130fcb29";

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if(!self::$instance || get_class(self::$instance) != "REST_API")
        {
            self::$instance = new REST_API();
        }
        return self::$instance;
    }

    /**
     * @OA\Post(
     *      path="/",
     *      operationId="createUser",
     *      description="create new user",
     *     @OA\Parameter(
     *          name="access-token",
     *          in="query",
     *          description="Authorization token",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *      @OA\RequestBody(
     *          description="User information",
     *          required=true,
     *          @OA\JsonContent(
     *                  type="array",
     *                  @OA\Items(type="string")
     *          )
     *      ),
     *     @OA\Response(
     *          response="200",
     *          dsecription="Information about created user",
     *          @OA\JsonContent(
     *                  type="array",
     *                  @OA\Items(type="string")
     *          )
     *     )
     * )
     */
    public function create($name, $email, $gender, $status)
    {
        $token = $this->token;
        $curl = "curl -i -H \"Accept:application/json\" -H \"Content-Type:application/json\" -H \"Authorization: Bearer ACCESS-TOKEN\" -XPOST \"https://gorest.co.in/public/v2/users?access-token=$token\" -d ";
        $json = "'{\"name\":\"$name\", \"email\":\"$email\", \"gender\":\"$gender\", \"status\":\"$status\"}'";
        $curl .= $json;
        $output = [];
        $code = 0;
        exec($curl,$output,$code);
    }

    /**
     * @OA\Put(
     *      path="/{id}",
     *      operationId="updateUser",
     *      description="updates existing user",
     *      @OA\Parameter(
     *              name="access-token",
     *              in="query",
     *              description="Authorization token",
     *              required=true,
     *              @OA\Schema(
     *                  type="string",
     *              )
     *      ),
     *      @OA\Parameter(
     *              name="id",
     *              in="query",
     *              description="User id",
     *              required=true,
     *              @OA\Schema(
     *                  type="integer",
     *              )
     *      ),
     *      @OA\RequestBody(
     *          description="User information",
     *          required=true,
     *          @OA\JsonContent(
     *                  type="array",
     *                  @OA\Items(type="string")
     *          )
     *      ),
     *     @OA\Response(
     *          response="200",
     *          dsecription="Information about updated user",
     *          @OA\JsonContent(
     *                  type="array",
     *                  @OA\Items(type="string")
     *          )
     *     )
     * )
     */
    public function edit($id, $name, $email, $gender, $status)
    {
        $token = $this->token;
        $curl = "curl -i -H \"Accept:application/json\" -H \"Content-Type:application/json\" -H \"Authorization: Bearer ACCESS-TOKEN\" -XPATCH \"https://gorest.co.in/public/v2/users/$id?access-token=$token\" -d '{\"name\":\"$name\", \"email\":\"$email\", \"gender\":\"$gender\", \"status\":\"$status\"}'";
        exec($curl,$arr);
    }

    /**
     * @OA\Get(
     *     path="/",
     *     operationId="getList",
     *     @OA\Parameter(
     *          name="access-token",
     *          in="query",
     *          description="Authorization token",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="List of users with information",
     *          @OA\JsonContent(
     *                  type="array",
     *                  @OA\Items(type="string")
     *          )
     *     )
     * )
     */
    public function getList()
    {
        $token = $this->token;
        $curl = "curl -i -H \"Accept:application/json\" -H \"Content-Type:application/json\" -H \"Authorization: Bearer ACCESS-TOKEN\" -XGET \"https://gorest.co.in/public/v2/users?page=1&per_page=50&access-token=$token\"";
        exec($curl,$arr);
        $arr = json_decode($arr[31]);
        $result = [];
        if ($arr != null)
        {
            foreach ($arr as $obj)
            {
                $temp = [];
                $temp['id'] = $obj->{"id"};
                $temp['name'] = $obj->{"name"};
                $temp['email'] = $obj->{"email"};
                $temp['gender'] = $obj->{"gender"};
                $temp['status'] = $obj->{"status"};
                $result []= $temp;
            }
        }
        return $result;
    }

    /**
     * @OA\Get(
     *     path="/{id}",
     *     operationId="getUserById",
     *     @OA\Parameter(
     *          name="access-token",
     *          in="query",
     *          description="Authorization token",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="id",
     *          in="query",
     *          description="User id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Requested user with its information",
     *          @OA\JsonContent(
     *                  type="array",
     *                  @OA\Items(type="string")
     *          )
     *     )
     * )
     */
    public function getById($id)
    {
        $token = $this->token;
        $curl = "curl -i -H \"Accept:application/json\" -H \"Content-Type:application/json\" -H \"Authorization: Bearer ACCESS-TOKEN\" -XGET \"https://gorest.co.in/public/v2/users/$id?access-token=$token\"";
        exec($curl,$arr);
        $obj = json_decode($arr[24]);
        $result = [];

        $result[] = [
            'id' => $obj->{"id"},
            'name' => $obj->{"name"},
            'email' => $obj->{"email"},
            'gender' => $obj->{"gender"},
            'status' => $obj->{"status"},
        ];

        return $result;
    }

    /**
     * @OA\Delete(
     *     path="/{id}",
     *     operationId="deleteUser",
     *     @OA\Parameter(
     *          name="access-token",
     *          in="query",
     *          description="Authorization token",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="id",
     *          in="query",
     *          description="User id",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *          response=201,
     *          description="User deleted",
     *     )
     * )
     */
    public function delete($id)
    {
        $token = $this->token;
        $curl = "curl -i -H \"Accept:application/json\" -H \"Content-Type:application/json\" -H \"Authorization: Bearer ACCESS-TOKEN\" -XDELETE \"https://gorest.co.in/public/v2/users/$id?access-token=$token\"";
        exec($curl,$arr);
    }

    public function deleteGroup($id_arr)
    {
        foreach ($id_arr as $id)
        {
            $token=$this->token;
            $curl="curl -i -H \"Accept:application/json\" -H \"Content-Type:application/json\" -H \"Authorization: Bearer ACCESS-TOKEN\" -XDELETE \"https://gorest.co.in/public/v2/users/$id?access-token=$token\"";
            exec($curl,$arr);
        }
    }

    public function getByPageNum($from_record_number, $records_per_page)
    {
        $users = $this->getList();
        $result = [];
        for($i = $from_record_number;$i < $from_record_number + $records_per_page;$i++)
        {
            $result [] = $users[$i];
        }

        return $result;
    }

    public function pagesCount($records_per_page)
    {
        $total = count($this->getList());
        if ($total % $records_per_page != 0)
        {
            $result = $total / $records_per_page + 1;
        }
        else
        {
            $result = $total / $records_per_page;
        }
        return $result;
    }
}