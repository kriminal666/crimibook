<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 12/08/15
 * Time: 20:52
 */

namespace Crimibook\Http\Repositories;


class FollowRepository {

    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * Constructor
     *
     * @param UserRepository $userRepo
     */
    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * Follow one user
     *
     * @param $input
     * @return mixed
     */
    public function followUser($input)
    {

        //Get Auth user

        $user = $this->userRepo->findById($input['user_id']);

        return $this->userRepo->follow($input['userToFollow'], $user);




    }




}