<?php


/* Template Name: Profile Template */


get_header();

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['saveMemberProfile']) && $_POST['editMemberProfile'] == "edited" && $_POST['saveMemberProfile'] == "Save" &&  $_POST['saveprofileStatus'] == "profileSaved")
	{
		$allAcademicActivity = $_POST['academicActivity'];
		//print_r($allAcademicActivity);
		echo $seriAcademicActivity = serialize($allAcademicActivity);
		
	}

?>

<script type="text/javascript">

	
</script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-birthday-picker.min.js"></script>
<link href="<?php bloginfo('template_url'); ?>/css/page-style.css" rel="stylesheet" type="text/css">
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
 <?php endwhile; endif; wp_reset_query(); ?>
 <?php if($banner_image): ?>
<h1 id="mainVisual"><span class="bannerPageTitle"><h3><?php echo $postTitle; ?></h3></span><img src="<?php echo $banner_image; ?>" alt="<?php echo $postTitle; ?>" width="739" height="180"></h1>
<?php endif; ?>
<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>



<!-- Side Navigation
========================================================-->
<div id="sideNav">
<?php get_sidebar(); ?>
</div><!--sideNav-->



<!-- Main Contents
========================================================-->
<div id="mainContents">

<section>
<header>
<h2 class="titleStyle_A2">
<?php echo $postTitle; ?>
<a class="btn" href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/btn/btn_contact.png" alt="Contact RIKEN BSI for Careers" height="27"></a>
</h2>
</header>

<section>
<div class="txt">


<?php if(!is_user_logged_in()) { ?>
    <script type="text/javascript">
		var url = "<?php echo home_url( '/' ); ?>";    
		window.location.href = url;	
	</script>                                              
<?php } else { 

$userId = get_current_user_id();
$user_info = get_userdata($userId);

$userRoll = $user_info->roles[0];
if($userRoll == 'faculty_explorer'): ?>
<section class="front_content member_content">
            <div class="container">
                <div class="row">
                    <div class="mem">
                        <!--Member Sidebar-->
                        <div class="col-sm-12 col-md-3 col-lg-3 member_sidebar">
                            <?php get_sidebar('left'); ?>
                        </div>
                        <!--/Member Sidebar-->
                        <!--Member Profile Edit-->
                        <div class="col-sm-12 col-md-9 col-lg-9 member_profile_edit- registration- dashboard">
                            <div class="member_profile_edit registration">                    
    
								<?php if(!$decodedFMID) : echo "<h1>Edit Member Profile</h1>"; else : echo "<h1>Edit Family Member Profile</h1>"; endif; ?>
                            
								<form name="regiForm" action="" method="post" enctype="multipart/form-data" autocomplete="off" onSubmit="return validateMemberEditFormForm()">
                                                             
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="fullname" >Full Name</label>									                                        
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?php echo $fullname; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="achievement" >Achievement</label>									                                        
                                        <input type="text" class="form-control" id="achievement" name="achievement" placeholder="Achievement" value="<?php echo $achievement; ?>">
                                    </div>									                                                                    	
                                </div>      
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="designation" >Designation</label>									                                        
                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo $designation; ?>">
                                    </div>									                                                                    	
                                </div> 
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="phone" >Phone</label>									                                        
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $phone; ?>">
                                    </div>									                                                                    	
                                </div>                                 
                              
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="extension" >Extension</label>									                                        
                                        <input type="text" class="form-control" id="extension" name="extension" placeholder="Extension" value="<?php echo $extension; ?>">
                                    </div>									                                                                    	
                                </div>  
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="fax" >Fax</label>									                                        
                                        <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax" value="<?php echo $fax; ?>">
                                    </div>									                                                                    	
                                </div> 
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="email" >Email <span class="required">*</span></label>									                                        
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email *" value="<?php echo $email; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="extEmail" >Ext. Email</label>									                                        
                                        <input type="text" class="form-control" id="extEmail" name="extEmail" placeholder="Ext. Email" value="<?php echo $extEmail; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="address" >Address</label>									                                        
                                        <input type="text" class="form-control" id="address" name="pri_address" placeholder="Street Address" value="<?php echo $mem_pri_address; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="" >&nbsp;</label>									                                        
                                        <input type="text" class="form-control" id="" name="sec_address" placeholder="Address Line 2" value="<?php echo $mem_sec_address; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="uploadCV" >CV</label>									                                        
                                        <input type="file" class="form-control" id="uploadCV" name="uploadCV" placeholder="Upload CV" value="<?php echo $uploadCV; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                
                                
                            
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="laboratoryUrl" >Laboratory website</label>									                                        
                                        <input type="text" class="form-control" id="laboratoryUrl" name="laboratoryUrl" placeholder="Laboratory website" value="<?php echo $laboratoryUrl; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div id="" class="input-group date dateOfBirth">
                                            <label for="" >Date Of Birth</label>                                            
											<div class="birthday"></div>
											<input class='birthDayHiddenField' name='birth_date' type='hidden'/>											
                                        </div>
                                    </div>                                
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="gender" >Gender</label>
                                        <div class="select_main">
                                            <?php
											$genderList = array(
												"Male"		=> "Male",
												"Female"	=> "Female",
												"Other"		=> "Other"
											);
											?>
                                            <select name="gender" id="gender" class="form-control">
                                                <?php 
												foreach( $genderList as $gKey => $gValue ) {
													$gSelected = ( $gKey == $mem_gender ? 'selected="selected"' : null );
													echo "<option $gSelected value='$gKey'>$gValue</option>";
												}
												?>
                                        	</select>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-lg-12">
                                    <div class="form-group">      
                                        <label for="phone" >ACADEMIC ACTIVITIES <a href="javascript:void(0)" rel="0" class="acAddMore" onclick="addMoreRowsAcAct(this.rel);">Add More</a></label>	
                                    </div>									                                                                    	
                                </div>
								
								<div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="session" >Session</label>					                                        
                                        <input type="text" class="form-control" id="session" name="academicActivity[0][session]" placeholder="Session" value="<?php echo $session; ?>">
                                    </div>									                                                                    	
                                </div>
								<div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="activitiesTitle" >Activities Title</label>									                                        
                                        <input type="text" class="form-control" id="activitiesTitle" name="academicActivity[0][activitiesTitle]" placeholder="Activities Title" value="<?php echo $activitiesTitle; ?>">
                                    </div>									                                                                    	
                                </div>
								<div class="col-lg-12">
                                    <div class="form-group">      
                                        <label for="description" >Description</label>
										<textarea class="form-control textarea" id="description" name="academicActivity[0][description]" placeholder="Description"><?php echo $description; ?></textarea>
										</div>									                                                                    	
                                </div>
                                <div id="addedRowsAcAct"></div>
                                
                                
                                <div class="col-lg-6">
                                    <div class="form-group select_married">
                                        <label for="married" >Married</label>
                                        <div class="select_main">
                                            <?php 
											$maritalStatus = array(
												"no"	=> "No",
												"yes"	=> "Yes"
											);
											?>
                                            <select name="married" id="married" class="form-control">
                                            	<?php
												foreach( $maritalStatus as $msKey => $msValue ) {
													$msSelected = ( $msKey == $mem_mstatus ? 'selected' : null );
													echo "<option value='$msKey' $msSelected>$msValue</option>";
												}
												?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group v_hidden">      
                                        <label for="" >&nbsp;</label>									                                        
                                        <input type="text" class="form-control" id="" name="">
                                    </div>									                                                                    	
                                </div> 
                            
                                                             
                                <div class="if_married_all if_married">    
                                    <div class="col-lg-6">
                                        <div class="form-group">      
                                            <label for="" >Significant Other's Name</label>									                                        
                                            <input type="text" class="form-control" id="" name="SignificantOther_fName" placeholder="First Name" value="<?php echo $mem_other_fname; ?>">
                                        </div>									                                                                    	
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">      
                                            <label for="" >&nbsp;</label>									                                        
                                            <input type="text" class="form-control" id="" name="SignificantOther_lName" placeholder="Last Name" value="<?php echo $mem_other_lname; ?>">
                                        </div>									                                                                    	
                                    </div>    
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">      
                                            <label for="" >Significant Other's ID</label>									                                        
                                            <input type="text" class="form-control" id="" name="SignificantOtherID" value="<?php echo $mem_other_id; ?>">
                                        </div>									                                                                    	
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group v_hidden">      
                                            <label for="" >&nbsp;</label>									                                        
                                            <input type="text" class="form-control" id="" name="">
                                        </div>									                                                                    	
                                    </div>                                                                                             
                                                                  
                                    <div class="col-lg-6">
                                        <div class="form-group-">
                                            <div id="" class="input-group date dateOfBirth">
                                                <label for="" >Date Married</label>  
                                                <!--<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                                                <input type="text" name="married_date" class="form-control datepicker" value="<?php //echo $mem_dom; ?>">												
                                                </div>-->
												<div class="married_date"></div>
												<input class='birthDayHiddenField' name='married_date' type='hidden'/>
                                            </div>
                                        </div>                                
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group v_hidden">      
                                            <label for="" >&nbsp;</label>									                                        
                                            <input type="text" class="form-control" id="" name="">
                                        </div>       	
                                    </div>
								</div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">  
                                            <label for="children" >Number of Children</label>
                                            <div class="input-append spinner" data-trigger="spinner">
                                                <input type="text" name="children" class="form-control" data-rule="quantity" value="<?php echo $mem_children; ?>">
                                                <div class="add-on">
                                                    <a href="javascript:void(0)" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a>
                                                    <a href="javascript:void(0)" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                      
                                    
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group v_hidden">      
                                            <label for="" >&nbsp;</label>									                                        
                                            <input type="text" class="form-control" id="" name="">
                                        </div>									                                                                    	
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">  
                                            <label for="grandchildren" >Number of Grandchildren</label>
                                            <div class="input-append spinner" data-trigger="spinner">
                                                <input type="text" name="grandchildren" class="form-control" data-rule="quantity" value="<?php echo $mem_gchildren; ?>">
                                                <div class="add-on">
                                                    <a href="javascript:void(0)" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a>
                                                    <a href="javascript:void(0)" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group v_hidden">      
                                            <label for="" >&nbsp;</label>									                                        
                                            <input type="text" class="form-control" id="" name="">
                                        </div>       	
                                    </div>  
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">  
                                            <label for="greatgrandchildren" >Number of Great Grandchildren</label>
                                            <div class="input-append spinner" data-trigger="spinner">
                                                <input type="text" name="greatgrandchildren" class="form-control" data-rule="quantity" value="<?php echo $mem_ggchildren; ?>">
                                                <div class="add-on">
                                                    <a href="javascript:void(0)" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a>
                                                    <a href="javascript:void(0)" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group v_hidden">      
                                            <label for="" >&nbsp;</label>									                                        
                                            <input type="text" class="form-control" id="" name="">
                                        </div>      	
                                    </div>
                                                               
                                
                                <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="occupation" >Occupation</label>									                                        
                                        <input type="text" class="form-control" id="" name="occupation" value="<?php echo $mem_prof; ?>">
                                    </div>									                                                                    	
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group v_hidden">      
                                        <label for="" >&nbsp;</label>									                                        
                                        <input type="text" class="form-control" id="" name="">
                                    </div>									                                                                    	
                                </div>
                                
                              <div class="col-lg-6">
                                    <div class="form-group">      
                                        <label for="password" >Create a password</label>									                                        
                                        <input type="password" class="form-control" id="password" name="password" value="">
                                    </div>									                                                                    	
                                </div>
                                
                               
                                
                                <div class="col-lg-6">
	                                <div class="form-group">      
    	                            	<label for="confirm_password" >Confirm your password <span class="required">*</span> <span id="pwd2" class="error"></span></label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $_POST['confirm_password']; ?>">
                                    </div>     	
                                </div>
                                
								<div class="col-lg-6">
	                                <div class="form-group">  
									
									
									
									<label for="advisor" >Advisor <span id="advisorMes" class="error"></span><span id="testAdvisor" class="error"></span></label>									                                        
									<input type="text" class="form-control" id="advisor" name="advisor" value="<?php echo $mem_advisor; ?>">  		                              		
									  
                                  
                                    </div>
                                    									                                                                    	
                                </div> 
                                
                                <div class="col-lg-6">
                                    <div class="form-group v_hidden">      
                                        <label for="" >&nbsp;</label>									                                        
                                        <input type="text" class="form-control" id="" name="">
                                    </div>									                                                                    	
                                </div>                                
                                
                                <div class="col-lg-6">
                                    <div class="form-group- radio_select">      
                                        <label for="veteran" >Are You A Veteran ?</label>									                                        
                                        <?php 
										$vetStatus = array(
											"yes"	=> "Yes",
											"no"	=> "No"
										);
										foreach( $vetStatus as $vsKey => $vsValue ) {
											$radioChecked = ( $vsKey == $veteran_status ? 'checked' : null );
											echo "<label><input type='radio' name='optionsRadios' value='$vsKey' $radioChecked>$vsValue</label>";
										}
										?>
                                        
                                    </div>									                                                                    	
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group v_hidden">      
                                        <label for="" >&nbsp;</label>									                                        
                                        <input type="text" class="form-control" id="" name="">
                                    </div>									                                                                    	
                                </div> 
                                <?php $veteranSelectYes = ( $veteran_status == 'yes' ? 'block' : 'none' ); ?>
                                <div class="veteranIfYes" style="display:<?php echo $veteranSelectYes; ?>" >    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" >Branch of Service <?php echo $veteranSelectYes; ?></label>
                                            <div class="select_main">                                        
                                                <?php
												$branchList = array(
													"US-AirForce"		=>	"United States Air Force",
													"US-Army"			=>	"United States Army",
													"US-Navy"			=>	"United States Navy",
													"US-Marines"		=>	"United States Marines",
													"US-CoastGuard"		=>	"United States Coast Guard",
													"GuardORReserve"	=>	"Guard or Reserve"
												);
												?>
                                                <select name="branch" id="branch" class="form-control">
                                                    <option value="">Select one</option>
                                                    <?php
													foreach($branchList as $bkey => $bvalue) {
														$bmarked = ( $bkey == $serviceBranch ? 'selected="selected"' : null );	
														echo "<option value='$bkey' $bmarked>$bvalue</option>";
													}
													?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group v_hidden">      
                                            <label for="" >&nbsp;</label>									                                        
                                            <input type="text" class="form-control" id="" name="">
                                        </div>									                                                                    	
                                    </div>                                                                 
                                
                                </div>  
                                <div class="col-lg-6">                              
                                    <button type="submit" value="Save" name="saveMemberProfile" class="regi_button edit_button"><?php if(!$decodedFMID) : echo "Save Member Profile"; else : echo "Save Family Member"; endif; ?></button>                               
									<input type="hidden" value="edited" name="editMemberProfile">
                                    <input type="hidden" value="<?php  echo rtrim(strtr(base64_encode($userId), '+/', '-_'), '='); ?>" name="accessId">
                                    <input type="hidden" value="profileSaved" name="saveprofileStatus">                          
                                </div>
                            
                            </form>   
                            </div>                     
        
                        </div>
                        <!--/Member Profile Edit-->                    
					</div>
                </div>
             </div>
        </section>

<?php
elseif($userRoll == 'faculty_student'):
	echo 'Your a faculty Student';
else :
	echo 'Your a Admin';
endif;
?>
		
<?php } ?>

</div>
</section>



</section>

</div><!--/mainContents-->
<div class="cl"></div>

</div>
</div><!--/mainContainer-->
<!-- InstanceEndEditable -->


<script type="text/javascript">
$(".birthday").birthdayPicker({"defaultDate":"<?php echo $mem_dob; ?>"});

//var rowCount = 1;
function addMoreRowsAcAct(ICRI) {
	var rowCount = parseInt(ICRI)+1;

var moreAcactRow = '<span id="removeRowAcAct'+rowCount+'">'+'<div class="col-lg-6">'+
		'<div class="form-group">'+      
			'<label for="session" >Session</label>'+									                                        
			'<input type="text" class="form-control" id="session" name="academicActivity['+rowCount+'][session]" placeholder="Session" value="">'+
		'</div>'+				                                                                    	
	'</div>'+
	'<div class="col-lg-6">'+
		'<div class="form-group">'+      
			'<label for="activitiesTitle" >Activities Title <a class="removeRowAcActBtn" href="javascript:void(0);" onclick="removeRowAcAct('+rowCount+');">x</a></label>'+									                                        
			'<input type="text" class="form-control" id="activitiesTitle" name="academicActivity['+rowCount+'][activitiesTitle]" placeholder="Activities Title" value="">'+
		'</div>'+									                                                                    	
	'</div>'+
	'<div class="col-lg-12">'+
		'<div class="form-group">'+      
			'<label for="description" >Description</label>'+
			'<textarea class="form-control textarea" id="description" name="academicActivity['+rowCount+'][description]" placeholder="Description"></textarea>'+
			'</div>'+									                                                                    	
	'</div></span>';
//var recRow = '<p id="removeRowAcAct'+rowCount+'"><tr><td><input name="" type="text" size="17%"  maxlength="120" /></td><td><input name="" type="text"  maxlength="120" style="margin: 4px 5px 0 5px;"/></td><td><input name="" type="text" maxlength="120" style="margin: 4px 10px 0 0px;"/></td></tr> <a href="javascript:void(0);" onclick="removeRowAcAct('+rowCount+');">Delete</a></p>';
$('.acAddMore').attr('rel', rowCount);
$('#addedRowsAcAct').append(moreAcactRow);

}

function removeRowAcAct(removeNum) {
	$('#removeRowAcAct'+removeNum).remove();
}
</script>


<?php get_footer(); ?>