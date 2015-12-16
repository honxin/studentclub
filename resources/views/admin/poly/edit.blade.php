<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
</head>
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
<div class="ui segment">
	<h2 class="ui left floated header">修改院系/部门</h2><br/>
	<div class="ui fitted divider"></div>
	<form action="{{ action('Admin\PolyController@update',$poly->id) }}" method="post" >

	   	<div class="ui form segment" style="width:60%;margin:2%" >
	   		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

    		<table class="ui basic table">
			  <tbody>
			    <tr>
			    	<td>院系\部门名称</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      <input type="text" name="name" value="{{$poly->name}}" placeholder="院系\部门名称" />
					     </div>
					    </div>
			    	</td>
			    </tr>

			    </tbody>
			</table>

		    <input class="ui blue submit button" type="submit" value="修改" style="background-color:#19B2EB" />
	   	</div>
  	</form>
</div>
	<script>
		$('.ui.dropdown').dropdown();
	</script>
</body>
</html>