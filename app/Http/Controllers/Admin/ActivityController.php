<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class ActivityController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$activities = Models\Activity::all();
    	return view('admin.activity.index',compact('activities'));    	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
        return view('admin.activity.add')->withAssocs(Models\Associate::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$assoc_id = $request->input('assoc_id');
        $data = $request->except('_method','_token','assoc_id');
		if($act = Models\Activity::create($data)){
			if($act->assocs()->attach($assoc_id)){
				return redirect(action('Admin\ActivityController@index'));
			}
		}else{
			return redirect(action('Admin\ActivityController@create'))->withInput()->withErrors('添加活动失败');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $act = Models\Activity::find($id);
		echo $act->content;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$assocs = Models\Associate::all();
        $act = Models\Activity::find($id);
		return view('admin.activity.edit',compact('act','assocs'));
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
    	$act = Models\Activity::find($id);
        $assoc_id = array($request->input('assoc_id'));//转为数组用于同步
        $data = $request->except('_method','_token','assoc_id');
		if($act ->update($data)){
			if($act->assocs()->sync($assoc_id)){
				return redirect(action('Admin\ActivityController@index'));
			}
		}else{
			return redirect(action('Admin\ActivityController@update',$id))->withInput()->withErrors('添加活动失败');
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
        $act  = Models\Activity::find($id);
		if($act->delete()){
			if(\DB::table('activity_associate')->where('activity_id', '=', $id)->delete()){
				return redirect(action('Admin\ActivityController@index'))->withErrors('删除成功');
			}else{
				return redirect(action('Admin\ActivityController@index'))->withErrors('删除失败');
			}
		}
		return redirect(action('Admin\ActivityController@index'));
    }
	
}
