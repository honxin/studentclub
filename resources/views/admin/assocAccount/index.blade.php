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
    社团账号列表
  </h2>
  <br/><br/>
  <h3 class="ui left floated header">
    筛选：
  </h3>
  <div class="ui selection dropdown" style="margin:10px 0 ">
    <input type="hidden" name="poly_id">
    <div class="default text">选择管理社团</div>
    <i class="dropdown icon"></i>
    <div class="menu">
      <div class="item" data-value="0">其他</div>
    </div>
  </div>
  <script>
      $('.ui.dropdown').dropdown();
  </script>
  <div class="ui action input">
    <input type="text" placeholder="账号名称...">
    <div class="ui button">搜索</div>
  </div>
  <div class="ui right floated header">
    <div class="ui primary button">添加账号</div>
    <div class="ui button">返回</div>
  </div>
  
  <div class="ui fitted divider"></div>

  <table class="ui blue table" >
    <thead>
      <tr>
        <th>账号ID</th>
        <th>账号名称</th>
        <th>姓名</th>
        <th>性别</th>
        <th>管理社团</th>
        <th>账号状态</th>
        <th colspan="3">操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($assocAccounts as $assocAccount)
      <tr>
        <td>{{$assocAccount->id}}</td>
        <td>{{$assocAccount->name}}</td>
        <td>{{$assocAccount->realname}}</td>
        <td>
        @if($assocAccount->sex == 1)
          男
        @else
          女
        @endif
        </td>
        <td>
          @foreach($assocs as $k => $v)
            @if($k == $assocAccount->assoc_id)
            {{$v}}
            @endif
          @endforeach
        </td>
        <td>
        @if($assocAccount->status == 1)
          启用
        @else
          禁用
        @endif
        </td>
        <td><a href="#">查看账号信息</a></td>
        <td><a href='{{ action('Admin\AssocAccountController@edit',$assocAccount->id) }}' class="ui primary small button">编辑</a></td>
        <td>
          <form action="{{ action('Admin\AssocAccountController@destroy',$assocAccount->id) }}" method="POST" style="display: inline;">
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