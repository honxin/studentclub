<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    protected $fillable = ['name','poly_id'];
	//社团与活动一对多关系
	public function acts(){
		return $this->hasMany('App\Models\Activity')->withTimestamps();
	}
	//上面acts方法冲突重新定义getActs
	public function getActs(){
		return $this->belongsToMany('App\Models\Activity');
	}
	public static function getPolyName($poly_id){
		$poly = \DB::table('polies')->where('id','=',$poly_id)->select('name')->first();
		return $poly->name;
	}
	//社团与社团信息一对一关系
	public function info(){
   		return $this->hasOne('App\Models\Associnfo','assoc_id','id');
   }
	
	//社团与评论的多态关联
	public function comment(){
	    return $this->morphMany('App\Models\Comment','item','item_type','item_id','id');
	    //$this->morphMany('App\Models\Comment','item');
	}
	
}
