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

	<form action="{{ action('Admin\AssociateController@update',$assoc->id) }}" method="post" >
	   	<div class="ui form segment" style="width:60%;margin:2%" >
	   		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

    		<table class="ui basic table">
			  <tbody>

			    <tr>
			      <td>所属院系/部门</td>
			      <td>
				      	<div class="ui selection dropdown" style="margin:10px 0 ">
						  <input type="hidden" name="poly_id">
						  <div class="default text">选择所属院系/部门</div>
						  <i class="dropdown icon"></i>
						  <div class="menu">
						  @foreach($polies as $poly)
						  	<div class="item" data-value="{{$poly->id}}">{{$poly->name}}</div>
						  @endforeach
						  </div>
						</div>
			      </td>
			    </tr>
			    <tr>
			    	<td>社团名称</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      <input type="text" name="name" value="{{$assoc->name}}" placeholder="社团名称" />
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
	</script>
</body>
</html>