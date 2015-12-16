
  @extends('home.layout') 
  @section('content') 
  
  <div class="container"> 
   <div class="row"> 
    <div class="col-lg-2"> 
     <button class="btn btn-danger">活动列表</button> 
     <hr />
     @foreach($activities as $activity) 
     <br />
     <a href="{{action('Home\ActivityController@show',$activity->id)}}">{{$activity->title}}</a>
     <br /> 
     @endforeach
    </div>
    <div class="col-lg-10"> 
     <div class="h1 text-center">
      {{$act->title}}
     </div> 　 
     <div class="">
		  <h3>
		  	活动地点：{{$act->place}}<br/>
		  	活动时间：{{$act->start_time}}--{{$act->end_time}}<br/>
		  	活动简介：{{$act->description}} <br/>
		  </h3> 
		   
		  <?php echo $act->content; ?>  
     </div> 
     <hr /> 
     <div class="row"> 
      <br /> 
      <div class="pull-right"></div> 
      <form id="addform" role="form"  method="post">
      	<input type="hidden" name="_method" id="_method"  value="POST"/> 
      	<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}"/> 
      	<input type="hidden" name="type"  value="activity"/> 
      	<input type="hidden" name="item_id"  value="{{$act->id}}"/> 
       <div class="form-group"> 
        <textarea class="form-control" name="comment" id="comment" placeholder="您可以发表您对本次活动的看法"></textarea> 
       </div> 
       <div class="form-group"> 
        <input type="button" id="addcomment" class="btn btn-success pull-right" value="发表评论"/> 
       </div> 
      </form> 
      <script>
      		$('#addcomment').click(function(){
      			 //var data = $('#addform').serialize();
      			// alert(data);
      			var comment = $('#comment').val();
      			$.ajax({
	                type: 'POST',
	                url:'{{action('Home\CommentController@store')}}',
	                data:$('#addform').serialize(),
	                success: function(data) {
	                    if(data == 1){
	                    	//alert(comment);
	                    	var addhtml = "<hr /><div class='row'><div class='col-lg-1'><img src='{{Config::get('constants.HOME_IMG')}}/tx.png' /><hr /></div><div class='col-lg-1 text-primary'> 用户名</div> <div class='col-lg-3 text-info'>2015年12月15日12:19:13</div><br /><br /><div class=''>"+ comment +"</div></div>";
						    $('#commentlist').after(addhtml);
						    alert('感谢您的评论，我们会做的更好！');
	                    }else{
	                    	alert('对不起，评论失败');
	                    }
	                }
	            });
      		});
      </script>

      <div class=" btn btn-primary">
       评论内容
      </div>
      <div id="commentlist"></div>

      @foreach($act->comment as $comt)
      <hr /> 
      <div class="row"> 
       <div class="col-lg-1"> 
        <img src="{{Config::get('constants.HOME_IMG')}}/tx.png" /> 
        <hr /> 
       </div> 
       <div class="col-lg-1 text-primary">
        用户名
       </div> 
       <div class="col-lg-3 text-info">
        评论时间：{{$comt->created_at}}
       </div>
       <br />
       <br /> 
       <div class="">
        	{{$comt->comment}}
       </div> 
      </div>
      @endforeach
     </div> 
    </div> 
   </div> 
  </div>   
  
@endsection('content') 

  