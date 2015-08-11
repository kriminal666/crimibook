<?php

namespace Crimibook\Models;

use Caffeinated\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Status extends Model
{

    use PresentableTrait;

    protected $presenter = 'Crimibook\Presenters\StatusPresenter';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','body', 'image'];

    public static function fromForm(Request $request)
    {
        $status = new static;
        $status->body = $request->body;
        if($request->file('image_path'))
        {
            $status->image_path = static::photo($request->file('image_path'));
        }


        return $status;
    }

    public static function photo(UploadedFile $file)
    {

        $name = time() . $file->getClientOriginalName();

        $path = 'images/' . Auth::user()->name . '/status_photos/';

        $file->move($path, $name);

        return '/' . $path . $name;
    }


    //Relations
    /**
     * This belongs to one User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('Crimibook\User','user_id');
    }



}
