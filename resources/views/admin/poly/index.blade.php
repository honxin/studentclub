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
    院系/部门列表
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
    <div class="ui primary button">添加院系部门</div>
    <div class="ui button">返回</div>
  </div>
  
  <div class="ui fitted divider"></div>

  <table class="ui blue table" >
    <thead>
      <tr>
        <th>院系ID</th>
        <th>院系名称</th>
        <th>拥有社团</th>
        <th>添加时间</th>
        <th colspan="2">操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($polies as $poly)
      <tr>
        <td>{{$poly->id}}</td>
        <td>{{$poly->name}}</td>
        <td>
          @foreach($poly->assocs as $assoc)
          {{$assoc->name}}、
          @endforeach
        </td>
        <td>{{$poly->created_at}}</td>
        <td><a href='{{ action('Admin\PolyController@edit',$poly->id) }}' class="ui primary small button">编辑</a></td>
        <td>
          <form action="{{ action('Admin\PolyController@destroy',$poly->id) }}" method="POST" style="display: inline;">
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