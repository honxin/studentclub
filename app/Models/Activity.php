<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title','place','start_time','end_time','description','content'];
	
	//社团与活动多对一关系
	public function assocs(){
		return $this->belongsToMany('App\Models\Associate')->withTimestamps();
	}
	
	public function getAssocName($actId){
		$assocId = \DB::table('activity_associate')->select('associate_id')->where('activity_id', '=', $actId)->get();
		$assocName = \DB::table('associates')->select('name')->where('id', '=', $assocId[0]->associate_id)->get();
		
		return $assocName[0]->name;
	}
	
	//活动与评论的多态关联
	public function comment(){
	    return $this->morphMany('App\Models\Comment','item','item_type','item_id','id');
	    //$this->morphMany('App\Models\Comment','item');
	}
}
