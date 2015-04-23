<?php
if ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
}

add_action( 'cmb2_init', 'bgeju_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function bgeju_register_metabox() {

	// Start with an underscore to hide fields from custom fields list

	$prefix = '_bge_';
    
	$bgeju = bge_bgeju_box( array(
		'id'            => $prefix . 'bgeju_laboratory',
		'title'         => __( 'Faculty Members',"bgeju" ),
		'object_types'  => array( 'laboratory', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	$group_faculty_members = $bgeju->add_field( array(
	    'id'          => $prefix . 'repeat_group_faculty_members',
	    'type'        => 'group',
	    'description' => __( 'Generates reusable form entries for Faculty Members', 'BGEJU' ),
	    'options'     => array(
	        'group_title'   => __( 'Faculty Members{#}', 'BGEJU' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Faculty Members', 'BGEJU' ),
	        'remove_button' => __( 'Remove Faculty Members', 'BGEJU' ),
	        'sortable'      => true, // beta
	    ),
	) );
		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$bgeju->add_group_field( $group_faculty_members, array(
		    'name' => 'Faculty Members Name',
		    'id'   => 'faculty_members_name',
		    'type' => 'text_medium',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$bgeju->add_group_field( $group_faculty_members, array(
		    'name' => 'Faculty Members URL',
		    'description' => 'insert Faculty Members URL',
		    'id'   => 'faculty_members_url',
		    'type' => 'text_medium',
		) );
		
		// Post Doc Researcher
		
		$group_post_doc_researcher = $bgeju->add_field( array(
	    'id'          => $prefix . 'repeat_group_researcher',
	    'type'        => 'group',
	    'description' => __( 'Generates reusable form entries for Post Doc. Researcher', 'BGEJU' ),
	    'options'     => array(
	        'group_title'   => __( 'Post Doc. Researcher {#}', 'BGEJU' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Post Doc. Researcher', 'BGEJU' ),
	        'remove_button' => __( 'Remove Post Doc. Researcher', 'BGEJU' ),
	        'sortable'      => true, // beta
	    ),
	) );
		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$bgeju->add_group_field( $group_post_doc_researcher, array(
		    'name' => 'Post Doc. Researcher Name',
		    'id'   => 'post_doc_researcher_name',
		    'type' => 'text_medium',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$bgeju->add_group_field( $group_post_doc_researcher, array(
		    'name' => 'Post Doc. Researcher URL',
		    'description' => 'insert Post Doc. Researcher URL',
		    'id'   => 'post_doc_researcher_url',
		    'type' => 'text_medium',
		) );
		
		// PhD. Students
		
		$group_phd_students = $bgeju->add_field( array(
	    'id'          => $prefix . 'repeat_group_phd_students',
	    'type'        => 'group',
	    'description' => __( 'Generates reusable form entries for PhD. Students', 'BGEJU' ),
	    'options'     => array(
	        'group_title'   => __( 'PhD. Students {#}', 'BGEJU' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another PhD. Students', 'BGEJU' ),
	        'remove_button' => __( 'Remove PhD. Students', 'BGEJU' ),
	        'sortable'      => true, // beta
	    ),
	) );
		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$bgeju->add_group_field( $group_phd_students, array(
		    'name' => 'PhD. Students Name',
		    'id'   => 'phd_students_name',
			'description' => 'insert PhD. Students Name',
		    'type' => 'text_medium',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$bgeju->add_group_field( $group_phd_students, array(
		    'name' => 'PhD. Students URL',
		    'description' => 'insert PhD. Students URL',
		    'id'   => 'phd_students_url',
		    'type' => 'text_medium',
		) );
		
		// M Phil. Students
		
		$group_mphil_students = $bgeju->add_field( array(
	    'id'          => $prefix . 'repeat_group_mphil_students',
	    'type'        => 'group',
	    'description' => __( 'Generates reusable form entries for M Phil. Students', 'BGEJU' ),
	    'options'     => array(
	        'group_title'   => __( 'M Phil. Students {#}', 'BGEJU' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another M Phil. Students', 'BGEJU' ),
	        'remove_button' => __( 'Remove M Phil. Students', 'BGEJU' ),
	        'sortable'      => true, // beta
	    ),
	) );
		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$bgeju->add_group_field( $group_mphil_students, array(
		    'name' => 'PhD. Students Name',
		    'id'   => 'mphil_students_name',
			'description' => 'insert M Phil. Students Name',
		    'type' => 'text_medium',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$bgeju->add_group_field( $group_mphil_students, array(
		    'name' => 'PhD. Students URL',
		    'description' => 'insert M Phil. Students URL',
		    'id'   => 'mphil_students_url',
		    'type' => 'text_medium',
		) );
		
		// Masters Students
		
		$group_masters_students = $bgeju->add_field( array(
	    'id'          => $prefix . 'repeat_group_masters_students',
	    'type'        => 'group',
	    'description' => __( 'Generates reusable form entries for Masters Students', 'BGEJU' ),
	    'options'     => array(
	        'group_title'   => __( 'Masters Students {#}', 'BGEJU' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Masters Students', 'BGEJU' ),
	        'remove_button' => __( 'Remove Masters Students', 'BGEJU' ),
	        'sortable'      => true, // beta
	    ),
	) );
		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$bgeju->add_group_field( $group_masters_students, array(
		    'name' => 'PhD. Students Name',
		    'id'   => 'masters_students_name',
			'description' => 'insert Masters Students Name',
		    'type' => 'text_medium',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$bgeju->add_group_field( $group_masters_students, array(
		    'name' => 'PhD. Students URL',
		    'description' => 'insert Masters Students URL',
		    'id'   => 'masters_students_url',
		    'type' => 'text_medium',
		) );
		
		// Under Graduate Students
		
		$group_under_graduate_students = $bgeju->add_field( array(
	    'id'          => $prefix . 'repeat_group_under_graduate_students',
	    'type'        => 'group',
	    'description' => __( 'Generates reusable form entries for Under Graduate Students', 'BGEJU' ),
	    'options'     => array(
	        'group_title'   => __( 'Under Graduate Students {#}', 'BGEJU' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Under Graduate Students', 'BGEJU' ),
	        'remove_button' => __( 'Remove Under Graduate Students', 'BGEJU' ),
	        'sortable'      => true, // beta
	    ),
	) );
		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$bgeju->add_group_field( $group_under_graduate_students, array(
		    'name' => 'PhD. Students Name',
		    'id'   => 'under_graduate_students_name',
			'description' => 'insert Under Graduate Students Name',
		    'type' => 'text_medium',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$bgeju->add_group_field( $group_under_graduate_students, array(
		    'name' => 'PhD. Students URL',
		    'description' => 'insert Under Graduate Students URL',
		    'id'   => 'under_graduate_students_url',
		    'type' => 'text_medium',
		) );
		
		// Guest Researcher
		
		$group_guest_researcher = $bgeju->add_field( array(
	    'id'          => $prefix . 'repeat_group_guest_researcher',
	    'type'        => 'group',
	    'description' => __( 'Generates reusable form entries for Guest Researcher', 'BGEJU' ),
	    'options'     => array(
	        'group_title'   => __( 'Guest Researcher {#}', 'BGEJU' ), // since version 1.1.4, {#} gets replaced by row number
	        'add_button'    => __( 'Add Another Guest Researcher', 'BGEJU' ),
	        'remove_button' => __( 'Remove Guest Researcher', 'BGEJU' ),
	        'sortable'      => true, // beta
	    ),
	) );
		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$bgeju->add_group_field( $group_guest_researcher, array(
		    'name' => 'PhD. Students Name',
		    'id'   => 'guest_researcher_name',
			'description' => 'insert Guest Researcher Name',
		    'type' => 'text_medium',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );
		$bgeju->add_group_field( $group_guest_researcher, array(
		    'name' => 'PhD. Students URL',
		    'description' => 'insert Guest Researcher URL',
		    'id'   => 'guest_researcher_url',
		    'type' => 'text_medium',
		) );
		
}
	