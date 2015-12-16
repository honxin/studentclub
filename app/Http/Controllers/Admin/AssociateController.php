<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class AssociateController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $associates = Models\Associate::all();
		return view('admin.associate.index')->withAssociates($associates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.associate.add')->withPolies(Models\Poly::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token','_method');
		if(Models\Associate::create($input)){
			return redirect(action('Admin\AssociateController@index'));
		}else{
			return redirect(action('Admin\AssociateController@create'))->withInput()->withErros('添加社团失败');
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
        $assoc = Models\Associate::find($id);
		$polies = Models\Poly::all();
		
		return view('admin.associate.edit',compact('assoc','polies'));
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
        $assoc = Models\Associate::find($id);
		$data = $request->except('_token','_method','id');
		if($assoc->update($data)){
			return redirect(action('Admin\AssociateController@index'));
		}else{
			return \Redirect::back()->withInput()->withErrors('修改失败');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

		$assoc = Models\Associate::find($id);
		if($assoc->delete()){
			return redirect(action('Admin\AssociateController@index'));
		}
    }
}
