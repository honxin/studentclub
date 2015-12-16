<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class ManagerController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.manager.index')->withManagers(Models\Manager::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
        return view('admin.manager.add')->withRoles(Models\Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_method','_token');
		$data['password'] = md5(md5($data['password']));
		$data['reg_time'] = date('Y-m-d H:m:i',time());
		
		if(Models\Manager::create($data)){
			return redirect(action('Admin\ManagerController@index'));
		}else{
			return redirect(action('Admin\ManagerController@create'))->withInput()->withErrors('添加失败');
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
    	$manager = Models\Manager::find($id);
		$roles = Models\Role::all();
        return view('admin.manager.edit',compact('manager','roles'));
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
    	
        $data = $request->except('_method','_token','id');
		if($data['password'] != ''){
			$data['password'] = md5(md5($data['password']));
		}
		
		$manager = Models\Manager::find($id);
		if($manager->update($data)){
			return redirect(action('Admin\ManagerController@index'));
		}else{
			return redirect(action('Admin\ManagerController@create'))->withInput()->withErrors('修改失败');
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
        $manager = Models\Manager::find($id);
		if($manager->delete()){
			return redirect(action('Admin\ManagerController@index'));
		}else{
			return redirect(action('Admin\ManagerController@index'))->withErrors('删除失败');
		}
    }
}
