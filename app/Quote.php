<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quotes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'city', '	features', 'services', 'project_link', 'budget', 'status', 'docs'
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
