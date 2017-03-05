<?php



if ( file_exists( get_template_directory() . '/framework/metaboxes/init.php' ) ) {

	require_once  get_template_directory() . '/framework/metaboxes/init.php';

} elseif ( file_exists(  get_template_directory() . '/framework/metaboxes/includes/CMB2.php' ) ) {

	require_once  get_template_directory() . '/framework/metaboxes/includes/CMB2.php';

}



add_action( 'cmb2_admin_init', 'post_metabox' );



function post_metabox() {

	$prefix = '_cmb_';

	$cmb_demo = new_cmb2_box( array(

		'id'            => $prefix . 'setup_post',

		'title'         => __( 'Advanced Post Option', 'mistiri' ),

		'object_types'  => array( 'post' ),

	) );

	$cmb_demo->add_field( array(

		'name' => __( 'Upload banner', 'mistiri' ),

		'desc' => __( 'Upload banner title', 'mistiri' ),

		'id'   => $prefix . 'image_title',

		'type' => 'file',

	) );

	$cmb_demo->add_field( array(

		'name' => __( 'Upload image ', 'mistiri' ),

		'desc' => __( 'Upload image show all page', 'mistiri' ),

		'id'   => $prefix . 'image_thumall',

		'type' => 'file',

	) );

	$cmb_demo->add_field( array(

		'name'       => __( 'Banner Title', 'mistiri' ),

		'desc'       => __( 'Enter banner title', 'mistiri' ),

		'id'         => $prefix . 'title_post',

		'type'       => 'text',

	) );

	$cmb_demo->add_field( array(

		'name' => __( 'Banner Subtitle', 'mistiri' ),

		'desc' => __( 'Enter banner subtitle', 'mistiri' ),

		'id'   => $prefix . 'subtitle_post',

		'type' => 'text',

	) );

	$cmb_demo->add_field( array(

		'name' => __( 'Social Share Buttons', 'mistiri' ),

		'desc' => __( 'Check share buttons', 'mistiri' ),

		'id'   => $prefix . 'share_post',

		'type'    => 'multicheck',

		'options' => array(

			'googleplus' => __( 'Google Plus', 'mistiri' ),

			'fb_post' => __( 'Facebook', 'mistiri' ),

			'twitter' => __( 'Twitter', 'mistiri' ),

			'pinterest' => __( 'Pinterest', 'mistiri' ),

			'linkedIn' => __( 'LinkedIn', 'mistiri' ),

			'vimeo' => __( 'Vimeo', 'mistiri' ),

		),

	) );

}



add_action( 'cmb2_admin_init', 'mistiri_register_project_metabox' );



function mistiri_register_project_metabox() {

	$prefix = '_cmb_';



	$cmb_project = new_cmb2_box( array(

		'id'           => $prefix . 'metabox',

		'title'        => __( 'Project Advanced Options', 'mistiri' ),

		'object_types' => array( 'project' ),

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Upload Banner Image', 'mistiri' ),

		'desc' => __( 'Upload banner image', 'mistiri' ),

		'id'   => $prefix . 'project_banner_image',

		'type' => 'file',

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Banner Title ', 'mistiri' ),

		'desc' => __( 'Enter banner title', 'mistiri' ),

		'id'   => $prefix . 'title_project',

		'type' => 'text',

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Banner Subtitle ', 'mistiri' ),

		'desc' => __( 'Enter banner subtitle', 'mistiri' ),

		'id'   => $prefix . 'subtitle_project',

		'type' => 'text',

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Client ', 'mistiri' ),

		'desc' => __( 'Enter project client', 'mistiri' ),

		'id'   => $prefix . 'client_project',

		'type' => 'text',

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Duration', 'mistiri' ),

		'desc' => __( 'Enter project duration', 'mistiri' ),

		'id'   => $prefix . 'duration_project',

		'type' => 'text_date',

		'date_format' => 'M-d-Y',

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Total Cost', 'mistiri' ),

		'desc' => __( 'Enter project total cost', 'mistiri' ),

		'id'   => $prefix . 'totalcost_project',

		'type' => 'text',

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Project Download Link', 'mistiri' ),

		'desc' => __( 'Enter download link to project', 'mistiri' ),

		'id'   => $prefix . 'linkdownload_project',

		'type' => 'text',

	) );

	$cmb_project->add_field( array(

		'name' => __( 'Social Share Buttons', 'mistiri' ),

		'desc' => __( 'Check share buttons', 'mistiri' ),

		'id'   => $prefix . 'share_project',

		'type'    => 'multicheck',

		'options' => array(

			'googleplus' => __( 'Google Plus', 'mistiri' ),

			'fb_post' => __( 'Facebook', 'mistiri' ),

			'twitter' => __( 'Twitter', 'mistiri' ),

			'mail' => __( 'Mail', 'mistiri' ),

		),

	) );



$group_field_id = $cmb_project->add_field( array(

		'id'          => $prefix . 'slider',

		'type'        => 'group',

		'description' => __( 'Enter slider images', 'mistiri' ),

		'options'     => array(

			'group_title'   => __( 'Image {#}', 'mistiri' ), // {#} gets replaced by row number

			'add_button'    => __( 'Add Another Image', 'mistiri' ),

			'remove_button' => __( 'Remove Image', 'mistiri' ),

			'sortable'      => true,

		),

	) );	

	$cmb_project->add_group_field( $group_field_id, array(

		'name' => __( 'Enter Image', 'mistiri' ),

		'id'   => 'image_projects',

		'type' => 'file',

	) );

}