<?php get_header(); ?>
<link href="<?php bloginfo('template_url'); ?>/css/faculty-styles.css" rel="stylesheet" type="text/css">
<!-- Main Container
========================================================-->
<div id="mainContainer">
<div id="facultyDetail">
<?php
if (have_posts()) : while (have_posts()) : the_post();
	$postId = $post->ID;
	$banner_image = get_post_meta( $postId, 'banner_image', true ); //get_field('banner_image');
	$postTitle = $post->post_title;
?>

<?php if($banner_image): ?>
<h1 id="mainVisual"><span class="bannerPageTitle"><h3><?php echo $postTitle; ?></h3></span><img src="<?php echo $banner_image; ?>" alt="Careers" width="739" height="180"></h1>
<?php endif; ?>
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
<!-- Side Navigation
========================================================-->

<div id="sideNav">
 <?php get_sidebar('faculty'); ?>
</nav>

</div><!--sideNav-->
<!-- Main Contents
========================================================-->
<div id="mainContents">

<section>
<?php 
	
	$postContent = $post->post_content;
	//$postContent = trunck_string($post->post_content ,200,true);
	$postExcerpt = trunck_string($post->post_excerpt ,200,true);
	$postName = $post->post_name;
	$postPermalink = get_permalink( $postId );
	$postFeatImage = wp_get_attachment_url( get_post_thumbnail_id($postId) );	
	$nameOffaculty = get_post_meta( $postId, 'name', true ); //get_field('name');
	$achieveOffaculty = get_post_meta( $postId, 'achieve', true ); //get_field('achieve');
	$designationOffaculty = get_post_meta( $postId, 'designation', true ); //get_field('designation');
	$cvfileOffaculty = get_post_meta( $postId, 'upload_cv', true ); //get_field('upload_cv');
	$faculty_email = get_post_meta( $postId, 'faculty_email', true ); //get_field('faculty_email');	
	$cellPhoneOffaculty = get_post_meta( $postId, 'cell_phone', true ); //get_field('cell_phone');
	$extensionOffaculty = get_post_meta( $postId, 'extension', true ); //get_field('extension');
	$faxOffaculty = get_post_meta( $postId, 'fax', true ); //get_field('fax');
	//$addressFaculty = get_field('address');
	$document_upload = get_post_meta( $postId, 'document_upload', true ); // get_field('document_upload');
	$books = get_post_meta( $postId, 'books', true ); //get_field('books');
	$conference_paper = get_post_meta( $postId, 'conference_paper', true ); //get_field('conference_paper');
	$upload_video = get_post_meta( $postId, 'banner_image', true ); //get_field('upload_video');
	$upload_images = get_post_meta( $postId, 'upload_images', true ); //get_field('upload_images');
        $laboratory_page = get_post_meta( $postId, 'laboratory_page', true );
	
	$selected_publications = get_post_meta( $postId, 'selected_publications', true );
	
	if($postFeatImage) : $postFeatImage = $postFeatImage; else : $postFeatImage = get_template_directory_uri().'/images/icon/no-image.jpg'; endif;
 ?>

<header>
	<h2>
		<span class="name"><?php echo $nameOffaculty; ?></span>,
		<span class="title"><?php echo $achieveOffaculty; ?></span>
	</h2>
	<p>- <?php echo $postExcerpt; ?></p>
</header>


<section class="intro">
<div class="left">
<hgroup>
	<h3><?php echo $designationOffaculty; ?></h3>
	<h4>Dept. of Biotechnology and Genetic Engineering<br>Jahangirnagar University</h4>
</hgroup>


<div class="txt">
	<p class="keywords"><span class="inner">
	  <?php echo 'Cell phone: '.$cellPhoneOffaculty; echo '<br>Extension: '.$extensionOffaculty; echo '<br>Fax: '.$faxOffaculty; ?>
	  <br>
	  Address : Dept. of Biotechnology & Genetic Engineering<br>Jahangirnagar University<br>Savar, Dhaka-1342
	</span></p>
</div>




<nav class="anchor">
	<ul>
		<?php if($selected_publications != '' ) : ?><li><a href="#publications">Publications</a></li><?php endif; ?>
		<?php if($document_upload != '' ) : ?><li><a href="#documents">Documents</a></li><?php endif; ?>
		<?php if($upload_video != '' ) : ?><li><a href="#videos">Videos</a></li><?php endif; ?>
		<?php if($upload_images != '' ) : ?><li><a href="#images">Images</a></li><?php endif; ?>		
	</ul>
</nav>
<aside>
<ul>
<?php if($laboratory_page): ?>
<li class="blank"><a href="<?php echo home_url("/?p=$laboratory_page"); ?>" target="_blank">Laboratory website</a></li>	
<?php endif; ?>			
		<li class="pdf"><a href="<?php echo $cvfileOffaculty; ?>" target="_blank">Curriculum Vitae</a></li>
		<li class="mail"><span class="mailAddressLine"><?php echo $faculty_email; ?></span></li>
	</ul>
</aside>
</div><!--/left-->
<div class="right"><img src="<?php echo $postFeatImage; ?>" alt="<?php echo $postTitle; ?>" title="<?php echo $postTitle; ?>" width="437" height="320"></div>
</section>


<section class="researchArea">
<h3 class="titleStyle_B2"><img src="<?php echo get_template_directory_uri().'/images/title/title_detail_00.png'; ?>" alt="Research Area" width="400" height="20"></h3>
<section class="researchArea">

<div class="txt">
<p class="last"><?php echo $postContent;  ?></p>
</div>

</section>
</section>



<section class="publications" id="publications">
<h3 class="titleStyle_B2"><img src="<?php echo get_template_directory_uri().'/images/title/title_detail_01.png'; ?>" alt="Selected Publications" width="400" height="20"> <a class="btn" href="#"><img src="<?php echo get_template_directory_uri().'/images/btn/btn_viewall.png'; ?>" alt="View All" height="27"></a></h3>
<?php	
	$pieces = explode("</li>", $selected_publications);	
	$selectedPublication[]='';	
	for($i=0;$i<count($pieces);$i++){		
	$getLi = array("<li>","</li>");
	$ii = $i+1;
	$replaceLi   = array("<li><div>$ii</div><p>","</p></li>");				
	$selectedPublication[$i] = str_replace($getLi, $replaceLi, $pieces[$i]);
		echo $selectedPublication[$i];		
	}
?>
</section>



<?php if($document_upload): ?>
<section class="documents" id="documents">
<h3 class="titleStyle_B2">
	<span class="headingTitle">Documents</span>	
	<a class="btn" href="#">
	<img src="<?php echo get_template_directory_uri().'/images/btn/btn_viewall.png'; ?>" alt="View All" height="27">
	</a>
</h3>
<ul>
	<?php				
		$getPP = array("<p>","</p>");	
		$replaceLiForPP   = array("<li class='clearfix nolink'>","</li>");				
		$documenttUpload = str_replace($getPP, $replaceLiForPP, $document_upload);
		echo $documenttUpload;		
	?>		
</ul>
</section>
<?php endif;  ?>

<?php if($books): ?>
<section class="books" id="books">
<h3 class="titleStyle_B2">
	<span class="headingTitle">Books</span>	
	<a class="btn" href="#">
	<img src="<?php echo get_template_directory_uri().'/images/btn/btn_viewall.png'; ?>" alt="View All" height="27">
	</a>
</h3>
<div class='booksArea'>
    <?php echo $books; ?>
</div>
</section>
<?php endif;  ?>

<?php if($conference_paper): ?>
<section class="conference_paper" id="conference_paper">
<h3 class="titleStyle_B2">
	<span class="headingTitle">Conference paper</span>	
	<a class="btn" href="#">
	<img src="<?php echo get_template_directory_uri().'/images/btn/btn_viewall.png'; ?>" alt="View All" height="27">
	</a>
</h3>
<div class='conferenceArea'>
    <?php echo $conference_paper; ?>
</div>

</section>
<?php endif;  ?>


<?php if($upload_video): ?>

<section class="documents" id="videos">
<h3 class="titleStyle_B2">
	<span class="headingTitle">Videos</span>	
	<a class="btn" href="#">
	<img src="<?php echo get_template_directory_uri().'/images/btn/btn_viewall.png'; ?>" alt="View All" height="27">
	</a>
</h3>
<div class='videoArea'>
	<?php	
		$upload_videoExp = explode("</p>", $upload_video);
		$videoCount = count($upload_videoExp);
		for($i=0;$i<$videoCount-1;$i++){	
			
			if($i%2==0): $oddEven = 'iframe_even'; else : $oddEven = 'iframe_odd'; endif;
			
			$upload_videoEach = strip_tags($upload_videoExp[$i]);
			$upload_videoEach = trim($upload_videoEach);
			?>
			<iframe class="iframe_video <?php echo $oddEven; ?>" src="https://www.youtube.com/embed/<?php echo $upload_videoEach; ?>" width="350" height="300" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			
	<?php
	}			
	?>		
</div>
</section>
<?php endif; ?>


<?php if($upload_images): ?>
<section class="documents" id="images">
<h3 class="titleStyle_B2">
	<span class="headingTitle">Images</span>	
	<a class="btn" href="#">
	<img src="<?php echo get_template_directory_uri().'/images/btn/btn_viewall.png'; ?>" alt="View All" height="27">
	</a>
</h3>
<div class='imageArea'>
	<?php
		 echo apply_filters('the_content', $upload_images);
		//echo apply_filters( $tag, $upload_images ); //apply_filters('img_caption_shortcode', '', $attr, $upload_images);
	?>		
</div>
</section>
<?php endif; ?>



<!--<footer>
<a class="linkBltBackToTop" href="<?php //echo home_url(); ?>">Back to Faculty Top</a>
</footer>-->

 

</section>

</div><!--/mainContents-->
<?php endwhile; endif; wp_reset_query(); ?>


<div class="cl"></div>
</div>
</div><!--/mainContainer-->

<?php get_footer(); ?>