<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    protected $fillable = [
        'supplier_name',
        'address',
        'tele_number'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Model\Product');
    }
}
