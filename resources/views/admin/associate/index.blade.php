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
    社团列表
  </h2>
  <br/><br/>
  <h3 class="ui left floated header">
    筛选：
  </h3>
  <div class="ui selection dropdown" style="margin:10px 0 ">
    <input type="hidden" name="poly_id">
    <div class="default text">选择所属院系/部门</div>
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
    <div class="ui primary button">添加社团</div>
    <div class="ui button">返回</div>
  </div>
  
  <div class="ui fitted divider"></div>

  <table class="ui blue table" >
    <thead>
      <tr>
        <th>社团ID</th>
        <th>社团名称</th>
        <th>所属院系</th>
        <th>添加时间</th>
        <th colspan="3">操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($associates as $associate)
      <tr>
        <td>{{$associate->id}}</td>
        <td>{{$associate->name}}</td>
        <td>{{$associate->getPolyName($associate->poly_id)}}</td>
        <td>{{$associate->created_at}}</td>
        <td><a href="{{action('Admin\AssocInfoController@show',$associate->id)}}">查看社团信息</a></td>
        <td><a href='{{ action('Admin\AssociateController@edit',$associate->id) }}' class="ui primary small button">编辑</a></td>
        <td>
          <form action="{{ action('Admin\AssociateController@destroy',$associate->id) }}" method="POST" style="display: inline;">
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