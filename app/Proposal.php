<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'docs', 'name', 'price', 'expired_date', 'status'
    ];

    public function project(){
        return $this->belongsTo('App/Project');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
