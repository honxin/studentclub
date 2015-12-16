<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poly extends Model
{
    protected $fillable = ['name'];
	
	public function assocs(){
		return $this->hasMany('App\Models\Associate','poly_id','id');
	}
}
