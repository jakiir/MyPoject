<?php


/* Template Name: Contact Page */


get_header();


?>
<link href="<?php bloginfo('template_url'); ?>/css/contact-style.css" rel="stylesheet" type="text/css">

<?php
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && $_POST['MessageBody'] != "" &&  $_POST['EmailAddress2'] != "")
    {
		echo 'Mail send';
		      $familyName = $_POST['FamilyName'];
			  $firstName = $_POST['FirstName'];
			  $affiliation = $_POST['Affiliation'];
			  $position = $_POST['Position'];
			  $emailAddress2 = $_POST['EmailAddress2'];
			  $messageBody = $_POST['MessageBody'];
			  
			  $mailBodyy = '<div>First Name : '.$firstName.'</div><div>Affiliation :'.$affiliation.'</div><div>Position :'.$position.'</div><div> Email Address :'.$emailAddress2.'</div><div>Message Body :'.$messageBody.'</div>';
				
				$e_head_logo   = get_template_directory_uri().'/images/emailIcon/e_head_logo.png'; 
				$e_footer_logo   = get_template_directory_uri().'/images/emailIcon/e_footer_logo.png';
				$fbconLogo = get_template_directory_uri().'/images/emailIcon/fb.png';
				$twconLogo = get_template_directory_uri().'/images/emailIcon/tw.png';
				$liconLogo = get_template_directory_uri().'/images/emailIcon/li.png';
				$imgDesc  = 'One legacy Advisors Main logo'; 
				$imgTitle = 'One legacy Advisors Logo'; 
				$footerCenterText = 'Department of Biotechnology and Genetic Engineering, Jahangirnagar University';

				
				
				
				$emailSubject = 'Contact from Department of Biotechnology and Genetic Engineering, Jahangirnagar University';
				
				$emailCc = '';
				
				$emailBcc = '';
				
				
					$homeUrl = home_url('/');
					$to				= 'jakir44.du@gmail.com';
					$subject		= $emailSubject;
					$message		= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Biotechnology and Genetic Engineering Member Registration</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;font-family:Open Sans, sans-serif;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td><table align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">		
		<tr>
          <td colspan="3" bgcolor="#D8D8D8" style="padding: 20px 20px 0 20px;"><table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr bgcolor="#d5c48f" style="display:block;">
                <td align="left" colspan="2" style="padding-left:15px;"><img src="'.$e_head_logo.'" alt="Biotechnology and Genetic Engineering" title="Biotechnology and Genetic Engineering" /></td>              
              </tr>
            </table></td>
        </tr>		
        <tr>
          <td colspan="3" bgcolor="#D8D8D8" style="padding: 0 20px;"><table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr bgcolor="#fff">
                <td style="padding: 10px 10px 10px 20px; background: #ffffff;">
				<p style="margin-bottom:15px;font-size:14px;line-height:21px;">Hi '.$familyName.',</p>
				<p style="margin-bottom:15px;font-size:14px;line-height:21px;text-align:left">'.$mailBodyy.'</p>
				<p><span style="margin-bottom:15px;font-size:14px;line-height:21px;">For more information please visit :</span>'.$homeUrl.'</p></td>
              </tr>
            </table></td>
        </tr>
		<tr>
          <td colspan="3" bgcolor="#D8D8D8" style="padding: 0 20px;"><table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr bgcolor="#A68E31" style="padding:20px;display:block;">
                <td width="25%" align="left"><img src="'.$e_footer_logo.'" title="" alt=""/></td>
              <td width="55%" align="center" style="color: #fff; text-align:left;">'.$footerCenterText.'</td>
			  
                <td align="left" width="20%"><a style="width:22px;height:22px; float:left;display: inline-block;margin-right:6px;" href="#"  class="facebook"><img src="'.$fbconLogo.'" alt="facebook" title="facebook" style="border: 0;" /></a>&nbsp;&nbsp;<a style="width:22px;height:22px;float:left;display: inline-block;margin-right:6px;" href="#" class="twitter"><img src="'.$twconLogo.'" alt="twitter" title="twitter" style="border: 0;"  /></a>&nbsp;&nbsp;<a style="width:22px;height:22px;float:left;display: inline-block;" href="#"  class="in"><img src="'.$liconLogo.'" alt="linkedin" title="linkedin" style="border: 0;" /></a></td>
              </tr>
            </table></td>
        </tr>		
        <tr>
          <td colspan="2" bgcolor="#D8D8D8" style="padding: 30px 30px 30px 30px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
              <td width="100%" align="center" style="color: #ababab;">Biotechnology and Genetic Engineering - 2200 Dickinson Rd, Unit 4A, De Pere, WI  54115<br />P: 877-389-0915</td>
			</tr> 			           
            </table></td>
        </tr>		
      </table></td>
  </tr>
</table>
</body>
</html>';
					$headers		= 'MIME-Version: 1.0' . "\r\n";
					$headers	   .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers	   .= 'From: Biotechnology and Genetic Engineering <rkarimcu@bjeju.edu.bd>' . "\r\n";					
					$headers .= 'Cc: '. $emailCc . "\r\n";
					$headers .= 'Bcc:'. $emailBcc . "\r\n";					
					$goMail	  = wp_mail( $to, $subject, $message, $headers );
	}
?>

<!-- InstanceBeginEditable name="Main Container" -->
<!-- Main Container
========================================================-->
<div id="mainContainer">
<div id="access">



<?php
if (have_posts()) : while (have_posts()) : the_post();
	$postId = $post->ID;
	$banner_image = get_field('banner_image');
	$postTitle = $post->post_title;
?>

<?php if($banner_image): ?>
<h1 id="mainVisual"><span class="bannerPageTitle"><h3><?php echo $postTitle; ?></h3></span><img src="<?php echo $banner_image; ?>" alt="Contact" width="739" height="180"></h1>
<?php endif; ?>
<?php endwhile; endif; wp_reset_query(); ?>
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>



<!-- Side Navigation
========================================================-->
<!--sideNav-->



<!-- Main Contents
========================================================-->
<div id="mainContents2">

<header>
<h2 class="titleStyle_A1"><img src="<?php bloginfo('template_url'); ?>/images/title/title_contact.png" alt="Contact Form" width="400" height="19"></h2>
</header>

<div class="txt">
<p><a class="linkBltOpenWin" href="http://www.brain.riken.jp/en/privacy_policy/" target="_blank">View Privacy Policy</a></p>
</div>
<form name="thisForm" id="thisForm" method="post" accept-charset="utf-8" onsubmit="return _CF_checkthisForm(this)">
<p class="require">Required Fields</p>
<table class="contactForm">
<tbody>

<!--<tr>
<th><span class="require">Subject</span></th>
<td class="input_subject">
<input name="ContactSubject" id="ContactSubject" type="radio" value="outreach"> Public Relations<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="career"> Recruiting<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="certification"> Certification<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="summer"> Summer Program<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="tp"> Brain Science Training Program<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="students"> Programs for Students<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="collab"> Collaboration, Material Transfer Agreement<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="seminar"> Seminar<br>
<input name="ContactSubject" id="ContactSubject" type="radio" value="other"> Other<br>
</td>
</tr>-->
<tr>
<th><span class="require">Family Name</span></th>
<td>
<input name="FamilyName" id="FamilyName" type="text" maxlength="100" class="input00">　(Your Name)
</td>
</tr>
<tr>
<th><span class="require">First Name</span></th>
<td>
<input name="FirstName" id="FirstName" type="text" maxlength="100" class="input00">　(First Name)
</td>
</tr>
<tr>
<th><span>Organizational Affiliation</span></th>
<td>
<input name="Affiliation" id="Affiliation" type="text" maxlength="255" class="input01">　(Organizational Affiliation)
</td>
</tr>
<tr>
<th><span>Occupation / Position</span></th>
<td>
<input name="Position" id="Position" type="text" maxlength="100" class="input01">　(Researcher)
</td>
</tr>
<tr>
<th><span class="require">Email Address</span></th>
<td>
<input name="EmailAddress" id="EmailAddress" type="text" maxlength="100" class="input01"> 
　(rkarimcu@bjeju.edu.bd)<br>
<br>
<br>

<div class="txt">
<p>Retype Email Address</p>
</div>
<input name="EmailAddress2" id="EmailAddress2" type="text" maxlength="100" class="input01">
　(rkarimcu@bjeju.edu.bd)
</td>
</tr>
<tr>
<th><span class="require">Message</span></th>
<td><div class="txt">
<p>* Please provide your contact details so we can respond as accurately as possible.</p>
<p>* Not to exceed 3000 characters, including spaces.</p>
</div>
<textarea name="MessageBody" id="MessageBody" class="textarea00"></textarea>
</td>
</tr>
<tr class="last">
<th>
</th>
<td>
<input name="ChkForm1" id="ChkForm1" type="hidden" value="Y"> <input name="BtnConfirm" id="BtnConfirm" type="image" alt="Confirm" src="<?php bloginfo('template_url'); ?>/images/btn/btn_inquiry.png"></td>
</tr>
</tbody></table>
</form>




</div><!--/mainContents-->



<div class="cl"></div>
</div>
</div><!--/mainContainer-->
<!-- InstanceEndEditable -->


<?php get_footer(); ?>