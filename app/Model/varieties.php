<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class varieties extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
    

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
