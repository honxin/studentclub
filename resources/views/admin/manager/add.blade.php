<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
</head>
<style>
	li{
		list-style: none;
	}
</style>
<body >
	<!-- 提示错误 -->
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<form action="{{ action('Admin\ManagerController@store') }}" method="post" >
	   	<div class="ui form segment" style="width:60%;margin:2%" >
	   		<input type="hidden" name="_method" value="POST">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

    		<table class="ui basic table">
			  <tbody>
			    <tr>
			      <td>管理员名称</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="name" value="" placeholder="管理员名称" />
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>密码</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="password" value="" placeholder="请输入密码" />
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>确认密码</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="repassword" value="" placeholder="请输入确认密码" />
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>选择角色</td>
			      <td>
				      	<div class="ui selection dropdown" style="margin:10px 0 ">
						  <input type="hidden" name="role_id">
						  <div class="default text">选择角色</div>
						  <i class="dropdown icon"></i>
						  <div class="menu">
						  @foreach($roles as $role)
						    <div class="item" data-value="{{ $role->id }}">
						    	{{ $role->role_name }}
						    </div>
						  @endforeach
						  </div>
						</div>
			      </td>
			    </tr>

			    <tr>
			      <td>真实姓名</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="realname" value="" placeholder="请输入真实姓名" />
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>性别</td>
			      <td>
			      		<div class="field">
					      <div class="ui radio checkbox">
					        <input type="radio" name="sex" value="1" checked="">
					        <label>男</label>
					      </div>
					      <div class="ui radio checkbox">
					        <input type="radio" name="sex" value="0">
					        <label>女</label>
					      </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>电子邮件</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="email" value="" placeholder="请输入电子邮件" />
					     </div>
					    </div>
			      </td>
			    </tr>
			    <tr>
			      <td>QQ号码</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="qq_num" value="" placeholder="请输入QQ号码" />
					     </div>
					    </div>
			      </td>
			    </tr>
			    <tr>
			      <td>手机号码</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="phone_num" value="" placeholder="请输入手机号码" />
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>账号状态</td>
			      <td>
			      		<div class="field">
					      <div class="ui radio checkbox">
					        <input type="radio" name="status" value="1" checked="">
					        <label>启用</label>
					      </div>
					      <div class="ui radio checkbox">
					        <input type="radio" name="status" value="0">
					        <label>禁用</label>
					      </div>
					    </div>
			      </td>
			    </tr>
			  </tbody>
			</table>

		    <input class="ui blue submit button" type="submit" value="添加" style="background-color:#19B2EB" />
	   	</div>
  	</form>

	<script>
		$('.ui.dropdown').dropdown();
		$('.ui.checkbox').checkbox();
		$('.ui.radio.checkbox').checkbox();
	</script>
</body>
</html>