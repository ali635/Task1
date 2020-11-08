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
    public function varieties()
    {
        return $this->belongsTo('App\Model\varieties','varietie_id','id');
    }
    
    public function suppliers()
    {
        return $this->belongsToMany(suppliers::class,'productsuppliers');
    }

}
