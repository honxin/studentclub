<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Role extends Model
{
    protected $fillable = ['role_name','status'];
	
	public function auths(){
		return $this->belongsToMany('App\Models\Auth')->withTimestamps();
	}
}
