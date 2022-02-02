<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Ticket extends Model
{
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender_id', 'receiver_id', 'category', 'subject', 'text', 'docs', 'status', 'ticket_id'
    ];

    public function sender(){
        return $this->belongsTo('App\User');
    }

    public function receiver(){
        return $this->belongsTo('App\User');
    }

    public function messeges(){
        $messeges = Ticket::where('ticket_id', $this->id)->orderBy('created_at', 'desc')->get();
        return $messeges;
    }

    public function customer(){
        $customer = '';
        $sender = User::find( $this->sender_id);
        $receiver = User::find($this->receiver_id);

        return $sender;
        if($sender->role->name == 'customer'){
            $customer =  $sender;
            return $customer ;
        }
        if($receiver ){
            if($receiver->role->name == 'customer'){
                $customer =  $receiver;
                return $customer ;
            }
        }
    }
}
