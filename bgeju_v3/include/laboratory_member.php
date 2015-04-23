<div>
   <div class="sideHead2">Faculty Members</div>
   <div  class="link54">    
   		<?php $faculty_members = get_post_meta( $post->ID, '_bge_repeat_group_faculty_members', true ); if($faculty_members): ?>		<ul class="faculty_members">		<?php foreach($faculty_members as $faculty_member): ?>			<li><a href="<?php echo $faculty_member['faculty_members_url']; ?>" target="_blank"><?php echo $faculty_member['faculty_members_name']; ?></a></li>		<?php endforeach; endif; ?>		</ul>
       
        <!--There will be Faculty Members name-->
   </div>

</div>

<div>
   <div class="sideHead2">Post Doc. Researcher</div>
   <div class="link54">   
   		<?php $researchers = get_post_meta( $post->ID, '_bge_repeat_group_researcher', true ); if($researchers): ?>		<ul class="researcher_url">		<?php foreach($researchers as $researcher): ?>			<li><a href="<?php echo $researcher['post_doc_researcher_url']; ?>" target="_blank"><?php echo $researcher['post_doc_researcher_name']; ?></a></li>		<?php endforeach; endif; ?>		</ul>
   </div>

</div>

<div>
   <div class="sideHead2">PhD. Students</div>
   <div class="link54">      		<?php $phd_students = get_post_meta( $post->ID, '_bge_repeat_group_phd_students', true ); if($phd_students): ?>		<ul class="phd_students">		<?php foreach($phd_students as $phd_student): ?>			<li><a href="<?php echo $phd_student['phd_students_url']; ?>" target="_blank"><?php echo $phd_student['phd_students_name']; ?></a></li>		<?php endforeach; endif; ?>		</ul>   </div>

</div>

<div>
   <div class="sideHead2">M Phil. Students</div>
   <div class="link54">      		<?php $mphil_students = get_post_meta( $post->ID, '_bge_repeat_group_mphil_students', true ); if($mphil_students): ?>		<ul class="mphil_students">		<?php foreach($mphil_students as $mphil_student): ?>			<li><a href="<?php echo $mphil_student['mphil_students_url']; ?>" target="_blank"><?php echo $mphil_student['mphil_students_name']; ?></a></li>		<?php endforeach; endif; ?>		</ul>   </div>

</div>

<div>
   <div class="sideHead2">Masters Students</div>
   <div class="link54">      		<?php $masters_students = get_post_meta( $post->ID, '_bge_repeat_group_masters_students', true ); if($masters_students): ?>		<ul class="masters_students">		<?php foreach($masters_students as $masters_student): ?>			<li><a href="<?php echo $masters_student['masters_students_url']; ?>" target="_blank"><?php echo $masters_student['masters_students_name']; ?></a></li>		<?php endforeach; endif; ?>		</ul>   </div>

</div>

<div>
   <div class="sideHead2">Under Graduate Students</div>
   <div class="link54">      		<?php $under_graduate_students = get_post_meta( $post->ID, '_bge_repeat_group_under_graduate_students', true ); if($under_graduate_students): ?>		<ul class="under_graduate_students">		<?php foreach($under_graduate_students as $under_graduate_student): ?>			<li><a href="<?php echo $under_graduate_student['under_graduate_students_url']; ?>" target="_blank"><?php echo $under_graduate_student['under_graduate_students_name']; ?></a></li>		<?php endforeach; endif; ?>		</ul>   </div>

</div>

<div>
   <div class="sideHead2">Guest Researcher</div>
   <div class="link54">      		<?php $guest_researchers = get_post_meta( $post->ID, '_bge_repeat_group_guest_researcher', true ); if($guest_researchers): ?>		<ul class="guest_researchers">		<?php foreach($guest_researchers as $guest_researcher): ?>			<li><a href="<?php echo $guest_researcher['guest_researcher_url']; ?>" target="_blank"><?php echo $guest_researcher['guest_researcher_name']; ?></a></li>		<?php endforeach; endif; ?>		</ul>   </div>

</div>








