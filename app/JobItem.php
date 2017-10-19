<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobItem extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['job_id', 'product_id', 'cover_id', 'paper_price_id', 'no_of_sheets', 'lamination', 'cost', 'packaging_id',];
}
