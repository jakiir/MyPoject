<?php get_header('laboratory'); ?>

<link href="<?php bloginfo('template_url'); ?>/css/laboratory.css" rel="stylesheet" type="text/css">
<!-- Main Container
========================================================-->
<div id="main_container_laboratory">
<div id="laboratoryDetails">

<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
<!-- Side Navigation
========================================================-->

<div id="sideNav">
 <?php get_sidebar('laboratory'); ?>

</div>

<div id="mainContents">

<section class="researchArea">
	<section class="researchArea">

		<div class="txt">
			<p class="last">
			
				<?php include_once('main_content_laboratory.php'); ?>		
			
			
			</p>
		</div>

	</section>
</section>
</div><!--/mainContents-->

<div class="cl"></div>
</div>
</div><!--/mainContainer-->

<?php get_footer(); ?>