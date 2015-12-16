<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Gregwar\Captcha\CaptchaBuilder;

class VerifyController extends Controller
{
    public function index(){
		$builder = new CaptchaBuilder;
		$builder->build(150,32);
		
		//session(['captcha'=>$builder->getPhrase()]);
		\Session::set('captcha',$builder->getPhrase()); //存储验证码
		
		return response($builder->output())->header('Content-type','image/jpeg');
	}
}
