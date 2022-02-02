<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    protected $table = 'team_categories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar'
    ];

}
