<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'varietie_id',
        'price',
    ];
    protected $hidden = ['varietie_id'];
    


    public function scopeSelection($q)
    {
        return $q -> select('id','product_name','varietie_id','price');
    }
    public function varietie()
    {
        return $this->belongsTo('App\Model\varieties');
    }
    
    public function suppliers()
    {
        return $this->belongsToMany(suppliers::class,'productsuppliers');
    }

}
