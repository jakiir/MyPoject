<nav>
<ul>

<li class="current" id="sideNav01">	
	<p class="first">Office Staff</p>
	<ul>
	<?php 
			$facultyStuffArgs = array( 'post_type' => 'faculty_stuff', 'posts_per_page' => -1 );	
			$facultyStuffArgsloop = new WP_Query( $facultyStuffArgs );		
			while ( $facultyStuffArgsloop->have_posts() ) : $facultyStuffArgsloop->the_post();
			$postTitle = $post->post_title;
			$fpostPermalink = get_permalink( $post->ID );
		?> 
			<li><a href="<?php echo $fpostPermalink ; ?>"><?php echo $postTitle; ?></a></li>
		<?php $count++; endwhile; ?>				
	</ul>
	
</li>
</ul>