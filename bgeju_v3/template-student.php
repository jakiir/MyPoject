<?php
/* Template Name: All Student Page */
get_header();
?>
<link href="<?php bloginfo('template_url'); ?>/css/faculty-styles.css" rel="stylesheet" type="text/css">
<!-- Main Container
========================================================-->
<div id="mainContainer">
<div id="facultyTop">					



<?php if (have_posts()) : while (have_posts()) : the_post();
	$postId = $post->ID;
	$postTitle = $post->post_title;
	$postContent = $post->post_content;
	$postExcerpt = $post->post_excerpt;
	$postName = $post->post_name;
	$postPermalink = get_permalink( $postId );
	$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );
        $banner_image = get_field('banner_image');
 ?>
 <?php endwhile; endif; wp_reset_query(); ?>
 <?php if($banner_image): ?>
<h1 id="mainVisual"><span class="bannerPageTitle"><h3><?php echo $postTitle; ?></h3></span><img src="<?php echo $banner_image; ?>" alt="<?php echo $postTitle; ?>" width="739" height="180"></h1>
<?php endif; ?>
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>


<!-- Side Navigation
========================================================-->

<div id="sideNav">
	<?php get_sidebar('student'); ?>
</div><!--sideNav-->

<!-- Main Contents
========================================================-->
<div id="mainContents">


	
<section>
<h2 class="titleStyle_A1 headingTitle"><?php echo $postTitle; ?></h2>
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
	<li><a href="<?php echo home_url('/profile/').$userId; ?>"><strong><?php if($display_name): echo $display_name; endif; ?></strong><?php if($user_email): echo $user_email.'<br>'; endif; ?><span><?php if($student_class): echo $student_class.'<br>'; endif; ?></span></a></li>
	
	<?php
		  }
		}
	?>	
</ul>

</section>		

</div><!--/mainContents-->

<div class="cl"></div>
</div>
</div><!--/mainContainer-->

<?php get_footer(); ?>