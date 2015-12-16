@extends('home.layout')

@section('content')

  <div id="myCarousel" class="carousel slide"> 
   <!-- 轮播（Carousel）指标 --> 
   <ol class="carousel-indicators"> 
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li> 
    <li data-target="#myCarousel" data-slide-to="1"></li> 
    <li data-target="#myCarousel" data-slide-to="2"></li> 
   </ol> 
   <!-- 轮播（Carousel）项目 --> 
   <div class="carousel-inner"> 
    <div class="item active"> 
     <img src="{{Config::get('constants.HOME_IMG')}}/index_banner1.jpg" alt="First slide" /> 
     <div class="container"> 
      <div class="carousel-caption"> 
       <h1>活动标题</h1> 
       <p>活动简介</p> 
      </div> 
     </div> 
    </div> 
    <div class="item"> 
     <img src="{{Config::get('constants.HOME_IMG')}}/index_banner2.jpg" alt="Second slide" /> 
     <div class="container"> 
      <div class="carousel-caption"> 
       <h1>活动标题</h1> 
       <p>活动简介</p> 
      </div> 
     </div> 
    </div> 
    <div class="item"> 
     <img src="{{Config::get('constants.HOME_IMG')}}/index_banner3.jpg" alt="Third slide" /> 
     <div class="container"> 
      <div class="carousel-caption"> 
       <h1>活动标题</h1> 
      	<p>活动简介</p> 
      </div> 
     </div> 
    </div> 
   </div> 
   <!-- 轮播（Carousel）导航 --> 
   <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> 
   <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> 
  </div> 
  <div class="container"> 
   <div class="row"> 
    <div class="col-md-3"> 
     <ul id="myTab" class="nav nav-tabs" role="tablist"> 
      <li class="active"><a href="#bulletin" role="tab" data-toggle="tab"> 热门活动</a></li> 
      <li><a href="#rule" role="tab" data-toggle="tab">热门社团</a></li> 
     </ul> 
     <!-- 选项卡面板 --> 
     <div id="myTabContent" class="tab-content"> 
      <div class="tab-pane active" id="bulletin"> 
      		@foreach($activities as $act)
      			 <br />
			      <a href="{{action('Home\ActivityController@show',$act->id)}}">{{$act->title}}</a>
			     <br /> 
			@endforeach
	      
      </div> 
      <div class="tab-pane" id="rule"> 
       
       	@foreach($associates as $assoc)
       		 <br />
       		<a href="{{action('Home\AssociateController@show',$assoc->id)}}">{{$assoc->name}}</a>
			 <br /> 
		@endforeach

      </div> 
     </div> 
    </div> 
    <div class="col-md-4">
     <button class="btn btn-success">活动预告</button>
     <br />
     
     @foreach($activities as $act)
      	<br />
		<a href="{{action('Home\ActivityController@show',$act->id)}}">{{$act->title}}</a>
		<span class="pull-right text-danger">2015年12月5日</span>
		<br /> 
	 @endforeach
     
    </div> 
    <div class="col-lg-1"></div> 
    <div class="col-md-4">
     <button class="btn btn-success">最近活动</button>
     <br /> 

     <br />
	     <a href="#">活动标题</a>
	     <span class="pull-right  text-success">2015年12月5日</span>
     <br /> 
     <br />
     <a href="#">活动标题</a>
     <span class="pull-right text-success">2015年12月5日</span>
     <br />
     </div>
    </div> 
    <hr/>
    <div class="row"> 
     <div class="col-lg-3"> 
      <div class="row"> 
       <div class="col-lg-4 ">
        <img src="{{Config::get('constants.HOME_IMG')}}/safari-logo-small.jpg" /> 
        <div class="text-center text-primary">
         苹果
        </div> 
       </div> 
       <div class="col-lg-2 "></div> 
       <div class="col-lg-4 ">
        <img src="{{Config::get('constants.HOME_IMG')}}/safari-logo-small.jpg" /> 
        <div class="text-center text-primary">
         苹果
        </div>
       </div> 
      </div> 
      <div class="row"> 
       <div class="col-lg-4 ">
        <img src="{{Config::get('constants.HOME_IMG')}}/safari-logo-small.jpg" /> 
        <div class="text-center text-primary">
         苹果
        </div> 
       </div> 
       <div class="col-lg-2 "></div> 
       <div class="col-lg-4 ">
        <img src="{{Config::get('constants.HOME_IMG')}}/safari-logo-small.jpg" /> 
        <div class="text-center text-primary">
         苹果
        </div>
       </div> 
      </div> 
      <div class="row"> 
       <div class="col-lg-4 ">
        <img src="{{Config::get('constants.HOME_IMG')}}/safari-logo-small.jpg" /> 
        <div class="text-center text-primary">
         苹果
        </div> 
       </div> 
       <div class="col-lg-2 "></div> 
       <div class="col-lg-4 ">
        <img src="{{Config::get('constants.HOME_IMG')}}/safari-logo-small.jpg" /> 
        <div class="text-center text-primary">
         苹果
        </div>
       </div> 
      </div> 
     </div> 
     <div class="col-lg-9"> 
      <hr />
      <button class="btn btn-success">社团动态</button>
      <br />
      <br /> 
      <div class="row"> 
       <div class="col-lg-5 "> 
        <a href="{{action('Home\AssociateController@show',$associates[0]->id)}}"><img width="145px" src="{{Config::get('constants.UPLOAD_IMG')}}/{{$associates[0]->info->logo}}" /> </a>
        <div class=" text-primary">
         {{$associates[0]->info->description}}
        </div>
       </div> 
       <div class="col-lg-2"></div> 
       <div class="col-lg-5 ">
        <a href="{{action('Home\AssociateController@show',$associates[1]->id)}}"><img width="145px" src="{{Config::get('constants.UPLOAD_IMG')}}/{{$associates[1]->info->logo}}" /> </a>
        <div class=" text-primary">
         {{$associates[1]->info->description}}
        </div>
       </div> 
      </div> 
      <div class="row"> 
       <div class="col-lg-5 "> 
        <a href="{{action('Home\AssociateController@show',$associates[2]->id)}}"><img width="145px" src="{{Config::get('constants.UPLOAD_IMG')}}/{{$associates[2]->info->logo}}" /> </a>
        <div class=" text-primary">
         {{$associates[2]->info->description}} 
        </div>
       </div> 
       <div class="col-lg-2"></div> 
       <div class="col-lg-5 ">
        <a href="{{action('Home\AssociateController@show',$associates[0]->id)}}"><img width="145px" src="{{Config::get('constants.UPLOAD_IMG')}}/{{$associates[0]->info->logo}}" /> </a>
        <div class=" text-primary">
         {{$associates[0]->info->description}}
        </div>
       </div> 
      </div> 
     </div> 
    </div>  
   </div> 
  </div>
@endsection('content')