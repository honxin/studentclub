@extends('home.layout')

@section('content')

  <style>
        .carousel {
            margin-top: 0px;
            height: 630px;
            margin-bottom: 20px;
        }

        .carousel .item {
            height: 630px;
            background-color: #000;
        }

        .carousel .item img {
            width: 100%;
        }

        .carousel-caption p {
            margin-bottom: 20px;
            font-size: 20px;
            line-height: 1.8;
        }
    </style> 
 
  
  <div class="container"> 
   <div class="row"> 
    <div class="col-lg-2"> 
     <div class="">
      <img src="{{Config::get('constants.UPLOAD_IMG')}}/{{$assoc->info->logo}}" width="170px" />
     </div> 
     <hr/>
     <button class="btn btn-danger">本社团活动</button> 
     <hr /> 
     	@foreach($acts as $act)
	     <br />
	     <a href="{{action('Home\ActivityController@show',$act->id)}}">{{$act->title}}</a>
	     <br /> 
     	@endforeach
    </div> 
    <div class="col-lg-10"> 
     <div class="h1 text-center">      
		{{$assoc->name}}
     </div> 　 
     <div class="h3">社团简介</div> 
     <div class="" > 
      {{$assoc->info->description}}
     </div> <hr/>
     <div class="h3">社团组织架构</div> 
     <div class="" > 
      
     </div>  <hr/>
     <div class="h3">社团详情</div> 
     <div class=""> 
      <?php echo $assoc->info->detailcontent; ?>
     </div> 
    </div> 
   </div>

   <div class="row"> 
       <form id="addform" role="form"  method="post">
      	<input type="hidden" name="_method" id="_method"  value="POST"/> 
      	<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}"/> 
      	<input type="hidden" name="type"  value="associate"/> 
      	<input type="hidden" name="item_id"  value="{{$assoc->id}}"/> 
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
   
   <hr /> 
   <div class=" btn btn-primary">
    评论内容
   </div> 
   <div id="commentlist"></div>

   @foreach($assoc->comment as $comt)
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
@endsection('content')

