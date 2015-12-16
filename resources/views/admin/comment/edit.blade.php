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

	<form action="{{ action('Admin\CommentController@update',$comment->id) }}" method="post" >
	   	<div class="ui form segment" style="width:60%;margin:2%" >
	   		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

    		<table class="ui basic table">
			  <tbody>
			    <tr>
			      <td>评论对象</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      @if($comment->item_type == 'App\Models\Activity')
					      	<input type="hidden" name="type" value="act">
				            {{$comment->item->title}}
				          @elseif($comment->item_type == 'App\Models\Associate')
				          	<input type="hidden" name="type" value="assoc">
				            {{$comment->item->name}}
				          @endif
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>评论内容</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="comment" value="{{$comment->comment}}" placeholder="角色名称" />
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      <td>评论状态</td>
			      <td>
			      		<div class="field">
					      <div class="ui radio checkbox">
					        <input type="radio" name="ischeck" value="1" @if($comment->ischeck == 1) checked="checked"  @endif >
					        <label>已审核</label>
					      </div>
					      <div class="ui radio checkbox">
					        <input type="radio" name="ischeck" value="0" @if($comment->ischeck == 0) checked="checked"  @endif >
					        <label>未审核</label>
					      </div>
					    </div>
			      </td>
			    </tr>
			  </tbody>
			</table>

		    

		    

			
		    

		    <input class="ui blue submit button" type="submit" value="修改" style="background-color:#19B2EB" />
	   	</div>
  	</form>

	<script>
		$('.ui.dropdown').dropdown();
		$('.ui.checkbox').checkbox();
		$('.ui.radio.checkbox').checkbox();
	</script>
</body>
</html>