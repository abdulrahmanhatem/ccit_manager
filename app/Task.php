<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'team_members','project_id', 'start_at', 'end_at', 'can_view', 'status', 'docs', 'des'
    ];

    public function project(){
        return $this->belongsTo('App\Project');
    }

}
