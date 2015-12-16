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
    评论列表
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
        <th>评论ID</th>
        <th>评论用户</th>
        <th>评论内容</th>
        <th>评论对象</th>
        <th>评论时间</th>
        <th>是否审核</th>
        <th colspan="2">操作</th>
      </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->user_id}}</td>
        <td>{{$comment->comment}}</td>
        <td>
          @if($comment->item_type == 'App\Models\Activity')
            {{$comment->item->title}}
          @elseif($comment->item_type == 'App\Models\Associate')
            {{$comment->item->name}}
          @endif
        </td>
        <td>{{$comment->created_at}}</td>
        <td>
          @if($comment->ischeck == 1)
            已审核
          @else
            未审核
          @endif
        </td>
        <td><a href='{{ action('Admin\CommentController@edit',$comment->id) }}' class="ui primary small button">编辑</a></td>
        <td>
          <form action="{{ action('Admin\CommentController@destroy',$comment->id) }}" method="POST" style="display: inline;">
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