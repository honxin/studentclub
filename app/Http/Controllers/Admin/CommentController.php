<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class CommentController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
	
	public function listcomment(Request $request){
		$type =  $request->get('type');
		if($type == 'all'){
			$comments = Models\Comment::all();
		}elseif($type == 'act'){
			$comments = Models\Comment::where('item_type','=','App\Models\Activity')->get();
		}elseif($type == 'assoc'){
			$comments = Models\Comment::where('item_type','=','App\Models\Associate')->get();
		}
		//print_r($comments[0]->item->title);die;
		return view('admin.comment.index',compact('comments'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Models\Comment::find($id);
		return view('admin.comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$comment = Models\Comment::find($id);
        $data = $request->except('_method','_token','type');
		$type = $request->input('type');
		
		if($comment->update($data)){
			if($type == 'assoc'){
				return redirect(action('Admin\CommentController@listcomment',['type'=>'assoc']));
			}elseif($type == 'act'){
				return redirect(action('Admin\CommentController@listcomment',['type'=>'act']));
			}
		}else{
			return redirect(action('Admin\CommentController@edit',$id))->withInput()->withErrors('修改失败');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
