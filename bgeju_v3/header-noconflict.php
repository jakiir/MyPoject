<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
	<title><?php bloginfo('name'); wp_title('|',true,''); ?></title>
	

<link href="<?php bloginfo('template_url'); ?>/css/import.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/import.css" rel="stylesheet" type="text/css">

<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.js"></script>




<!--<script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/js/header_navi.js"></script>-->

<script type="text/javascript">
//<![CDATA[
//langAlt = '';
//]]>

var homeUrl = '<?php echo home_url(); ?>';
var adminUrl = '<?php echo admin_url(); ?>';
</script>


</head>
<body <?php body_class(); ?>> 
<div class="wrapper">
<div class="wrapperInner">


<!-- Header
========================================================-->

<!--<p class="message txt">We would like to respectfully express our sympathy toward the victims ofthe Great East Japan Earthquake.</p>-->
<header id="pagetop">
<div class="block01">
	<div class="left">
		<h1>
			<a href="http://www.juniv.edu/"><img class="ju-logo" src="<?php bloginfo('template_url'); ?>/images/logo/julogo.png" alt="Jahangirnagar University" width="79" height="92">
			
<div class="site-logo">
  <img class="ju-logo" src="<?php bloginfo('template_url'); ?>/images/logo/biotech_title.png" alt="BGE Logo" width="476" height="79">
</div>
			
			
			
			
			</a>
		</h1>
	</div>
	<div class="right">
           <img class="ju-logo" src="<?php bloginfo('template_url'); ?>/images/logo/juTitle.png" alt="Jahangirnagar University" width="311" height="58">
	</div>
</div>

<div class="book02">

<nav class="sub">
	<ul>
	<li style="margin-right:5px">
		<span class="searchingBox">
		<div id="cseSearchForm">
			<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
				<input type="search" class="search-field" value="Search" onfocus="if($(this).val() == 'Search') { $(this).val(''); }" onblur="if($(this).val().replace('', '') == '') { $(this).val('Search'); }" name="s" title="Search for:">	
				<input type="submit" class="search-submit screen-reader-text" value="Search">
			</form>
		</div>								
		</span>
	</li>
        <li class="gmaillink">
		<a href="https://accounts.google.com/" target="_blank">gmail</a>
	</li>
	<li class="googleCalendar">
		<a href="https://www.google.com/calendar/" target="_blank">google</a>
	</li>

	
	</ul>
</nav>

</div>

<nav class="main">

<?php
$defaults = array(
	'theme_location'  => 'main_menu',
	'menu'            => '',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => 'topCategories main_menu',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '<span class="naviBtn">',
	'after'           => '</span>',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'            => new bgeju_custom_Walker()
);

wp_nav_menu( $defaults );

?>

<div class="cl"></div>
	<!--<ul class="topCategories">


	<li class="nondropdown current" id="gnav00">
		<span class="naviBtn">
			<a href="index.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_home_current.png" alt="Home"></a>
		</span>
	</li>

	<li class="dropdown" id="gnav01">
		<span class="naviBtn">
			<a href="about/index.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_about.png" alt="About"></a>
		</span>
		<div class="rolloverMenu" style="display:none;">
		<div class="rolloverMenuInner">
			<ul>
			<li><a href="about/index.html">About RIKEN BSI</a></li>
			<li><a href="about/fact.html">Fact</a></li>
			<li><a href="about/public.html">Public</a></li>
			<li class="blank"><a href="http://www.riken.jp/en/" target="_blank">RIKEN top</a></li>
			</ul>
		</div>
		</div>
	</li>

	<li class="dropdown" id="gnav02">
		<span class="naviBtn">
			<a href="faculty/index.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_faculty.png" alt="Faculty"></a>
		</span>
		<div class="rolloverMenu" style="display:none;">
		<div class="rolloverMenuInner">
			<ul>
			<li><a href="faculty/index.html">Faculty Finder</a></li>
			<li><a href="faculty/faculty_explorer/index.html">Faculty Explorer</a></li>
			<li><a href="faculty/faculty_explorer/faculty_groups/4.html">Research Resources Center</a></li>
			<li><a href="faculty/faculty_explorer/faculty_groups/5.html">Neuroinformatics Japan Center</a></li>
			<li><a href="researchers/index.html">Researchers</a></li>
			</ul>
		</div>
		</div>
	</li>

	<li class="dropdown" id="gnav03">
		<span class="naviBtn">
			<a href="partners/other.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_partners.png" alt="Partners"></a>
		</span>
		<div class="rolloverMenu" style="display:none;">
		<div class="rolloverMenuInner">
			<ul>
			<li><a href="faculty/details/61.html">RIKEN BSI-OLYMPUS Collaboration Center</a></li>
			<li><a href="faculty/details/62.html">RIKEN BSI-TOYOTA Collaboration Center</a></li>
			<li><a href="faculty/details/75.html">RIKEN BSI-Takeda Collaboration Center</a></li>
			<li class="blank"><a href="../first-okano/en/index.html" target="_blank">FIRST program</a></li>
			<li class="blank"><a href="../shogi-project/index.html" target="_blank">Shogi Project</a></li>
			<li><a href="partners/other.html">Other institute and universities</a></li>
			</ul>
		</div>
		</div>
	</li>

	<li class="dropdown " id="gnav04">
		<span class="naviBtn">
			<a href="media/index.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_news.png" alt="News &amp; Media"></a>
		</span>
		<div class="rolloverMenu" style="display:none;">
		<div class="rolloverMenuInner">
			<ul>
			<li><a href="media/index.html">Press Releases</a></li>
			<li><a href="interviews/index.html">BSI Interviews</a></li>
			<li><a href="videos/index.html">Videos</a></li>
			<li><a href="news/index.html">News</a></li>
			<li><a href="news/news_categories/1.html">Media Coverage</a></li>
			<li><a href="news/news_categories/2.html">Awards</a></li>
			</ul>
		</div>
		</div>
	</li>

	<li class="dropdown" id="gnav05">
		<span class="naviBtn">
			<a href="events/index.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_events.png" alt="Events"></a>
		</span>
		<div class="rolloverMenu" style="display:none;">
		<div class="rolloverMenuInner">
			<ul>
			<li><a href="events/index.html">Event Calendar</a></li>
			<li><a href="event/list.html">Event List</a></li>
			</ul>
		</div>
		</div>
	</li>

	<li class="dropdown" id="gnav06">
		<span class="naviBtn">
			<a href="letters/index.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_learning.png" alt="Learning"></a>
		</span>
		<div class="rolloverMenu" style="display:none;">
		<div class="rolloverMenuInner">
			<ul>
			<li><a href="summer/index.html">BSI Summer Program</a></li>
			<li class="blank"><a href="learning/TP/index.html" target="_blank">Brain Science Training Program</a></li>
			<li><a href="learning/BSS/index.html">BSI Seminar Series</a></li>
			<li class="blank"><a href="http://common.intra.riken.jp/gro/en/researcher-support/helpdesk.html#japaneseclass" target="_blank">Japanese Language Courses</a></li>
			<li><a href="letters/index.html">Letters</a></li>
			</ul>
		</div>
		</div>
	</li>

	<li class="dropdown" id="gnav07">
		<span class="naviBtn">
			<a href="careers/index.html"><img src="<?php bloginfo('template_url'); ?>/images/en/gnav_careers.png" alt="Careers"></a>
		</span>
		<div class="rolloverMenu" style="display:none;">
		<div class="rolloverMenuInner">
			<ul>
			<li><a href="careers/index.html">Careers</a></li>
			<li><a href="careers/students.html">Students</a></li>
			<li><a href="wiss/index.html">Preparing for RIKEN</a></li>
			<li class="blank"><a href="http://bsipdfa.brain.riken.jp/" target="_blank">RIKEN BSI Postdoctoral Fellow Association (PDFA)</a></li>
			</ul>
		</div>
		</div>
	</li>

		<li id="gnav08" class="searchBox">
		<div id="cse-search-form" style="width: 100%;">&nbsp;</div>
				<script src="http://www.google.com/jsapi" type="text/javascript"></script>
				<script type="text/javascript"> 
		google.load('search', '1', {language : 'en'});
		google.setOnLoadCallback(function() {
		var customSearchControl = new google.search.CustomSearchControl(
		  '010642942900311527294:1erbjgz5g4m');
		
		customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
		var options = new google.search.DrawOptions();
		options.enableSearchboxOnly("search/index.html");
		customSearchControl.draw('cse-search-form', options);
		}, true);
		</script>
	</li>
		</ul>
<div class="cl"></div>-->
</nav>
</header>