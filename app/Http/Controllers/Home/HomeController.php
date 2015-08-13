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

    /**
     * Contact information
     * @return Response
     */
    public function contact()
    {
        flash()->overlay('Contact', 'kriminalaverno@gmail.com', 'info');
        return back();
    }

    /**
     * About Information
     * @return \Illuminate\Http\RedirectResponse
     */
    public function about()
    {
        flash()->overlay('About', 'Crimibook, done with Laravel 5.1 framework', 'info');
        return back();
    }


}
