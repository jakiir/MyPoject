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
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/utility.js"></script>



<!--<script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/js/header_navi.js"></script>-->

<script type="text/javascript">
//<![CDATA[
//langAlt = '';
//]]>

var homeUrl = '<?php echo home_url(); ?>';
var adminUrl = '<?php echo admin_url(); ?>';
</script>
<style>
.site-logo {
  width: 489px;
  height: auto;
  display: inline-block;
  font-size: 14px;
  line-height: 35px;
  padding-left: 15px;
  font-weight: 500;
}
.ju-logo{
  float: left;
  display: inline-block;
}
</style>

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
                       
</header>