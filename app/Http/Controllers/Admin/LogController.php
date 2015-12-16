<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models;
class LogController extends Controller
{
	public function login(){
		//echo session("captcha");
		//echo \Session::get('captcha');
		if(session("adminname")){
			return redirect(action('Admin\IndexController@index'));
		}
		return view('admin.login');
	}
	
    public function checklogin(Request $request){
    	//print_r($request->all());
		$name = $request->get('name');
		$code = $request->get('code');
		$password = $request->input('password');
		
		if($code == session('captcha')){
			//$manager = \DB::table('managers')->select('name','password','status')->where('name','=',$name)->get();
			$manager = Models\Manager::select('id','role_id','name','password','status')->where('name','=',$name)->first();
	
			if(count($manager) == 1){
				if($manager->status == 1){
					if($manager->password == md5(md5($password))){
						session(array('adminid'=>$manager->id,'adminname'=>$manager->name));
						
						//获取当前角色拥有的权限并存入session
						$role = Models\Role::find($manager->role_id);
						$authAllows = array();
						foreach($role->auths as $v){
							$authAllows[] = $v['module_name'].'.'.$v['controller_name'].'.'.$v['action_name'];
						}
						session(array('authAllows'=>$authAllows));
						
						return redirect(action('Admin\IndexController@index'));
					}else{
						return $this->loginRedirectTo('账号密码错误');
					}
				}else{
					return $this->loginRedirectTo('账号未激活');
				}
			}else{
				return $this->loginRedirectTo('用户不存在');
			}
		}else{
			return $this->loginRedirectTo('验证码不正确');
		}
    }
	public function logout(){
		//session()->forget("adminname");
		if(session()->flush()){
			return redirect(action('Admin\LogController@login'));
		}
	}
	//登录页面跳转
	public function loginRedirectTo($msg){
		return redirect(action('Admin\LogController@login'))->withInput()->withErrors($msg);
	}
}
