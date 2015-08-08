<?php

namespace Crimibook\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Status extends Model
{
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

        $status->user_id = $request->user_id;
        $status->body = $request->body;
        $status->image = $request->image;

        return $status;
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
