<?php

namespace Crimibook\Http\Controllers\Album;

use Crimibook\Http\Repositories\AlbumRepository;
use Crimibook\Http\Utils\Validator\AlbumForm;
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
            flash()->error('Error', 'Error creating new album. Try to change the name');
            return back();
        }

        flash()->success('New album', 'New album ' . $album->name . ' created');
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

    public function shareWith(Request $request)
    {
        return $request->all();
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
