<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    protected $table = 'projects';

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'des', 'services', 'technologies','user_id', 'progress', 'start_date', 'end_date', 'actual_end_date', 'status',
        'earnings', 'expenses', 'priority', 'manager_id'
    ];

    // public function user(){
    //     return $this->belongsTo('App/User');
    // }

    public function proposals(){
        return $this->hasMany('App\Proposal');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function milestones(){
        return $this->hasMany('App\Milestone');
    }

    public function invoices(){
        return $this->hasMany('App\Invoice');
    }

    public function contracts(){
        return $this->hasMany('App\Contract');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function manager(){
        $manager = User::find($this->manager_id);
        return $manager;
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    } 

    public function messeges()
    {
        return $this->hasMany('App\Messege')->orderBy('created_at', 'desc');
    } 
    
}
