<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
</head>
<body style="padding:2%">
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
<!-- 定义搜索区域 -->
<div class="ui segment">
  <h2 class="ui left floated header">
    角色列表
  </h2>
  <br/><br/>
  <h3 class="ui left floated header">
    筛选：
  </h3>
  <div class="ui selection dropdown" style="margin:10px 0 ">
    <input type="hidden" name="poly_id">
    <div class="default text">选择</div>
    <i class="dropdown icon"></i>
    <div class="menu">
      <div class="item" data-value="0">其他</div>
    </div>
  </div>
  <script>
      $('.ui.dropdown').dropdown();
  </script>
  <div class="ui action input">
    <input type="text" placeholder="角色名称...">
    <div class="ui button">搜索</div>
  </div>
  <div class="ui right floated header">
    <div class="ui primary button">添加角色</div>
    <div class="ui button">返回</div>
  </div>
  
  <div class="ui fitted divider"></div>
  <table class="ui blue table" >
    <thead>
      <tr>
        <th>角色ID</th>
        <th>角色名称</th>
        <th>角色权限</th>
        <th>角色状态</th>
        <th>添加时间</th>
        <th colspan="2">操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
      <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->role_name}}</td>
        <td>
          @foreach($role->auths as $auth)
            {{$auth->auth_name}}、
          @endforeach
        </td>
        <td>
          @if($role->status == 1)
            启用
          @else
            禁用
          @endif
        </td>
        <td>{{$role->created_at}}</td>
        <td><a href='{{ action('Admin\RoleController@edit',$role->id) }}' class="ui primary small button">编辑</a></td>
        <td>
          <form action="{{ action('Admin\RoleController@destroy',$role->id) }}" method="POST" style="display: inline;">
            <input name="_method" type="hidden" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="ui small button" onclick="del()">删除</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</body>
</html>