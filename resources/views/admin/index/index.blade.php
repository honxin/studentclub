<frameset rows = "75px,*,40px" bordercolor="#666666" frameborder = "0">
	<frame src = "{{ action('Admin\IndexController@top')}}" noresize  scrolling = "no" bordercolor="#FF0000" />
	<frameset cols = "162px,*" bordercolor="#999999" >
		<frame src = "{{ action('Admin\IndexController@left')}}" noresize  />
		<frame src = "{{ action('Admin\IndexController@sysinfo')}}" noresize  name = "content" />
	</frameset>
	<frame src = "{{ action('Admin\IndexController@foot')}}" noresize frameborder = "0" scrolling = "no"/>
</frameset>