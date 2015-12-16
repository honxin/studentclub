<?php 
	
	function getAuthTree($auths,$pid=0,$level=1){
		static $authTree = array();
		foreach($auths as $v){
			if($v->parent_id == $pid){
				$v->level = $level;
				$authTree[] = $v;
				getAuthTree($auths,$v->id,$level+1);
			}
		}
		return $authTree;
	}
	
	function getTree($arr,$pid=0){
		static $Tree = array();
		foreach($arr as $v){
			if($v->parent_id == $pid){
				$v->child = getChild($arr,$v->id);
				$Tree[] = $v;
			}
		}
		return $Tree;
	}
	
	function getChild($arr,$pid=0){
		$child = array();
		foreach($arr as $v){
			if($v->parent_id == $pid){
				$v->child = getChild($arr,$v->id);
				$child[] = $v;
			}
		}
		return $child;
	}
	
	function uploadimg($path,$newFileName,$file){
			
		$savePath = $path.$newFileName;
	    \Storage::put(
	        $savePath,
	        file_get_contents($file->getRealPath())
	    );
	    
	}
?>