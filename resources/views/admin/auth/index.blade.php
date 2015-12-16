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
    权限列表
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
    <input type="text" placeholder="权限名称...">
    <div class="ui button">搜索</div>
  </div>
  <div class="ui right floated header">
    <div class="ui primary button">添加权限</div>
    <div class="ui button">返回</div>
  </div>
  
  <div class="ui fitted divider"></div>

  <table class="ui blue table" >
    <thead>
      <tr>
        <th>权限ID</th>
        <th>权限路径</th>
        <th>权限名称</th>
        <th>模块名称</th>
        <th>控制器名称</th>
        <th>操作方法名称</th>
        <th>添加时间</th>
        <th colspan="2">操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($auths as $auth)
      <tr>
        <td>{{$auth->id}}</td>
        <td>{{$auth->parent_id}}-{{$auth->id}}</td>
        <td>
          @for($i=0;$i<$auth->level;$i++)
            =
          @endfor
          {{$auth->auth_name}}
        </td>
        <td>{{$auth->module_name}}</td>
        <td>{{$auth->controller_name}}</td>
        <td>{{$auth->action_name}}</td>
        <td>{{$auth->created_at}}</td>
        <td><a href='{{ action('Admin\AuthController@edit',$auth->id) }}' class="ui primary small button">编辑</a></td>
        <td>
          <form action="{{ action('Admin\AuthController@destroy',$auth->id) }}" method="POST" style="display: inline;">
            <input name="_method" type="hidden" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="ui small button" onclick="del()">删除</button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>

  </table>
    {!!$allAuth->render()!!}
  <div class="ui pagination menu">
    <a class="active item">
      1
    </a>
    <a class="item">
      10
    </a>
    <a class="item">
      11
    </a>
    <a class="item">
      12
    </a>
  </div>
</div>
</body>
</html>