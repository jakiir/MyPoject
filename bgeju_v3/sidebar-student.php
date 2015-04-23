<nav>
<ul>

<li class="current" id="sideNav01">
	
	<p class="first">Faculty Student</p>
	<ul>
	<?php						
		$blogusers = get_users('orderby=ID&role=faculty_student');
		if ($blogusers) {
		  foreach ($blogusers as $user) {
			$userId = $user->ID;
			$userName = $user->user_login;
			$avatar = get_avatar( $user->ID, 130 );	
			$display_name = $user->display_name;
			$user_email = $user->user_email;
			$student_class = $user->student_class;
			$website = $user->user_url;
			if($website){ $web_url='//'.$user->user_url; }else{ $web_url = 'javascript:void(0)'; }
	?>
	<li><a href="<?php echo home_url('/profile/').$userId; ?>"><?php echo $display_name; ?></a></li>	
	<?php
		  }
		}
	?>				
	</ul>
	
</li>
</ul>