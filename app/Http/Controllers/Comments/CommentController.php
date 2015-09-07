<?php

namespace Crimibook\Http\Controllers\Comments;

use Crimibook\Http\Repositories\StatusRepository;
use Crimibook\Http\Utils\Validator\CommentForm;
use Illuminate\Http\Request;

use Crimibook\Http\Requests;
use Crimibook\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    /**
     * Form validator
     *
     * @var
     */
    protected $commentForm;

    /**
     * Status repository
     *
     * @var
     */
    protected $statusRepo;

    /**
     * Constructor
     *
     * @param CommentForm $commentForm
     * @param StatusRepository $statusRepo
     */
    function __construct(CommentForm $commentForm, StatusRepository $statusRepo)
    {
        $this->commentForm = $commentForm;
        $this->statusRepo = $statusRepo;
    }


    /**
     * New status comment
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->commentForm->validate($request->all());

        $input = array_add($request->all(), 'user_id', Auth::id());

        $this->statusRepo->leaveComment($input);

        return back();


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
     * Remove comment
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->statusRepo->deleteComment($id);
        return back();

    }
}
