<?php

namespace Crimibook\Http\Controllers\Home;

use Illuminate\Http\Request;

use Crimibook\Http\Requests;
use Crimibook\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function contact()
    {
        flash()->overlay('Contact','kriminalaverno@gmail.com','info');
        return back();
    }


}
