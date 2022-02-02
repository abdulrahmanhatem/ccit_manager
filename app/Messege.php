<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messege extends Model
{
    protected $table = 'messeges';
    /**
     * Fields that are mass assignable
     *
     * @var array
     */

    protected $fillable = ['messege', 'user_id', 'project_id', 'docs'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
