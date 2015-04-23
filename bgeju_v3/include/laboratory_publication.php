<div class="laboratory_publication"><?php $laboratory_publication = get_post_meta( $post->ID, 'laboratory_publication', true ); if($laboratory_publication): ?>
 <p align="justify"> 		<?php echo apply_filters('the_content', $laboratory_publication); ?> 
	
 </p>                           <?php endif; ?>
</div>