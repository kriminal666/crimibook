<?php

namespace Crimibook\Http\Controllers\Status;

use Crimibook\Http\Utils\Validator\StatusForm;
use Crimibook\Models\Status;
use Crimibook\User;
use Illuminate\Http\Request;

use Crimibook\Http\Requests;
use Crimibook\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class StatusController extends Controller
{

    protected $statusForm;

    function __construct(StatusForm $statusForm)
    {
        $this->statusForm = $statusForm;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View('status.index');
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
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->statusForm->validate($request->all());

        $status = Status::fromForm($request);

        User::whoHas($request->user_id)->publishStatus($status);

        flash()->success('Status', 'Status created');
        $statuses = Auth::User()->statuses->sortByDesc('created_at');

        return View('crimibook.home_page', array('statuses' => $statuses));

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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
