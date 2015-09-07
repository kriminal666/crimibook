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
        flash()->overlay(trans('messages.about'), trans('messages.about_message'),'info');
        return back();
    }

    /**
     * Delete status ask
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteStatus()
    {
        flash()->delete(trans('messages.delete_title'), trans('messages.delete_ask1'), 'warning');
        return back();
    }
}
