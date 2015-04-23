<?php
/* Template Name: Faculty Finder Page */
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
	<?php get_sidebar('faculty'); ?>
</div><!--sideNav-->

<!-- Main Contents
========================================================-->
<div id="mainContents">


	
<section>
<h2 class="titleStyle_A1"><img src="<?php bloginfo('template_url'); ?>/images/title/faculty_title.png" alt="Faculty" width="400" height="20"></h2>
<ul>
<?php 
	$ffacultyExplorerArgs = array( 'post_type' => 'faculty_explorer', 'posts_per_page' => -1 );	
	$ffacultyExplorerArgsloop = new WP_Query( $ffacultyExplorerArgs );		
	while ( $ffacultyExplorerArgsloop->have_posts() ) : $ffacultyExplorerArgsloop->the_post();
	$ffpostTitle = $post->post_title;
	$ffpostPermalink = get_permalink( $post->ID );
	$ffachieveOffaculty = get_field('achieve');
	$ffdesignationOffaculty = get_field('designation');
?>	
<li><a href="<?php if($ffpostPermalink): echo $ffpostPermalink; endif; ?>"><strong><?php if($ffpostTitle): echo $ffpostTitle; endif; ?></strong><?php if($ffachieveOffaculty): echo $ffachieveOffaculty; endif; ?><br><span><?php if($ffdesignationOffaculty): echo $ffdesignationOffaculty; endif; ?><br></span></a></li>
<?php endwhile; ?>
</ul>

</section>		

</div><!--/mainContents-->

<div class="cl"></div>
</div>
</div><!--/mainContainer-->

<?php get_footer(); ?>