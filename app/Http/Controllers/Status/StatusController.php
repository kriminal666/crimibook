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
use Illuminate\Support\Facades\Response;


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

        flash()->success(trans('messages.status_title'), trans('messages.status_body'));

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
     * Remove status from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $input = [

            'status_id' => $id,
            'user_id' => Auth::id(),

        ];

        if (!$this->statusRepo->deleteStatus($input)) {
            return Response::make(['', 404, '']);
        }

        return Response::make(['', 200, '']);


    }
}
