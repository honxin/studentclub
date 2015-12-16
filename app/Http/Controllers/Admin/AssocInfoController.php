<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
class AssocInfoController extends CheckController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.assocInfo.add')->withAssocs(Models\Associate::all());
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
		if($act = Models\Associnfo::create($data)){
			echo "1";
		}else{
			echo "0";
		}
	}
	public function upload(Request $request){
		$file = \Input::file('logo');
		
		$path = '/assoc/'.date('Ymd',time()).'/';
		$newFileName = md5(rand(0,10000)).'.'.$file->getClientOriginalExtension();
		
		if($file -> move('Upload/image'.$path,$newFileName)){
			echo "<script>parent.callback('".$path.$newFileName."');</script>";
		}
		
		//使用Storage进行图片上传
	    //uploadimg('/Upload/',$newFileName,$file );  //在helper.php封装改函数
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$assocInfo = Models\Associnfo::where('assoc_id','=',$id)->first();
		$assoc = Models\Associnfo::find($assocInfo->id)->assoc;
		$assocInfo->name = $assoc->name;
		
		$assocInfo->poly_name = Models\Associate::getPolyName($assoc->poly_id);
		
        return view('admin.assocInfo.show',compact('assocInfo'));
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
        $assocInfo = Models\Associnfo::find($id);
        $assocInfo->assocName = Models\Assocaccount::getAssocName($assocInfo->assoc_id);
		return view('admin.associnfo.edit',compact('assocs','assocInfo'));
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
    	
    	$assocInfo = Models\Associnfo::find($id);
		if($assocInfo->logo != $request->get('logo')){
			//删除原来的图片
			@unlink(public_path().\Config::get('constants.UPLOAD_IMG').'/'.$assocInfo->logo);
		
		}
		
        $data = $request->except('_method','_token','id');
		if($assocInfo->update($data)){
			echo "1";
		}else{
			echo "0";
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
