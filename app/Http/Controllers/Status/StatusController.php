<?php

namespace Crimibook\Http\Controllers\Status;

use Crimibook\Http\Controllers\Controller;
use Crimibook\Http\Repositories\StatusRepository;
use Crimibook\Http\Requests;
use Crimibook\Http\Utils\Validator\StatusForm;
use Crimibook\Models\Status;
use Crimibook\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatusController extends Controller
{

    /**
     * @var StatusForm
     */
    protected $statusForm;
    /**
     * @var
     */
    protected $statusRepo;

    function __construct(StatusForm $statusForm, StatusRepository $statusRepository)
    {
        $this->middleware('auth');
        $this->statusForm = $statusForm;
        $this->statusRepo = $statusRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

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

        User::whoHas(Auth::user()->id)->publishStatus($status);

        flash()->success('Status', 'Status created');

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
