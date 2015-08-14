<?php

namespace Crimibook\Http\Controllers\Flash;


use Crimibook\Http\Requests;
use Crimibook\Http\Controllers\Controller;

class FlashController extends Controller
{
    /**
     * Contact information
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact()
    {
        flash()->overlay('Contact', 'kriminalaverno@gmail.com', 'info');
        return back();
    }

    /**
     * About Information
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function about()
    {
        flash()->overlay('About', 'Crimibook, done with Laravel 5.1 framework', 'info');
        return back();
    }
}
