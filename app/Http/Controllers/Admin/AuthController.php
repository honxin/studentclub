<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class AuthController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAuth = \DB::table('auths')->orderby('id','asc')->paginate(15);
		
		//使用在App\helpers.php定义的方法
		$auths = getAuthTree($allAuth); 
		return view('admin.auth.index',compact('auths','allAuth'));
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//$auths = \DB::table('auths')->lists('auth_name', 'id');
        $auths = Models\Auth::getAuth();
		$auths = getAuthTree($auths);
        return view('admin.auth.add',compact('auths'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'auth_name'=>'required',
    		'module_name'=>'required',
    		'controller_name'=>'required',
    		'action_name'=>'required',
    	]);
        
        $input = $request->except('_token','_method');
		if(Models\Auth::create($input)){
			return redirect(action('Admin\AuthController@index'));
		}else{
			return redirect(action('Admin\AuthController@create'))->withInput()->withErrors('添加失败！');
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
		$auth = Models\Auth::find($id);
		$allAuths = Models\Auth::getAuth();
		$allAuths = getAuthTree($allAuths);
		return view('admin.auth.edit',compact('auth','allAuths'));
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
    	//echo $request->url();die;
		
		$auth = Models\Auth::find($id);
		$input = $request->except('_token','_method');
		if($auth->update($input)){
			return redirect(action('Admin\AuthController@index'));
		}else{
			return redirect(action('Admin\AuthController@edit',$id))->withInput()->withErrors('更新失败！');
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
        $auth = Models\Auth::find($id);
		$auth->delete();

		return redirect(action('Admin\AuthController@index'));
    }
	
}
