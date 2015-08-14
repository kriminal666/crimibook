<?php

namespace Crimibook\Http\Controllers\Home;

use Crimibook\Http\Controllers\Controller;
use Crimibook\Http\Requests;

class HomeController extends Controller
{

    /**
     * Path to redirect
     *
     * @var string
     */
    protected $redirectTo = '/home_page';

    function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.home');
    }




}
