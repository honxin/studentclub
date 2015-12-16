@extends('home.layout')

@section('content')


  <div class="container"> 
  @foreach( $associates as $assoc)
   <div class="row"> 
    <div class="col-lg-3"> 
     <img src="{{Config::get('constants.UPLOAD_IMG')}}/{{$assoc->info->logo}}" width="250px" />
     <br /> 
     <a href="{{action('Home\AssociateController@show',$assoc->id)}}"><button class="btn btn-primary">进入社团</button> </a> 
    </div> 
    <div class="col-lg-9"> 
     <div class="h1 text-center">
      {{$assoc->name}}
     </div> 
     <div class="h3 ">
      {{$assoc->info->description}}
     </div> 
    </div> 
   </div> 
   <hr /> 
  @endforeach
  </div>   
@endsection('content')