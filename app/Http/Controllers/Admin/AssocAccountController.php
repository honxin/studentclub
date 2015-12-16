<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class AssocAccountController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//获取社团信息
    	$assocs = Models\Assocaccount::getAssocs();
		
        $assocAccounts = \DB::table('assocaccounts')->select('id','name', 'realname','sex','assoc_id','status')->get();
		//print_r($assocAccount);die;
		return view('admin.assocAccount.index',compact('assocAccounts','assocs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$assocs = Models\Associate::all();
        return view('admin.assocAccount.add',compact('assocs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
        'name' => 'required|min:5'
    ]);

        $data = $request->except('_method','_token');
		$data['password'] = md5(md5($data['password']));
		$data['reg_time'] = date('Y-m-d H:m:i',time());
		if(Models\Assocaccount::create($data)){
			return redirect(action('Admin\AssocAccountController@index'));
		}else{
			return redirect(action('Admin\AssocAccountController@add'))->withInput()->withErrors('添加失败');
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
    	$account = Models\Assocaccount::find($id);
        $assocs = Models\Associate::all();
        return view('admin.assocAccount.edit',compact('assocs','account'));
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
    	$assocAccount = Models\Assocaccount::find($id);
		
        $data = $request->except('_method','_token','id');
		if($data['password']!= ''){
			$data = $request->except('_method','_token','id');
			$data['password'] = md5(md5($data['password']));
		}else{
			$data = $request->except('_method','_token','id','password');
		}
		
		$data['reg_time'] = date('Y-m-d H:m:i',time());
		if($assocAccount->update($data)){
			return redirect(action('Admin\AssocAccountController@index'));
		}else{
			return redirect(action('Admin\AssocAccountController@add'))->withInput()->withErrors('添加失败');
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
        $account = Models\Assocaccount::find($id);
		$account->delete();
		return redirect(action('Admin\AssocAccountController@index'));
    }
}
