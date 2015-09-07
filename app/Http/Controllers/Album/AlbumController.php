<?php

namespace Crimibook\Http\Controllers\Album;

use Crimibook\Http\Repositories\AlbumRepository;
use Crimibook\Http\Utils\Validator\AlbumForm;
use Crimibook\Http\Utils\Validator\AlbumShareForm;
use Crimibook\Models\Album;
use Illuminate\Http\Request;

use Crimibook\Http\Requests;
use Crimibook\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{


    /**
     * Album repository
     *
     * @var
     */
    protected $albumRepo;

    protected $albumForm;

    /**
     * Constructor
     *
     * @param AlbumRepository $albumRepo
     * @param AlbumForm $albumForm
     */

    function __construct(AlbumRepository $albumRepo, AlbumForm $albumForm)
    {
        $this->middleware('auth');
        $this->albumRepo = $albumRepo;
        $this->albumForm = $albumForm;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new album.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.albums.album_create');
    }

    /**
     * Store new album
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->albumForm->validate($request->all());

        $input = array_add($request->all(), 'user_id', Auth::id());
        $album = $this->albumRepo->saveAlbum($input);

        if (is_null($album)) {
            flash()->error('Error', trans('messages.album_error'));
            return back();
        }

        flash()->success(trans('messages.album_success1'), trans('messages.album_success1') . $album->name . trans('messages.album_success2'));
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
        $album = Album::findOrFail($id);

        return View('users.albums.album-show', array('album' => $album));
    }

    /**
     * Share album with followers
     *
     * @param AlbumShareForm $albumShareForm
     * @param AlbumShareForm|Request $request
     * @return array
     * @throws \Crimibook\Http\Utils\Validator\FormValidationException
     */
    public function shareWith(AlbumShareForm $albumShareForm, Request $request)
    {

        $albumShareForm->validate($request->only('shareWith'));

        $album = $this->albumRepo->shareAlbumWith($request->except('_token'));

        flash()->success('Album shared', 'Album ' . $album->name . ' shared with your friends.');

        return back();
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
