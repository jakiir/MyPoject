<?php get_header(); ?>
<link href="<?php bloginfo('template_url'); ?>/css/page-style.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/full-width-style.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="Main Container" -->
<!-- Main Container
========================================================-->
<div id="mainContainer">
<div id="careers" class="details">
<?php if (have_posts()) : while (have_posts()) : the_post();
	$postId = $post->ID;
	$postTitle = $post->post_title;
	$postContent = $post->post_content;
	$postExcerpt = $post->post_excerpt;
	$postName = $post->post_name;
	$postPermalink = get_permalink( $postId );
	$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );
 ?>

<?php if($postFeatImage): ?>
<h1 id="mainVisual"><img src="<?php echo $postFeatImage; ?>" alt="Careers" width="975" height="180"></h1>
<?php endif; ?>
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>



<!-- Side Navigation
========================================================-->
<!--<div id="sideNav">
<?php get_sidebar(); ?>
</div>--><!--sideNav-->



<!-- Main Contents
========================================================-->
<div id="mainContents">

<section>
<header>
<h2 class="titleStyle_A2">
<?php echo $postTitle; ?>
<a class="btn" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/btn/btn_contact.png" alt="Contact Careers" height="27"></a>
</h2>
</header>

<section>
<div class="txt">
<p><?php the_content(); //echo $postContent; ?></p>
</div>
</section>



</section>

</div><!--/mainContents-->
<div class="cl"></div>
<?php endwhile; endif; wp_reset_query(); ?>
</div>
</div><!--/mainContainer-->
<!-- InstanceEndEditable -->





<?php get_footer(); ?>