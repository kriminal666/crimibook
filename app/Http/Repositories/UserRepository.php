<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 9/08/15
 * Time: 22:18
 */

namespace Crimibook\Http\Repositories;


use Crimibook\User;

class UserRepository {


    /**
     * Get paginated list of all users
     * @param int $howMany
     * @return mixed
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('name', 'asc')->paginate($howMany);
    }

    /**
     * find user by name
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {

        return User::whereName($name)->first();

    }

    /**
     * Find user by id
     *
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {

        return User::whereId($id)->first();

    }

}