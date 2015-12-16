<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
</head>
<body style="padding:2%">
<!-- 定义搜索区域 -->
<div class="ui segment">
  <h2 class="ui left floated header">
    管理员列表
  </h2>
  <br/><br/>
  <h3 class="ui left floated header">
    筛选：
  </h3>
  <div class="ui selection dropdown" style="margin:10px 0 ">
    <input type="hidden" name="poly_id">
    <div class="default text">选择管理员</div>
    <i class="dropdown icon"></i>
    <div class="menu">
      <div class="item" data-value="0">其他</div>
    </div>
  </div>
  <script>
      $('.ui.dropdown').dropdown();
  </script>
  <div class="ui action input">
    <input type="text" placeholder="社团名称...">
    <div class="ui button">搜索</div>
  </div>
  <div class="ui right floated header">
    <div class="ui primary button">添加管理员</div>
    <div class="ui button">返回</div>
  </div>
  
  <div class="ui fitted divider"></div>
  <table class="ui blue table" >
    <thead>
      <tr>
        <th>管理员ID</th>
        <th>名称</th>
        <th>管理员角色</th>
        <th>姓名</th>
        <th>性别</th>
        <th>email</th>
        <th>qq号码</th>
        <th>手机号码</th>
        <th>注册时间</th>
        <th>登录时间</th>
        <th>管理员状态</th>
        <th colspan="2">操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($managers as $manager)
      <tr>
        <td>{{$manager->id}}</td>
        <td>{{$manager->name}}</td>
        <td>{{$manager->getRoleName($manager->role_id)}}</td>
        <td>{{$manager->realname}}</td>
        <td> @if($manager->sex == 1) 男 @else 女 @endif</td>
        <td>{{$manager->email}}</td>
        <td>{{$manager->qq_num}}</td>
        <td>{{$manager->phone_num}}</td>
        <td>{{$manager->reg_time}}</td>
        <td>{{$manager->login_time}}</td>
        <td>
          @if($manager->status == 1)
            启用
          @else
            禁用
          @endif
        </td>
        <td><a href='{{ action('Admin\ManagerController@edit',$manager->id) }}' class="ui primary small button">编辑</a></td>
        <td>
          <form action="{{ action('Admin\ManagerController@destroy',$manager->id) }}" method="POST" style="display: inline;">
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