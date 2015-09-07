<?php

namespace Crimibook\Http\Controllers\Home;

use Crimibook\Http\Controllers\Controller;
use Crimibook\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    /**
     * Path to redirect
     *
     * @var string
     */
    protected $redirectTo = '/home_page';

    /**
     *Constructor
     *
     */
    function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Return index page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Change app language
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage()
    {

        $language = Input::get('lang'); //lang is name of form select field.

        Session::put('language', $language);
        App::setLocale($language);

        return back();

    }


}
