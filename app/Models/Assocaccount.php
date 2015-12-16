<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assocaccount extends Model
{
    protected $fillable = ['name','password','realname','sex','assoc_id','email','qq_num','phone_num','status','reg_time','login_time'];
	
	public static function getAssocs(){
		return \DB::table('associates')->lists('name', 'id');
	}
	
	public static function getAssocName($assoc_id){
		$assoc =  \DB::table('associates')->select('name')->where('id','=',$assoc_id)->get();
		
		return $assoc[0]->name;
	}
}
