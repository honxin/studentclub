<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    protected $fillable = ['name','password','role_id','realname','sex','email','qq_num','phone_num','status','reg_time'];
	
	public function getRoleName($role_id){
		$role = \DB::table('roles')->where('id','=',$role_id)->select('role_name')->first();
		return $role->role_name;
	}
}
