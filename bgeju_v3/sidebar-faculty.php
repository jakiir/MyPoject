<nav>
<ul>

<li class="current" id="sideNav01">
	<div>
		<a href="<?php echo home_url('/faculty-explorer/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/title/sidenav_faculty_02_current.png" alt="Faculty Explorer" width="216" height="70"></a>
	</div>
	<p class="first">Faculty Groups</p>
	<ul>
	<?php 
			$facultyExplorerArgs = array( 'post_type' => 'faculty_explorer', 'posts_per_page' => -1 );	
			$facultyExplorerArgsloop = new WP_Query( $facultyExplorerArgs );		
			while ( $facultyExplorerArgsloop->have_posts() ) : $facultyExplorerArgsloop->the_post();
			$postTitle = $post->post_title;
			$fpostPermalink = get_permalink( $post->ID );
		?> 
			<li><a href="<?php echo $fpostPermalink ; ?>"><?php echo $postTitle; ?></a></li>
		<?php $count++; endwhile; ?>				
	</ul>
	
</li>
</ul>