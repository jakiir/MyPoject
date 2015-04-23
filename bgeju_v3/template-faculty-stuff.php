<?php
/* Template Name: Faculty Stuff Page */
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
 
 <?php if($banner_image): ?>
<h1 id="mainVisual"><span class="bannerPageTitle"><h3><?php echo $postTitle; ?></h3></span><img src="<?php echo $banner_image; ?>" alt="Faculty Stuff" width="739" height="180"></h1>
<?php endif; ?>
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
<?php endwhile; endif; wp_reset_query(); ?>

<!-- Side Navigation
========================================================-->

<div id="sideNav">
	<?php get_sidebar('stuff'); ?>
</div><!--sideNav-->

<!-- Main Contents
========================================================-->
<div id="mainContents">


	
<section>
<h2 class="headingTitle" style="border-top: 2px solid #333333;padding-top: 15px;margin-bottom: 40px;">Office Staff</h2>
<ul>
<?php 
	$ffacultyStuffArgs = array( 'post_type' => 'faculty_stuff', 'posts_per_page' => -1 );	
	$ffacultyStuffArgsloop = new WP_Query( $ffacultyStuffArgs );		
	while ( $ffacultyStuffArgsloop->have_posts() ) : $ffacultyStuffArgsloop->the_post();
	$ffpostTitle = $post->post_title;
	$fspostContent = trunck_string($post->post_content ,100,true);
	$ffpostPermalink = get_permalink( $post->ID );
	//$ffachieveOffaculty = get_field('achieve');
	//$ffdesignationOffaculty = get_field('designation');
?>	
<li><a href="<?php echo $ffpostPermalink; ?>" title="Stuff Details"><strong><?php echo $ffpostTitle; ?></strong></a><div><?php echo $fspostContent; ?><a style="background:none;padding-left:0;" href="<?php echo $ffpostPermalink; ?>" title="Stuff Details">More</a></div></li>
<?php endwhile; ?>
</ul>

</section>		

</div><!--/mainContents-->

<div class="cl"></div>
</div>
</div><!--/mainContainer-->

<?php get_footer(); ?>