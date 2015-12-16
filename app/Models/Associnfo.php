<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associnfo extends Model
{
   protected $fillable = ['assoc_id','logo','description','detailcontent'];
   
   //社团与社团信息一对一关系
   public function assoc(){
   		return $this->belongsTo('App\Models\Associate','assoc_id','id');
   }
   
   //社团信息与院系远程一对一
  
  
   
   
}
