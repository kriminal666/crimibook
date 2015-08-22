<?php

namespace Crimibook\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['path', 'album_id'];


    //relations

    /**
     * This belongs to one album
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function albums()
    {
        return $this->belongsTo('Crimibook\Models\Album', 'album_id');
    }


    public static function fromForm(UploadedFile $file, $albumName)
    {
        $photo = new static;

        $path =  'images/' . Auth::user()->name . '/albums/' . $albumName .'/';

        $name = time() . $file->getClientOriginalName();

        $photo->path = '/' . $path . $name;

        $file->move($path, $name);

        return $photo;
    }
}
