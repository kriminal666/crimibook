<?php

namespace Crimibook\Http\Controllers\Photo;

use Crimibook\Http\Repositories\AlbumRepository;
use Crimibook\Http\Utils\Validator\PhotoForm;
use Crimibook\Models\Album;
use Crimibook\Models\Photo;
use Illuminate\Http\Request;

use Crimibook\Http\Requests;
use Crimibook\Http\Controllers\Controller;

class PhotoController extends Controller
{

    /**
     * Album repository
     * @var
     */
    protected $albumRepo;

    /**
     * Constructor
     *
     * @param AlbumRepository $albumRepo
     */
    function __construct(AlbumRepository $albumRepo)
    {
        $this->middleware('auth');
        $this->albumRepo = $albumRepo;
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
     * @param $album_id
     * @param  Request $request
     * @param PhotoForm $photoForm
     * @return Response
     */
    public function store($album_id, Request $request , PhotoForm $photoForm)
    {
        $photoForm->validate($request->only('photo'));

        $album = Album::findOrFail($album_id);

        $photo = Photo::fromForm($request->file('photo'), $album->name);

        $this->albumRepo->storePhotoInAlbum($album, $photo);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
