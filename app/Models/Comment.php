<?php

namespace Crimibook\Models;

use Caffeinated\Presenter\Traits\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use PresentableTrait;

    /**
     * This presenter
     *
     * @var string
     */
    protected $presenter = 'Crimibook\Presenters\CommentPresenter';


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'status_id', 'body'];


    /**
     * Set comment
     *
     * @param $body
     * @param $status_id
     * @return static
     */
    public static function leave($body, $status_id)
    {
        return new static([

            'body' => $body,
            'status_id' => $status_id
        ]);
    }

    //Relations

    /**
     * This belongs to one User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('Crimibook\User', 'user_id');
    }

    /**
     * This belongs to one Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('Crimibook\Models\Status', 'status_id');
    }
}
