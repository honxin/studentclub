<html>
	<head>
    	<title>后台管理</title>
    </head>
    <body style="margin:0;padding:0">
		<div style="width:100%;height:100px;background-image:url('{{ Config::get('constants.ADMIN_IMG') }}/index/top.png');background-repeat:no-repeat;">
			<p align="left">
				<font style="color:white;font-size:50px;">后台管理</font>
				<span id='time' style='color:white;font-size:20px;float:right;margin:20px'></span>
				<span  style='color:white;font-size:20px;float:right;margin:20px'>欢迎【<font color="red">{{session()->get("adminname")}}</font>】登录系统  <a href="{{action('Admin\LogController@logout')}}" onclick="logout()">退出系统</a></span>
			</p>
		</div>
		<script>
			function logout(){

				top.location.href="{{action('Admin\LogController@login')}}";
			}
					function time(){
						date = new Date();
						Y = date.getFullYear();
						M = date.getMonth();
						d = date.getDay();
						H = date.getHours();
						m = date.getMinutes();
						s = date.getSeconds();
						m = check(m);
						s = check(s);
						document.getElementById('time').innerHTML = "当前时间："+H+":"+m+":"+s;
						setTimeout(function(){time();},1000);
					}
					function check(i){
						if(i<10){
							i = "0"+i;
						}
						return i;
					}
					time();
		</script>
    </body>
</html>