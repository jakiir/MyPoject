<?php
/* Template Name: Event Gallery Template */
get_header();
?>
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
				$banner_image = get_field('banner_image');
				?>

				<?php if($banner_image): ?>
					<h1 id="mainVisual"><span class="bannerPageTitle"><h3><?php echo $postTitle; ?></h3></span><img src="<?php echo $banner_image; ?>" alt="Gallery" width="739" height="180"></h1>
				<?php endif; ?>
			<?php endwhile; endif; wp_reset_query(); ?>

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
					<?php

						$eventArgs = array(
							'post_type' => 'bgeju_events',
							'posts_per_page' => -1
						);
						query_posts($eventArgs);
						if (have_posts()) : while (have_posts()) : the_post();
						$eventpostId = $post->ID;
                                                $eventpostTitle = get_the_title($eventpostId);
                                                $eventpostPermalink = get_permalink( $eventpostId );
						$eventpostFeatImage = wp_get_attachment_url( get_post_thumbnail_id($eventpostId) );
                                                $getVideos = get_post_meta( $eventpostId, 'event_videos', true );
if($_GET['image']==1):
					?>
						
<div class="eventImage">
   <a href="<?php echo $eventpostPermalink.'?image=1';  ?>" target="_self" title="<?php echo $eventpostTitle; ?>"><img src="<?php echo $eventpostFeatImage;  ?>" alt="<?php echo $eventpostTitle;  ?>" title="<?php echo $eventpostTitle;  ?>" /></a>
   <div class="galleryTitle"><a href="<?php echo $eventpostPermalink.'?image=1';  ?>" target="_self" title="<?php echo $eventpostTitle; ?>"><?php echo $eventpostTitle; ?></a></div>						
</div>

<?php endif; if($_GET['video']==1 && $_GET['poId'] && $getVideos !=''): 
$galleryVedios = explode("|", $getVideos);				
//foreach($galleryVedios as $galleryVedio) { 
?>
<div class="eventImage">
   <a href="<?php echo $eventpostPermalink.'?video=1';  ?>" target="_self" title="<?php echo $eventpostTitle; ?>">
   <img src="http://img.youtube.com/vi/<?php echo $galleryVedios[0]; ?>/default.jpg" alt="<?php echo $eventpostTitle;  ?>" title="<?php echo $eventpostTitle;  ?>" />   
   </a>	
   <div class="galleryTitle"><a href="<?php echo $eventpostPermalink.'?video=1';  ?>" target="_self" title="<?php echo $eventpostTitle; ?>"><?php echo $eventpostTitle; ?></a></div>					
</div>

				
						
<?php //} 

endif; endwhile; endif; wp_reset_query(); ?>

<?php /* if($_GET['video']==1 && $_GET['poId']): 
$getVideos = get_post_meta( $_GET['poId'], 'event_videos', true );
$galleryVedios = explode("|", $getVideos);				
foreach($galleryVedios as $galleryVedio) { 
?>
<div class="eventVideo">
   <iframe class="iframe_video_event" src="https://www.youtube.com/embed/<?php echo $galleryVedio; ?>" width="300" height="300" frameborder="0" allowfullscreen="allowfullscreen"></iframe> 						
</div>

<?php } endif; */ ?>

</section>

				</div><!--/mainContents-->
				<div class="cl"></div>

		</div>
	</div><!--/mainContainer-->
	<!-- InstanceEndEditable -->

<?php get_footer(); ?>