<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $table = 'milstones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'grand_total', 'date', 'order'
    ];

    public function project(){
        return $this->belongsTo('App/Project');
    }
}
