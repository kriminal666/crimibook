<?php

namespace Crimibook\Http\Controllers\Follows;

use Crimibook\Http\Controllers\Controller;
use Crimibook\Http\Repositories\FollowRepository;
use Crimibook\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    /**
     * @var
     */
    protected $followRepo;

    /**
     * Constructor
     *
     * @param FollowRepository $followRepo
     */
    function __construct(FollowRepository $followRepo)
    {
        $this->middleware('auth');
        $this->followRepo = $followRepo;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Follow a user
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $input = array_add($request->only('userToFollow'), 'user_id', Auth::id());

        $this->followRepo->followUser($input);

        flash()->success(trans('messages.follow_title'), trans('messages.follow_body'));

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * UnFollow a user
     *
     * @param $UserIdToUnFollow
     * @return Response
     * @internal param int $id
     */
    public function destroy($UserIdToUnFollow)
    {
        $input = [

            'userIdToUnFollow' => $UserIdToUnFollow,
            'user_id' => Auth::id()
        ];

        $this->followRepo->unFollowUser($input);

        flash()->success(trans('messages.unfollow_title'), trans('messages.unfollow_body'));

        return back();


    }
}
