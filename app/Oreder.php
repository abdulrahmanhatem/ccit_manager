<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oreder extends Model
{
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_no', '	order_no', 'price', 'hours', 'date', 'tax', 'desc'
    ];
}
