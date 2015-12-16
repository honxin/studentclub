<html>
<head>
<link type="text/css" rel="stylesheet" href="{{Config::get('constants.ADMIN_CSS')}}/semantic.min.css">
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{Config::get('constants.ADMIN_JS')}}/semantic.min.js"></script>
<script type="text/javascript" charset="utf-8" src="{{Config::get('constants.UEDITOR')}}/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{{Config::get('constants.UEDITOR')}}/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="{{Config::get('constants.UEDITOR')}}/lang/zh-cn/zh-cn.js"></script>

</head>
<body >
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
	   	
	   	<div class="ui form segment" style="margin:2%" >
    		<table class="ui basic table">
			  <tbody>
			  	<tr>
			      <td>选择社团</td>
			      <td>
				      	<div class="ui selection dropdown" style="margin:10px 0 ">
						  <input type="hidden" name="assoc_id" id="assoc_id" value="{{$assocInfo->assoc_id}}">
						  <div class="default text">选择社团</div>
						  <i class="dropdown icon"></i>
						  <div class="menu">
						  	@foreach($assocs as $assoc)
						  	<div class="item" data-value="{{$assoc->id}}">{{$assoc->name}}</div>
						  	@endforeach
						  </div>
						</div>
			      </td>
			    </tr>

			  	<tr>
			    	<td>社团LOGO</td>
			    	<td>
			    		<span id="atten"></span><span id="filename">{{$assocInfo->logo}}</span>
			    		<img id="nowImg" src="{{Config::get('constants.UPLOAD_IMG')}}/{{$assocInfo->logo}}" height="50px"/><button id="changeLogo">更换LOGO</button>
			    		<form  id="addfile"  action="{{ action('Admin\AssocInfoController@upload') }}" method="post" enctype="multipart/form-data" target='uploadToThis' style="display:none">
							<input type="hidden" id="_method" name="_method" value="POST">
					    	<input type="hidden" id="_token"  name="_token" id="csrf" value="{{ csrf_token() }}">
						    <input type="file" name="logo"  id="logo" placeholder="社团LOGO" />
						    <input type='submit' id="upload" value='上传图片'>
						</form>
						<iframe name='uploadToThis' style='display:none'></iframe>
			    	</td>
			    	<script>
			    		$('#changeLogo').click(function(){
			    			$('#addfile').css('display','block');
			    		});
						
			    		function callback(msg){
			    			$('#upload').css('display','none');
							$('#logo').css('display','none');
							$('#changeLogo').css('display','none');
							$('#nowImg').css('display','none');
			    			$('#atten').html('上传文件名为：');
			    			$('#filename').html(msg);
			    		}
			    	</script>
			    	
			    </tr>

			    <tr>
			    	<td>社团简介</td>
			    	<td>
			    		<div class="field">
						    <textarea name="description" id="description" placeholder="社团简介">{{$assocInfo->description}}</textarea>
						</div>
			    	</td>
			    </tr>
			    
			    <tr>
			    	<td class="label">社团详情：</td><td></td>
			    </tr>
			    <tr>
                    <td colspan="2">
                        <textarea name='content' id='content'>{{$assocInfo->detailcontent}}</textarea>
                    </td>
                </tr>

			    </tbody>
			</table>
		    <input class="ui blue submit button" type="button" id="addAssocInfo" value="确定修改" style="background-color:#19B2EB" />
	   	</div>
	   	<script>
	   		$('#addAssocInfo').click(function(){
	   			//$('#addfile').remove();
	   			var method = $('#_method').val();
	   			var token = $('#_token').val();

	   			var assoc_id = $('#assoc_id').val();
	   			if(assoc_id ==''){
	   				alert('请选择社团');
	   				return false;
	   			}
	   			var filename = $('#filename').html();
	   			if(filename == ''){
	   				alert('请先上传图片');
	   				return false;
	   			}
	   			
	   			var description = $('#description').val();
	   			if(description == ''){
	   				alert('请填写社团简介');
	   				return false;
	   			}

	   			var ue = UE.getEditor('content');
				ue.ready(function() {
				    content = ue.getContent();
				});
				if(content == ''){
	   				alert('请填写社团详情');
	   				return false;
	   			}
				$.ajax({
					type : 'post',
					url  : '{{ action('Admin\AssocInfoController@update',$assocInfo->id) }}',
					data : {_method:'PUT',_token:token,assoc_id:assoc_id,logo:filename,description:description,detailcontent:content},
					success : function(data){
						if(data == 1){
							alert('修改成功');
							window.location.href='{{action("Admin\AssociateController@index")}}';
						}else{
							//alert('修改失败');
							alert(data);
						}
					}
				});
	   		});
	   	</script>

	<script>

		$('.ui.dropdown').dropdown();
		UE.getEditor('content', {
			"initialFrameWidth" : "100%",
			"initialFrameHeight" : 300,
			"maximumWords" : 15000,
		});

	</script>
</body>
</html>