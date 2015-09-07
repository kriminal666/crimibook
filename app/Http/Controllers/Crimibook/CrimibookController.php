<?php

namespace Crimibook\Http\Controllers\Crimibook;

use Crimibook\Http\Controllers\Controller;
use Crimibook\Http\Repositories\StatusRepository;
use Crimibook\Http\Requests;
use Crimibook\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrimibookController extends Controller
{

    /**
     * @var StatusRepository
     */
    protected $statusRepo;

    /**
     * Constructor
     *
     * @param StatusRepository $statusRepo
     */
    function __construct(StatusRepository $statusRepo)
    {
        $this->middleware('auth');
        $this->statusRepo = $statusRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $statuses = $this->statusRepo->getFeedForUser(Auth::user());

        return View('crimibook.home_page', array('statuses' => $statuses));
    }


}
