<?php


/* Template Name: Faculty Explorer Page */


get_header();


?>
<link href="<?php bloginfo('template_url'); ?>/css/faculty-styles.css" rel="stylesheet" type="text/css">


<!-- Main Container
========================================================-->
<div id="mainContainer">
<div id="facultyExplorer">
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
<h1 id="mainVisual">
<span class="bannerPageTitle"><h3><?php echo $postTitle; ?></h3></span>
<img src="<?php echo $banner_image; ?>" alt="<?php echo $postTitle; ?>" width="739" height="180">
</h1>
<?php endif; ?>
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
 <?php endwhile; endif; wp_reset_query(); ?>

<!-- Side Navigation
========================================================-->

<div id="sideNav">
	<?php get_sidebar('faculty'); ?>
</div><!--sideNav-->


<!-- Main Contents
========================================================-->
<div id="mainContents">


<div id="explorerContainer">
<div id="explorerContainerInner">
<div id="explorerContainerInner2">
<section>


<ul id="fixingLayout">
<?php 		
			$countt = 1;
			$args = array(
				'post_type' => 'faculty_explorer',
				'posts_per_page' => -1
			);
			query_posts($args);
			
			if (have_posts()) : while (have_posts()) : the_post();			 			
			$postId = $post->ID;
			$postTitle = $post->post_title;
			//$postContent = $post->post_content;
			$postContent = trunck_string($post->post_content ,200,true);
			$postExcerpt = trunck_string($post->post_excerpt ,100,true);
			$postName = $post->post_name;
			$postPermalink = get_permalink( $postId );
			$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );	
			$nameOffaculty = get_field('name');
			$achieveOffaculty = get_field('achieve');
			$designationOffaculty = get_field('designation');
			if($postFeatImage) : $postFeatImage = $postFeatImage; else : $postFeatImage = get_template_directory_uri().'/images/icon/no-image.jpg'; endif;
		?> 
		

		<li class="type0-0" id="">
	<div class="txt"><p><?php echo $postTitle; ?><img src="<?php bloginfo('template_url'); ?>/images/icon/blank.png" width="1" height="1" alt=""></p></div>
	<div class="img">
	<a href="javascript:void()">
	<img src="<?php echo $postFeatImage; ?>" alt="<?php echo $nameOffaculty; ?>" width="235" height="235">
	</a>
	</div>
	
	<div class="overlayBoxWrapper" style="<?php if($countt%3==0): ?> right: -16px; <?php else : ?> left: -16px; <?php endif; ?> top: -16px;">
		<div class="overlayBoxWrapperInner" style="width: 520px; min-height:188px; max-height: 269px; height:auto;">
			<div class="overlayBox <?php if($countt%3==0): echo 'type2'; else : echo 'type1'; endif; ?>" style="width: 518px; min-height:188px; max-height: 267px; height:auto; opacity: 1;">
				<a href="<?php echo $postPermalink; ?>">
					<div class="overlayBoxInner">
						<div class="imgWrapper">
							<div class="img">
								<span class="a">
									<img src="<?php bloginfo('template_url'); ?>/images/icon/blank.png" width="1" height="1" alt="">
								</span>
								<span class="b">
									<img src="<?php echo $postFeatImage; ?>" alt="Kazuhiro Yamakawa" width="235" height="235" style="width: 235px; height: auto; display: inline-block; opacity: 1;">
								</span>
							</div>
						</div>
						
						<div class="txtWrap" style="display:block">
							<p class="name" style="opacity: 1;"><?=$nameOffaculty;?>, <?=$achieveOffaculty;?></p>
							<p class="lab" style="opacity: 1;"><?=$designationOffaculty;?><br></p>
							<p></p>
							<div class="txtOverlay" style="opacity: 1;">
								<p><?=$postExcerpt;?></p>
							</div>
						</div>						
					</div>
				</a>
			</div>
		</div>
	</div>
	
</li>
<?php $countt++; endwhile; endif; wp_reset_query(); ?>		
</ul>


			
</section>
</div>
</div>
</div><!--/explorerContainer-->



</div><!--/mainContents-->



<div class="cl"></div>
</div>
</div><!--/mainContainer-->


<?php get_footer(); ?>