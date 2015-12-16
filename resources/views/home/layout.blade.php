<html>
 <head> 
  <title>学生社团</title> 
  <meta charset="utf-8" /> 
  <link rel="stylesheet" href="{{Config::get('constants.HOME_CSS')}}/bootstrap.css" /> 
  <link rel="stylesheet" href="{{Config::get('constants.HOME_CSS')}}/mycss.css" /> 
  <script src="{{Config::get('constants.HOME_JS')}}/jquery-1.11.3.min.js"></script> 
  <script src="{{Config::get('constants.HOME_JS')}}/bootstrap.min.js"></script> 
 </head> 
 <body> 
  <div class="navbar navbar-default" role="navigation"> 
   <div class="container">
     　
    <div class="navbar-header"> 
     <a href="/">
     <img src="{{Config::get('constants.HOME_IMG')}}/logo.jpg" />
     </a> 　
    </div> 
    <ul class="nav nav-pills"> 
     <li class=""><a href="{{action('Home\IndexController@index')}}">首页</a></li> 
     <li> <a href="{{action('Home\AssociateController@index')}}">社团</a></li> 
     <li><a href="##">关于我们</a></li> 
     <!-- <li class="pull-right"> <a href="login.php"><button class="btn btn-primary" type="button">登录</button></a></li> -->
    </ul> 
   </div> 
  </div> 
  <hr style="border:solid #337AB7 1px" />


@yield('content')

    <hr /> 
    <div class="container"> 
     <div class="row"> 
      <div class="col-md-3 "> 
       <div class="h3">
         友情链接
       </div> 
       <div class="">
        <a href="##">学校官网</a>
       </div>
       <br /> 
       <div class="">
        <a href="##">学校官网</a>
       </div>
       <br /> 
       <div class="">
        <a href="##">学校官网</a>
       </div>
       <br /> 
      </div> 
      <div class="col-md-3 "> 
       <div class="h3">
         服务
       </div> 
       <div class="">
        <a href="##">交通指南</a>
       </div>
       <br /> 
       <div class="">
        <a href="##">学校校历</a>
       </div>
       <br /> 
       <div class="">
        <a href="##">网站地图</a>
       </div>
       <br /> 
      </div> 
      <div class="col-md-3 "> 
       <div class="h3">
         关于
       </div> 
       <div class="">
        <a href="##">关于我们</a>
       </div>
       <br /> 
       <div class="">
        <a href="##">联系我们</a>
       </div>
       <br /> 
       <div class="">
        <a href="##">加入我们</a>
       </div>
       <br /> 
      </div> 
      <div class="col-md-3 "> 
       <div class="h3">
        关注我们
       </div> 
       <div class="">
        <img src="{{Config::get('constants.HOME_IMG')}}/ewm.gif" /> 
       </div>
       <br /> 
      </div> 
     </div> 
    </div> 
    <hr /> 
    <div class="container"> 
     <div class="row"> 
      <div class="col-md-3 ">
       <a href="##"></a>
      </div> 
      <div class="col-md-6">
        信息工程学院 13计算机网络技术班 PHP开发技术团队 <br/>Copyright &copy; Guangzhou Panyu Polytechnic. All Rights Reserved.
      </div> 
      <div class="col-md-3">
       <a href="##"></a>
      </div> 
     </div> 
    </div>
  </body>
</html>