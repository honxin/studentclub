<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['user_id','comment','item_id','item_type'];
	//活动与评论的多态关联
    public function item(){
	    return $this->morphTo('item','item_type','item_id');
	}
}
