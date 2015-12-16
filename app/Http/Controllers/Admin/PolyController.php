<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class PolyController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.poly.index')->withPolies(Models\Poly::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.poly.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
		if(Models\Poly::create($input)){
			return redirect(action('Admin\PolyController@index'));
		}else{
			return redirect(action('Admin\PolyController@create'))->withInput()->withErrors('添加失败');
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
        return view('admin.poly.edit')->withPoly(Models\Poly::find($id));
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
        $poly = Models\Poly::find($id);
		$data = $request->except('_token','_method','id');
		if($poly->update($data)){
			return redirect(action('Admin\PolyController@index'));
		}else{
			return redirect(action('Admin\PolyController@update',$id))->withInput()->withErrors('修改失败');
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
        $poly = Models\Poly::find($id);
		if($poly->delete()){
			return redirect(action('Admin\PolyController@index'));
		}else{
			return redirect(action('Admin\PolyController@index'))->withErrors('删除失败');
		}
    }
}
