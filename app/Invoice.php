<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discount', 'invoice_no', 'user_id', 'date','due_date','sub_total','grand_total','vat','service_1', 'service_2','service_3','service_4','service_5',
        'service_1_price', 'service_1_price', 'service_2_price', 'service_3_price', 'service_4_price', 'service_5_price',
        'qty_1', 'qty_2', 'qty_3', 'qty_4', 'qty_5', 'docs', 'des', 'status', 'vat_amount', 'discount_amount'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
