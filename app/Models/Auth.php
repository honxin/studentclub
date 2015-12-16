<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $fillable = ['parent_id','auth_name','module_name','controller_name','action_name'];
	
	public static function getAuth(){
		return \DB::table('auths')->select('auth_name','parent_id', 'id')->get();
	}
	
	public function roles(){
		return $this->belongsToMany('App\Models\Role');
	}
	
}
