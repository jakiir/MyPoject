<?php get_header('home'); ?>

<!-- Main Container
========================================================-->
<div id="mainContainer">
	<div class="scrollable">
	   <div class="items">
	   <?php 	
			$count = 1;
			$args = array(
				'post_type' => 'slider',
				'posts_per_page' => -1
			);
			query_posts($args);
			
			if (have_posts()) : while (have_posts()) : the_post(); 			
			$postId = $post->ID;
			$postTitle = $post->post_title;
			$postContent = $post->post_content;
			$postExcerpt = $post->post_excerpt;
			$postName = $post->post_name;
			$postPermalink = get_permalink( $postId );
			$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );			
		?> 
		  <div>
			<a href="<?php echo $postLink; ?>"><img src="<?php echo $postFeatImage; ?>" alt="<?php echo $postTitle; ?>" width="975" height="416"></a>
		  </div>
		<?php $count++; endwhile; endif; wp_reset_query(); ?>		  
	   </div>
	</div>
<section id="mainVisual">
	<div id="imageNavi">
	<ul id="slideNav">
		<li id="imgNaviLeft" class="prev"><a href="#">&lt;</a></li>
		<?php for($counter = 1; $counter <= $count; $counter++) { ?>
		<li id="imgNavi0<?php echo $counter; ?>" class="naviNumber <?php if($counter == 1) :?> current <?php endif; ?>"><a href="#"><?php echo $counter; ?></a></li>		
		<?php } ?>
		<li id="imgNaviRight" class="next"><a href="#">&gt;</a></li>
	</ul>
	</div>
</section>


<div id="featuredArticles">
	<h2 class="titleStyle_B2 headingTitle">BGE, JU Course Curriculum</h2>
	<?php 			
			$featured_newsArgs = array( 'post_type' => 'featured_news', 'posts_per_page' => 4 );	
			$featured_newsloop = new WP_Query( $featured_newsArgs );		
			while ( $featured_newsloop->have_posts() ) : $featured_newsloop->the_post();			  						
			$fpostId = $post->ID;	
			$fpostTitle = $post->post_title;			
			//$fpostdate = mysql2date('M j, Y', $post->post_date);
	                $fpostdate = mysql2date('M j, Y',get_field('date_this'));
			$fpostContent = $post->post_content;			
			$fpostExcerpt = $post->post_excerpt;		
			$fpostName = $post->post_name;		
			$fpostPermalink = get_permalink( $fpostId );	
			$fpostFeatImage = wp_get_attachment_url( get_post_thumbnail_id($fpostId) );				
			?> 
	
		<article class="first">
		<div class="left">
                    <a href="<?php echo $fpostPermalink; ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'thumbnail', 'featured_news', 'top']);">
                        <img src="<?php echo $fpostFeatImage; ?>" alt="<?php echo $fpostTitle; ?>" width="268">
                    </a>
                </div>
		<div class="right">
		<hgroup>
		<h3>
                    <a href="<?php echo $fpostPermalink; ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'title', 'featured_news', 'top']);">
                     <?php echo $fpostTitle; ?></a>
                </h3>
		</hgroup>
		<div class="txt">
		<p><?php echo $fpostdate; ?></p>		        
        </div>
		</div><!--/right-->
	</article>	
	<?php $count++; endwhile; ?>
	
	
	<?php 			
			
		/*$get_eventImageId = get_page_id('event-images');
		$get_eventImageData = get_page($get_eventImageId);
		$get_galleryId = $get_eventImageData->ID;
		$get_galleryTitle = $get_eventImageData->post_title;
		$get_gallery_Content = $get_eventImageData->post_content;	
		$get_galleryPermalink = get_permalink( $get_galleryId );
		//$get_galleryFeatImage = wp_get_attachment_url( get_post_thumbnail_id( $get_galleryId ) );

		
		preg_match('/\[gallery.*ids=.(.*).\]/', $get_gallery_Content, $ids);
		$galleryIds = explode(",", $ids[1]);		
		
		$i = 0;
		foreach($galleryIds as $key=>$value) {
		  if (count($galleryIds) - $i < 4)
		    $galleryIdss .= $value.',';
		  $i++;
		}
						
		$galleryy = '[gallery ids="'.$galleryIdss.'"]';	
	?> 
	
	<article class="event-images">
		<h2 class="titleStyle_B2 headingTitle">Event Images</h2>
		<a href="<?php echo home_url('/event-images/') ?>" target="_self" alt="<?php echo $get_galleryTitle; ?>" title="<?php echo $get_galleryTitle; ?>">
		<div class="galleyImages"><?php echo do_shortcode( $galleryy ) ?></div>
		</a>
	</article>
	<?php */ ?>

        <article class="course-curriculum">
		<h2 class="titleStyle_B2 headingTitle">BGE, JU Course Curriculum</h2>
		<?php
		 $get_curriculumId = get_page_id('bge-ju-course-curriculum');
		$get_curriculumData = get_page($get_curriculumId);
		$curriculumId = $get_curriculumData->ID;
		$eventImageDatadate = mysql2date('M j, Y', $get_curriculumData->post_date);
		$curriculumTitle = $get_curriculumData->post_title;
		$curriculumContent = $get_curriculumData->post_content;	
		$curriculumPermalink = get_permalink( $curriculumId );
		$curriculumTitleFeatImage = wp_get_attachment_url( get_post_thumbnail_id( $curriculumId ) );
		?>
		<div class="left">
                    <a href="<?php echo $curriculumPermalink; ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'thumbnail', 'course_curriculum', 'top']);">
                        <img src="<?php echo $curriculumTitleFeatImage; ?>" alt="<?php echo $curriculumTitle; ?>" width="268">
                    </a>
                </div>
		<div class="right">
		<hgroup>
		<h3>
                    <a href="<?php echo $curriculumPermalink; ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'title', 'course_curriculum', 'top']);">
                     <?php echo $curriculumTitle; ?></a>
                </h3>
		</hgroup>
		<div class="txt">
		<p><?php echo $eventImageDatadate; ?></p>
<!--<a class="linkArwNormal" href="<?php //echo $curriculumPermalink; ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'more', 'course_curriculum', 'top']);">More</a>-->
        		</div>
		</div><!--/right-->
	</article>
	
	<article class="laboratory">	
	<h2 class="titleStyle_B2 headingTitle">
<a href="<?php echo home_url('/event-gallery/?image=1') ?>" class="noUnderline" target="_self">Event Images</a></h2>
	<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
		
		<?php 			
			$bgeju_eventsArgs = array( 'post_type' => 'bgeju_events', 'posts_per_page' => 1 );	
			$bgeju_eventsloop = new WP_Query( $bgeju_eventsArgs );		
			while ( $bgeju_eventsloop->have_posts() ) : $bgeju_eventsloop->the_post();			  						
			$lpostId = $post->ID;	
			$lpostTitle = $post->post_title;			
			//$lpostdate = mysql2date('M j, Y', $post->post_date);	
			$lpostContent = $post->post_content;			
			//$lpostExcerpt = $post->post_excerpt;		
			//$lpostName = $post->post_name;		
			//$lpostPermalink = get_permalink( $lpostId );	
			//$lpostFeatImage = wp_get_attachment_url( get_post_thumbnail_id($lpostId) );	
			
			preg_match('/\[gallery.*ids=.(.*).\]/', $lpostContent, $ids);
			$galleryIds = explode(",", $ids[1]);		
			
			
			foreach($galleryIds as $key=>$value) { 
			 $eventImage = get_post($value); 
			$eventImageId = $eventImage->ID;
			$lpostFeatImage = $eventImage->guid;
			$lpost_excerpt = $eventImage->post_excerpt; ?>
			
<article class="marqueeEvery">
		<div class="left-">
                    <a href="<?php echo home_url('/event-gallery/?image=1') ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'thumbnail', 'bgeju_events', 'top']);">
                        <img src="<?php echo $lpostFeatImage; ?>" alt="<?php echo $lpost_excerpt; ?>" width="268">
                    </a>
                </div>
		<div class="right-" style="margin-top:10px;">
		<hgroup>
		<h3>
                    <a href="<?php echo home_url('/event-gallery/?image=1') ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'title', 'bgeju_events', 'top']);">
                     <?php echo $lpost_excerpt; ?></a>
                </h3>
		</hgroup>		
	</div><!--/right-->
</article>
			  
			<?php }	?> 
			

<?php endwhile; ?>
		
				
	</marquee>	
</article>	
</div>




<section id="about">
	<h2 class="titleStyle_B2 headingTitle">
	<a href="<?php echo home_url('/about/'); ?>">
		About  Biotechnology & Genetic Engineering 
	</a>
	</h2>
	<?php
	$get_pageID_about = get_page_id('about');
	$get_pageData_about = get_page($get_pageID_about);
	$get_pageId = $get_pageData_about->ID;
	$get_pageTitle = $get_pageData_about->post_title;
	$get_page_Content = $get_pageData_about->post_content;	
	$get_pagePermalink = get_permalink( $get_pageId );
	$get_pageFeatImage = wp_get_attachment_url( get_post_thumbnail_id($get_pageId) );
	?>
	<?php if($get_pageFeatImage) : ?>
	<div class="img">
	<a href="#" onclick="_gaq.push(['_trackEvent', 'thumbnail', 'about', 'top']);">
	<img src="<?php echo $get_pageFeatImage; ?>" alt="About BGE Ju" width="466" height="230">
	</a>
	</div>
	<?php endif; ?>
	<div class="txt">
	<p class="last"><?php echo $get_page_Content; ?><br>
	<!--<a class="linkArwNormal" href="<?php //echo $get_pagePermalink; ?>" onclick="_gaq.push(['_trackEvent', 'more', 'about', 'top']);">More</a></p>-->
	</div>
</section>

<section id="faculty">
	<h2 class="titleStyle_B2 headingTitle">Faculty BGE, JU</h2>
		<div class="img">
			<span class="a">
				<span class="b">
	<a href="<?php echo home_url('/faculty-explorer'); ?>" onclick="_gaq.push(['_trackEvent', 'thumbnail', 'faculty', 'top']);">
		<?php 				
			$args = array(
				'post_type' => 'faculty_explorer',
				'posts_per_page' => -1
			);
			query_posts($args);			
			if (have_posts()) : while (have_posts()) : the_post();			 			
			$postId = $post->ID;
			$postTitle = $post->post_title;
			$postContent = $post->post_content;
			$postExcerpt = $post->post_excerpt;
			$postName = $post->post_name;
			$postPermalink = get_permalink( $postId );
			$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );
			if($postFeatImage) : $postFeatImage = $postFeatImage; else : $postFeatImage = get_template_directory_uri().'/images/icon/no-image.jpg'; endif;
		?> 
			<img src="<?php echo $postFeatImage; ?>" width="154" height="112" alt="<?php echo $postTitle; ?>" />		
		<?php endwhile; endif; wp_reset_query(); ?>		
						
					</a>
				</span>
			</span>
		</div>
		<div class="txt">
		<p class="last">Department of Biotechnology and Genetic Engineering, Jahangirnagar University</p>
		<!--<a class="linkArwNormal" href="#" onclick="_gaq.push(['_trackEvent', 'more', 'faculty', 'top']);">Faculty Explorer</a>-->
		</div>
</section>

<section id="eventVideo">
	<h2 class="titleStyle_B2 headingTitle">
<a href="<?php echo home_url('/event-gallery/?video=1&poId='.$eventVideoId) ?>" class="noUnderline" target="_self" alt="" title="">Event Videos</a>
</h2>
	<marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
		
		<?php 			
			$bgeju_eventsArgs = array( 'post_type' => 'bgeju_events', 'posts_per_page' => 1 );	
			$bgeju_eventsloop = new WP_Query( $bgeju_eventsArgs );		
			while ( $bgeju_eventsloop->have_posts() ) : $bgeju_eventsloop->the_post();			  						
			$eventVideoId = $post->ID;	
			$lpostTitle = $post->post_title;	
                        $event_videos = get_field('event_videos');			
				
			
			//preg_match('/\[gallery.*ids=.(.*).\]/', $lpostContent, $ids);
			$galleryVedios = explode("|", $event_videos);		
			
			
			foreach($galleryVedios as $galleryVedio) { 
			 
    $vidID = $galleryVedio;
    $url = "http://gdata.youtube.com/feeds/api/videos/". $vidID;
    $doc = new DOMDocument;
    $doc->load($url);
    $youTubTitle = trunck_string($doc->getElementsByTagName("title")->item(0)->nodeValue,25,true);

    ?>
			
<article class="marqueeEvery">
		<div class="left-">
<a href="<?php echo home_url('/event-gallery/?video=1&poId='.$eventVideoId) ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'thumbnail', 'bgeju_events', 'top']);">
    <img src="http://img.youtube.com/vi/<?php echo $galleryVedio; ?>/default.jpg" alt="<?php echo $lpostTitle; ?>" width="268" height="114" />
</a>
                    <!--<iframe class="iframe_video_event" src="https://www.youtube.com/embed/<?php //echo $galleryVedio; ?>" width="268" height="114" frameborder="0" allowfullscreen="allowfullscreen"></iframe>  -->                  
</div>
<div class="right-" style="margin-top:10px;">
<hgroup>
   <h3><a href="<?php echo home_url('/event-gallery/?video=1&poId='.$eventVideoId) ?>" target="_self" onclick="_gaq.push(['_trackEvent', 'title', 'bgeju_events', 'top']);"><?php echo $youTubTitle; ?></a></h3>
</hgroup>		
</div>		
</article>

<?php }	?>

<?php endwhile; ?>
		
				
	</marquee>
<!--<div class="videoGallery">
   <a class="linkArwNormal" href="<?php //echo home_url('/event-gallery/?video=1&poId='.$eventVideoId) ?>" onclick="_gaq.push(['_trackEvent', 'more', 'faculty', 'top']);">More videos...</a>
</div>-->
</section>


<div class="cl"></div>
</div>

<?php get_footer(); ?>