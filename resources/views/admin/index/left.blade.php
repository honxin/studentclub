<html>
	<head>
    	<title>目录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
	<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
	<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
	<style type="text/css">
		a:link {
		color: #6FBODD;
		text-decoration: none;
		}
		a:visited {
			text-decoration: none;
			color: #666;
		}
		a:hover {
			text-decoration: none;
			color: #F00;
		}
		a:active {
			text-decoration: none;
		}
			.t {
			color: #00F;
		}
		ul{
			list-style:none;
		}
		p{
			margin:0;
			padding:0;
		}
    </style>
	</head>
<body style="background-color:#5BA8DE;width:100%" >	
	<div class="ui styled accordion" style="width:162px;">
	  <div class="title">
	    <i class="dropdown icon"></i>
	    系统用户管理
	  </div>
	  <div class="content">
	    <p><a href = "{{ action('Admin\AuthController@index') }}" target = "content">权限列表</a>/<a href = "{{ action('Admin\AuthController@create') }}" target = "content">添加权限</a></p>
		<p><a href = "{{ action('Admin\RoleController@index') }}" target = "content">角色列表</a>/<a href = "{{ action('Admin\RoleController@create') }}" target = "content">添加角色</a></p>
		<p><a href = "{{ action('Admin\ManagerController@index') }}" target = "content">管理员列表</a>/<a href = "{{ action('Admin\ManagerController@create') }}" target = "content">添加</a></p>
	  </div>

	  <div class="title">
	    <i class="dropdown icon"></i>
	    社团管理
	  </div>
	  <div class="content">
	  	<p><a href = "{{ action('Admin\PolyController@index') }}" target = "content">院系列表</a>/<a href = "{{ action('Admin\PolyController@create') }}" target = "content">添加</a></p>
	  	<p><a href = "{{ action('Admin\AssociateController@index') }}" target = "content">社团列表</a>/<a href = "{{ action('Admin\AssociateController@create') }}" target = "content">添加</a></p>
	  	<p><a href = "{{ action('Admin\AssocInfoController@create') }}" target = "content">社团信息添加</a></p>
	  	<p><a href = "{{ action('Admin\AssocAccountController@index') }}" target = "content">社团账号列表</a>/<a href = "{{ action('Admin\AssocAccountController@create') }}" target = "content">添加</a></p>
	  </div>

	  <div class="title">
	    <i class="dropdown icon"></i>
	    活动管理
	  </div>
	  <div class="content">
	  	<p><a href = "{{ action('Admin\ActivityController@index') }}" target = "content">活动列表</a>/<a href = "{{ action('Admin\ActivityController@create') }}" target = "content">添加</a></p>
	  </div>

	  <div class="title">
	    <i class="dropdown icon"></i>
	    评论管理
	  </div>
	  <div class="content">
	  	<p><a href = "{{ action('Admin\CommentController@listcomment',['type'=>'all']) }}" target = "content">所有评论</a></p>
	  	<p><a href = "{{ action('Admin\CommentController@listcomment',['type'=>'assoc']) }}" target = "content">社团评论</a></p>
	  	<p><a href = "{{ action('Admin\CommentController@listcomment',['type'=>'act']) }}" target = "content">活动评论</a></p>
	  </div>

	</div>

	<script>
		$('.ui.styled.accordion').accordion();
	</script>
</body>
</html>