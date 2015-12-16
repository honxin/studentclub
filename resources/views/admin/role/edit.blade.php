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

	<form action="{{ action('Admin\RoleController@update',$role->id) }}" method="post" >
	   	<div class="ui form segment" style="width:60%;margin:2%" >
	   		<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">

    		<table class="ui basic table">
			  <tbody>
			    <tr>
			      <td>角色名称</td>
			      <td>
				      	<div class="field">
					     <div class="ui left labeled icon input">
					      <input type="text" name="role_name" value="{{$role->role_name}}" placeholder="角色名称" />
					     </div>
					    </div>
			      </td>
			    </tr>

			    <tr>
			      	<td>角色权限</td>
			      	<td>
			      		<ul>
			      			@foreach($auths as $auth)
			      			<li>
			      				<div class="ui checkbox"><input type="checkbox" name="auth_id[]" value="{{$auth->id}}" @if( in_array($auth->id,$nowAuths)) checked='checked'  @endif><label>{{$auth->auth_name}} </label></div>
								@if($auth->child !='')
								<ul>
									@foreach($auth->child as $auth_child_1)
										<li>
											<div class="ui checkbox"><input type="checkbox" name="auth_id[]" value="{{$auth_child_1->id}}"  @if( in_array($auth_child_1->id,$nowAuths)) checked='checked'  @endif ><label>{{$auth_child_1->auth_name}}</label></div>
											@if($auth_child_1->child !='')
											<ul>
												@foreach($auth_child_1->child as $auth_child_2)
													<li>
														<div class="ui checkbox"><input type="checkbox" name="auth_id[]" value="{{$auth_child_2->id}}" @if( in_array($auth_child_2->id,$nowAuths)) checked='checked'  @endif><label>{{$auth_child_2->auth_name}}</label></div>
													</li>
												@endforeach
											</ul>
											@endif
										</li>
									@endforeach
								</ul>
								@endif
							</li>
							@endforeach
			      		</ul>
			      	</td>
			    </tr>

			    <tr>
			      <td>角色状态</td>
			      <td>
			      		<div class="field">
					      <div class="ui radio checkbox">
					        <input type="radio" name="status" value="1" @if($role->status == 1) checked="checked"  @endif >
					        <label>启用</label>
					      </div>
					      <div class="ui radio checkbox">
					        <input type="radio" name="status" value="0" @if($role->status == 0) checked="checked"  @endif >
					        <label>禁用</label>
					      </div>
					    </div>
			      </td>
			    </tr>
			  </tbody>
			</table>

		    

		    

			
		    

		    <input class="ui blue submit button" type="submit" value="添加" style="background-color:#19B2EB" />
	   	</div>
  	</form>

	<script>
		$('.ui.dropdown').dropdown();
		$('.ui.checkbox').checkbox();
		$('.ui.radio.checkbox').checkbox();
	</script>
</body>
</html>