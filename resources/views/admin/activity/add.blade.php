<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
<script type="text/javascript" charset="utf-8" src="{{Config::get('constants.UEDITOR')}}/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{{Config::get('constants.UEDITOR')}}/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="{{Config::get('constants.UEDITOR')}}/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript" src="{{Config::get('constants.DATETIME')}}/Other/WdatePicker.js"></script>

</head>
<body >
	<!-- 提示错误 -->
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <script>alert('{{ $error }}')</script>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="{{ action('Admin\ActivityController@store') }}" method="post" >

	   	<div class="ui form segment" style="margin:2%" >
	   		<input type="hidden" name="_method" value="POST">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

    		<table class="ui basic table">
			  <tbody>
			  	<tr>
			      <td>活动所属社团</td>
			      <td>
				      	<div class="ui selection dropdown" style="margin:10px 0 ">
						  <input type="hidden" name="assoc_id">
						  <div class="default text">选择活动所属社团</div>
						  <i class="dropdown icon"></i>
						  <div class="menu">
						  	@foreach($assocs as $assoc)
						  	<div class="item" data-value="{{$assoc->id}}">{{$assoc->name}}</div>
						  	@endforeach
						  </div>
						</div>
			      </td>
			    </tr>

			  	<tr>
			    	<td>活动名称</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      <input type="text" name="title" value="" placeholder="活动名称" />
					     </div>
					    </div>
			    	</td>
			    </tr>

			    <tr>
			    	<td>活动时间</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      开始<input type="text" name="start_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"> 
					      结束<input type="text" name="end_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"> 
					     </div>
					    </div>
			    	</td>
			    </tr>  

			    <tr>
			    	<td>活动地点</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      <input type="text" name="place" value="" placeholder="活动地点" />
					     </div>
					    </div>
			    	</td>
			    </tr>

			    <tr>
			    	<td>活动简介</td>
			    	<td>
			    		<div class="field">
						    <textarea name="description" placeholder="活动简介"></textarea>
						</div>
			    	</td>
			    </tr>
			    
			    <tr>
			    	<td class="label">活动内容描述：</td><td></td>
			    </tr>
			    <tr>
                    <td colspan="2">
                        <textarea name='content' id='content'></textarea>
                    </td>
                </tr>

			    </tbody>
			</table>
		    <input class="ui blue submit button" type="submit" value="添加" style="background-color:#19B2EB" />
	   	</div>
  	</form>

	<script>

		$('.ui.dropdown').dropdown();
		UE.getEditor('content', {
			"initialFrameWidth" : "100%",
			"initialFrameHeight" : 300,
			"maximumWords" : 15000,
		});

	</script>
</body>
</html>