<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['job_name', 'user_id', 'vendor_id', 'cost', 'delivery_address', 'city', 'state', 'phone_number',];
}
