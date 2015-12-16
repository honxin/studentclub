<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class RoleController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $auths = Models\Role::find(12)->auths;
		// foreach($auths as $auth){
			// echo $auth->auth_name;
		// }
		
        return view('admin.role.index')->withRoles(Models\Role::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$auths = Models\Auth::getAuth();
		$auths = getTree($auths);
        return view('admin.role.add',compact('auths'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());
		$auth_id = $request->input('auth_id');
		$input = $request->except('_token','_method','auth_id');
		
		if($rst = Models\Role::create($input)){
			if($rst->auths()->attach($auth_id)){
				return redirect(action('Admin\RoleController@index'));
			}
		}else{
			return redirect(action('Admin\RoleController@create'))->withInput()->withErrors('添加失败');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	//获取当前角色的信息
        $role = Models\Role::find($id);
		
		//获取当前角色所拥有的权限的ID
		$nowAuths = array();
		foreach($role->auths as $auth){
			$nowAuths[] = $auth->id;
		}
		
		//获取所有权限的信息
		$auths = Models\Auth::getAuth();
		$auths = getTree($auths);
		
		return view('admin.role.edit',compact('role','auths','nowAuths'));
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
    	//获取更新的数据
        $auth_id = $request->input('auth_id');
		$input = $request->except('_token','_method','auth_id','id');
		
		//根据id查找该实例
		$data = Models\Role::find($id);
		
		if($data->update($input)){
			 // 跟attach()类似，我们这里使用sync()来同步我们的标签
        	if($data->auths()->sync($auth_id))
			return redirect(action('Admin\RoleController@index'));
		}else{
			return redirect(action('Admin\RoleController@update'))->withInput()->withErrors('修改失败');
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
        $role = Models\Role::find($id);
		if($role->delete()){
			//删除该角色拥有的权限
			if(\DB::table('auth_role')->where('role_id', '=', $id)->delete()){
				return redirect(action('Admin\RoleController@index'))->withErrors('删除成功');
			}
		}else{
			return redirect(action('Admin\RoleController@index'))->withErrors('删除失败');
		}
		return redirect(action('Admin\RoleController@index'));
    }
}
