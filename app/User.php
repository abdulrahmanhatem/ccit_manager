<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Invoice;
use App\Contract;
use App\Project;
use App\Ticket;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'first_name','last_name', 'email','password','phone','avatar','website','role_id','address','country','state','city','lang',
         'company_name', 'category_id', 'bank_name', 'bank_account_name', 'bank_account_no', 'iban'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  

    public function isAdmin(){
        if($this->role != NULL) {
            if ($this->role->name == "admin" && $this->is_active == 0) {
                return true;
            }elseif($this->role->name == "team" && $this->category_id == 1 && $this->is_active == 0){
                return true;
            }
            return false;
        }
        return false;
    }

    public function isPM(){
        if($this->role != NULL) {
            if ($this->role->name == "team") {
                if($this->category_id == 1){
                    return true;
                }
                return false;
            }
        }
        return false;
    }

    public function isTeamMember(){
        if($this->role != NULL) {
            if ($this->role->name == "team" && $this->category_id  != 1 && $this->is_active == 0 ) {
                return true;
            }
        }
        return false;
    }

    public function isCustomer(){
        if($this->role != NULL) {
            if ($this->role->name == "customer" && $this->is_active == 0) {
                return true;
            }
        }
        return false;
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function proposals(){
        return $this->hasMany('App\Proposal');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    public function invoices(){
        return $this->hasMany('App\Invoice');
    }

    public function messages()
    {
        return $this->hasMany('App\Invoice');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function notes()
    {
        return $this->hasMany('App\Note');
    } 

    public function pendingInvoices(){
        $pendings = Invoice::where('user_id', $this->id)->where('status',  '0')->get();
        return $pendings;
    }

    public function contracts(){
        $project_ids = [];
        $projects = $this->projects;
        $projects = json_decode($projects, true);
        foreach ($projects as  $project) {
            array_push($project_ids, $project['id']);
        }
        $contracts = Contract::whereIn('project_id', $project_ids)->get();
        return $contracts;
    }

    public function tickets(){
        $sent = Ticket::where(['sender_id' => $this->id, 'ticket_id' => '0'])->get();
        $received = Ticket::where('receiver_id', $this->id)->where('ticket_id',  '0')->get();
        $tickets = $received->merge($sent);
        return $tickets;
    }

    public function isMyProject($id){
        $project = Project::where('user_id', $this->id)->where('id', $id)->get();
        if(count($project) > 0){
            return true;
        }else{
            return false;
        }
        
    }
}
