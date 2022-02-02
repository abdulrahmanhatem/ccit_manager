<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'task_id', 'docs', 'marked', 'subject', 'text'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }


}
