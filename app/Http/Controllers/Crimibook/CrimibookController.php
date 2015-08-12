<?php

namespace Crimibook\Http\Controllers\Crimibook;

use Crimibook\Http\Repositories\StatusRepository;
use Crimibook\Models\Status;
use Illuminate\Http\Request;

use Crimibook\Http\Requests;
use Crimibook\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CrimibookController extends Controller
{

    protected $statusRepo;

    function __construct(StatusRepository $statusRepo)
    {
        $this->statusRepo = $statusRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuses =  $this->statusRepo->getFeedForUser(Auth::user());

        return View('crimibook.home_page', array('statuses' => $statuses));
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
