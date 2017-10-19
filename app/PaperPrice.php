<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperPrice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'vendor_id', 'product_id', 'paper_type_id','size_id', 'price',];  
}
