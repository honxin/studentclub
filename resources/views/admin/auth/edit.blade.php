<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
</head>
<body >
	<form action="{{ action('Admin\AuthController@update',$auth->id) }}" method="post" >
	   	<div class="ui form segment" style="width:60%;margin:2%" >
	   		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		    <div class="ui selection dropdown" style="margin:10px 0 ">
			  <input type="hidden" name="parent_id">
			  <div class="default text">上级权限</div>
			  <i class="dropdown icon"></i>
			  <div class="menu">
			    <div class="item active" data-value="0" >顶级权限</div>
			    @foreach($allAuths as $v)
			    <div class="item" data-value="{{$v->id}}">
			    	@for($i=1;$i<$v->level;$i++)
			    		=
			    	@endfor
			    	{{$v->auth_name}}
			    </div>
			    @endforeach
			  </div>
			</div>

		    <div class="field">
		     <div class="ui left labeled icon input" >
		      <input type="text" name="auth_name" value="{{ $auth->auth_name }}" placeholder="权限名称" />
		     </div>
		    </div>

		    <div class="field">
		     <div class="ui left labeled icon input" >
		      <input type="text" name="module_name" value="{{ $auth->module_name }}" placeholder="模块名称" />
		     </div>
		    </div>

		    <div class="field">
		     <div class="ui left labeled icon input" >
		      <input type="text" name="controller_name" value="{{ $auth->controller_name }}" placeholder="控制器名称" />
		     </div>
		    </div>

		    <div class="field">
		     <div class="ui left labeled icon input" >
		      <input type="text" name="action_name" value="{{ $auth->action_name }}" placeholder="操作方法名称" />
		     </div>
		    </div>

		    <input class="ui blue submit button" type="submit" value="修改" style="background-color:#19B2EB" />
	   	</div>
  	</form>

	<script>
		$('.ui.dropdown').dropdown();
	</script>
</body>
</html>