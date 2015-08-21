<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 12/08/15
 * Time: 20:52
 */

namespace Crimibook\Http\Repositories;


class FollowRepository
{

    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @var AlbumRepository
     */
    protected $albumRepo;

    /**
     * Constructor
     *
     * @param UserRepository $userRepo
     * @param AlbumRepository $albumRepo
     */
    function __construct(UserRepository $userRepo, AlbumRepository $albumRepo)
    {
        $this->userRepo = $userRepo;
        $this->albumRepo = $albumRepo;
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

    public function unFollowUser($input)
    {

        $user = $this->userRepo->findById($input['user_id']);

        $userToUnFollow = $this->userRepo->findById($input['userIdToUnFollow']);

        $this->albumRepo->unShareAllAlbums($user, $userToUnFollow);

        return $this->userRepo->unFollow($input['userIdToUnFollow'], $user);

    }


}