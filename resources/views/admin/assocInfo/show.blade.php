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
	<h2 class="ui left floated header">社团信息</h2><br/>
	<div class="ui fitted divider"></div>

	<div class="ui form segment" style="margin:2%" >
	   	<table class="ui basic table">
			<tbody>
			    <tr>
			    	<td class="two wide column">社团名称</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      {{$assocInfo->name}}
					     </div>
					    </div>
			    	</td>
			    </tr>

			    <tr>
			    	<td class="two wide column">所属院系/部门</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      {{$assocInfo->poly_name}}
					     </div>
					    </div>
			    	</td>
			    </tr>

			    <tr>
			    	<td class="two wide column">社团LOGO</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					     	<img src="{{Config::get('constants.UPLOAD_IMG')}}/{{$assocInfo->logo}}" height="50px"/>
					      
					     </div>
					    </div>
			    	</td>
			    </tr>

			    <tr>
			    	<td class="two wide column">社团简介</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      {{$assocInfo->description}}
					     </div>
					    </div>
			    	</td>
			    </tr>

			    <tr>
			    	<td class="two wide column">社团详情描述</td>
			    	<td>
			    		<div class="field">
					     <div class="ui left labeled icon input" >
					      <?php echo $assocInfo->detailcontent; ?>
					     </div>
					    </div>
			    	</td>
			    </tr>

			</tbody>
		</table>
		<a href='{{ action('Admin\AssocInfoController@edit',$assocInfo->id) }}' class="ui primary small button">修改社团信息</a>
	</div>

</div>
	<script>
		$('.ui.dropdown').dropdown();
	</script>
</body>
</html>