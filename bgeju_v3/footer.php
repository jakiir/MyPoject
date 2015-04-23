<p class="pagetopLink"><a href="#pagetop">Page Top</a></p>
<!-- Content Footer
========================================================-->
<div id="contentFooter">
<div class="contentFooterInner">

<section id="footerModule_News" class="footerModule_LinkList">
	<h2 class="titleStyle_B2 headingTitle">
	Google Calendar
	</h2>
	<!--<ul>
	<?php 		
			/*$countt = 1;
			$args = array(
				'post_type' => 'featured_news',
				'posts_per_page' => 8
			);
			query_posts($args);
			
			if (have_posts()) : while (have_posts()) : the_post();			
			
			$postId = $post->ID;
			$postTitle = $post->post_title;
			$ffpostdate = mysql2date('M j, Y',get_field('date_this'));
			//$postContent = $post->post_content;
			$postContent = trunck_string($post->post_content ,100,true);
			//$postExcerpt = trunck_string($post->post_excerpt ,200,true);
			//$postName = $post->post_name;
			$postPermalink = get_permalink( $postId );
			//$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );	
			//$event_start_date = get_field('event_start_date');
			
			//if($postFeatImage) : $postFeatImage = $postFeatImage; else : $postFeatImage = get_template_directory_uri().'/images/icon/no-image.jpg'; endif;
if($countt > 4):
		?> 
		
			<li class="blankLink">
				<a href="<?php echo $postPermalink; ?>" target="_blank">
						<span class="inner">
			<span class="date"><em><?php echo $ffpostdate; ?></em></span>
			<span class="title"><?php echo $postContent; ?></span>
			</span>
			</a>
			</li>
<?php endif; $countt++; endwhile; endif; wp_reset_query(); */ ?>
				</ul>-->
	<iframe src="https://www.google.com/calendar/embed?src=12do7j1oo8abj37tt14itjtvt0%40group.calendar.google.com&ctz=Asia/Dhaka" style="border: 0" width="475" height="300" frameborder="0" scrolling="no"></iframe>
</section>

<section id="footerModule_Events" class="footerModule_LinkList">
	<h2 class="titleStyle_B2">
	<a href="#"><img src="<?php bloginfo('template_url'); ?>/images/title/upcomingProgram.png" alt="Event Calendar" width="305" height="21" /></a>
	</h2>
	<ul>
	<?php 		
			 $countt = 1;
			$args = array(
				'post_type' => 'upcomingPrograms',
				'posts_per_page' => 3
			);
			query_posts($args);
			
			if (have_posts()) : while (have_posts()) : the_post();			
			
			$postId = $post->ID;
			$postTitle = $post->post_title;
			$postdate = mysql2date('M j, Y', $post->post_date);
			//$postContent = $post->post_content;
			$postContent = trunck_string($post->post_content ,100,true);
			//$postExcerpt = trunck_string($post->post_excerpt ,200,true);
			//$postName = $post->post_name;
			$postPermalink = get_permalink( $postId );
			//$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );	
			//$programs_date = get_field('programs_date');
			
			//if($postFeatImage) : $postFeatImage = $postFeatImage; else : $postFeatImage = get_template_directory_uri().'/images/icon/no-image.jpg'; endif;
		?> 
    
	<li>
	    			    		
		<a href="#">
			<span class="inner">
			<span class="date"><em><?php echo $postdate; ?></em></span>
			<span class="title"></span>
			<span class="talkTitle"><?php echo $postContent; ?></span>
			</span>
		</a>
	</li>
<?php $countt++; endwhile; endif; wp_reset_query(); ?>	
	
		</ul>


	
</section>
<div class="cl"></div>
</div>
</div><!--/contentFooter--><!-- Footer
========================================================-->

<footer id="pagefooter">
<div class="left">
	<nav>
		<ul>
			<li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
			<li><a href="<?php echo home_url('/access'); ?>">Access</a></li>
			<li><?php if(!is_user_logged_in()) { ?><a href="<?php echo home_url('/login'); ?>">Login</a><?php } else { ?><a href="<?php echo home_url('/profile'); ?>">Profile</a><?php } ?></li>		
		</ul>
	</nav>
	
</div>
<div class="right">
	<nav class="sub">
		<ul>						
			<li class="fblink">
				<a href="https://www.facebook.com/" target="_blank"></a>
			</li>
			<li class="twlink">
				<a href="https://twitter.com/" target="_blank"></a>
			</li>
			<li class="ldlink">
				<a href="https://www.linkedin.com/" target="_blank"></a>
			</li>
		</ul>
	</nav>
</div>
<div class="cl"></div>
<p style="margin-top: 26px;">
	<small>
	Copyright ©  Department of BGE,JU  All Rights Reserved . Developed by. <a class='noDesignUrl' href='http://bdinfobiz.com' target='_blank' title='BDINFOBIZ LIMITED' alt='BDINFOBIZ LIMITED'>BDINFOBIZ LIMITED</a>
	</small>		
</p>
</footer>

</div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom_Js.js"></script>
<?php wp_footer(); ?>

</body>

</html>