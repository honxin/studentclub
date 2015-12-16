<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
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

	<div style="margin:10% 30%">
	  <form action="{{ action('Admin\LogController@checklogin') }}" method="post" >
	  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	   	<div class="ui error form segment" style="width:450px">
		  <div class="field">
		    <label>用户名</label>
		    <input placeholder="请输入用户名" type="text" name="name">
		  </div>
		  <div class="field" >
		    <label>密码</label>
		    <input type="password" placeholder="请输入用户名"  name="password" >
		  </div>
		  <div class="two fields">
		    <div class="field">
		      <label>验证码</label>
		      <input placeholder="请输入验证码" type="text"  name="code">
		    </div>
		    <div class="field">
		    	<label>点击图片刷新</label>
		      <img id="refresh" src="{{ action('VerifyController@index') }}" onclick="this.src='{{ action('VerifyController@index') }}?t='+Math.random()"/>
		    </div>
		  </div>
		  <div class="inline field">
		    <div class="ui checkbox">
		      <input type="checkbox" name="isRemember">
		      <label>记住密码</label>
		    </div>
		  </div>
		  <input placeholder="请输入验证码" type="submit" value="登录" class="ui submit button">
		</div>
  	  </form>
  	</div>

  	<script>
		$('.ui.checkbox').checkbox();
	</script>
</body>
</html>