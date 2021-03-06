<?php

//Copied from ACF Plugin Export
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_addon-details',
		'title' => 'Addon Details',
		'fields' => array (
			array (
				'key' => 'field_538f722ca6163',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'addon',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_contact-form-shortcode',
		'title' => 'Contact Form Shortcode',
		'fields' => array (
			array (
				'key' => 'field_53a48374f1127',
				'label' => 'Contact Shortcode',
				'name' => 'contact_shortcode',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-contact.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_event-details',
		'title' => 'Event Details',
		'fields' => array (
			array (
				'key' => 'field_53a4b1e2d7884',
				'label' => 'Button Text',
				'name' => 'button_text',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538f8ce3c8897',
				'label' => 'Link',
				'name' => 'link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538f95bd66876',
				'label' => 'Event Date',
				'name' => 'event_date',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53a4a281f3605',
				'label' => 'Event Secondary Content',
				'name' => 'event_secondary_content',
				'type' => 'wp_wysiwyg',
				'default_value' => '',
				'teeny' => 0,
				'media_buttons' => 1,
				'dfw' => 1,
			),
			array (
				'key' => 'field_5682e512d45cd',
				'label' => 'Event Active',
				'name' => 'event_active',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 1,
			),
			array (
				'key' => 'field_569419c994e4c',
				'label' => 'Event Year',
				'name' => 'event_year',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'gevent',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_expired-event',
		'title' => 'Expired Event',
		'fields' => array (
			array (
				'key' => 'field_5699488a0e7ef',
				'label' => 'Expired Event Copy',
				'name' => 'expired_event_copy',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-events.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-template',
		'title' => 'Page Template',
		'fields' => array (
			array (
				'key' => 'field_53a2210c597fe',
				'label' => 'Secondary Content Title',
				'name' => 'secondary_content_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538f871253607',
				'label' => 'Secondary Content',
				'name' => 'secondary_content',
				'type' => 'wp_wysiwyg',
				'default_value' => '',
				'teeny' => 0,
				'media_buttons' => 1,
				'dfw' => 1,
			),
			array (
				'key' => 'field_53a22125ed894',
				'label' => 'Separation Image',
				'name' => 'separation_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_550c777dc2fda',
				'label' => 'Below Secondary',
				'name' => 'below',
				'type' => 'wp_wysiwyg',
				'default_value' => '',
				'teeny' => 0,
				'media_buttons' => 1,
				'dfw' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page_template',
					'operator' => '!=',
					'value' => 'template-yacht.php',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_random-images',
		'title' => 'Random Images',
		'fields' => array (
			array (
				'key' => 'field_53e929a9debde',
				'label' => 'Random Image',
				'name' => 'random_image',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_53e92aa9ec580',
						'label' => 'Image Item',
						'name' => 'image_item',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'full',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '19',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_services-details',
		'title' => 'Services Details',
		'fields' => array (
			array (
				'key' => 'field_54e23de019442',
				'label' => 'Services Case Studies',
				'name' => 'services_case_studies',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_54e23e0c19443',
						'label' => 'Case Study Title',
						'name' => 'case_study_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54e23e4919444',
						'label' => 'Case Study Details',
						'name' => 'case_study_details',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_54e23e6019445',
						'label' => 'Case Study Description',
						'name' => 'case_study_description',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_54e23e6f19446',
						'label' => 'Case Study Image',
						'name' => 'case_study_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'full',
						'library' => 'all',
					),
					array (
						'key' => 'field_564a2a4c66afa',
						'label' => 'Case Study Slideshow',
						'name' => 'case_study_slideshow',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_564a2a6166afb',
								'label' => 'Case Study Slideshow Image',
								'name' => 'case_study_slideshow_image',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'url',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'row',
						'button_label' => 'Add Row',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Case Study',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '13',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_slide-meta',
		'title' => 'Slide Meta',
		'fields' => array (
			array (
				'key' => 'field_538cc2853f88c',
				'label' => 'Poster',
				'name' => 'slide_poster',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_538cc52f3418a',
				'label' => 'Layout Type',
				'name' => 'layout_type',
				'type' => 'radio',
				'choices' => array (
					'footer' => 'Footer',
					'overlay' => 'Overlay',
					'video' => 'Video',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_538faa5050357',
				'label' => 'Button Link',
				'name' => 'button_link',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'page',
					1 => 'venue',
					2 => 'gevent',
					3 => 'service',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5390ab8efeffd',
				'label' => 'Button Copy',
				'name' => 'button_copy',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_55936d5c5b167',
				'label' => 'Hard Link',
				'name' => 'hard_link',
				'type' => 'text',
				'instructions' => 'If Button Link is unavailable
	ie: "/venues"
	',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54bea86421237',
				'label' => 'Video Code',
				'name' => 'video_code',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_54bea86d21238',
				'label' => 'Video Souce',
				'name' => 'video_souce',
				'type' => 'radio',
				'choices' => array (
					'Youtube' => 'Youtube',
					'Vimeo' => 'Vimeo',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_58530309da6d6',
				'label' => 'Hide on Homepage',
				'name' => 'hide_on_homepage',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slide',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_sub-content',
		'title' => 'Sub Content',
		'fields' => array (
			array (
				'key' => 'field_54e23f30796dd',
				'label' => 'Sub Title',
				'name' => 'sub_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_text-and-image-slideshow',
		'title' => 'Text and Image Slideshow',
		'fields' => array (
			array (
				'key' => 'field_58a223ac7172d',
				'label' => 'Text Slideshow',
				'name' => 'text_slideshow',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_58a223b77172e',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_58a223d47172f',
						'label' => 'Copy',
						'name' => 'copy',
						'type' => 'wp_wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'teeny' => 0,
						'media_buttons' => 1,
						'dfw' => 1,
					),
					array (
						'key' => 'field_58a223dc71730',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-yacht.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_timeline',
		'title' => 'Timeline',
		'fields' => array (
			array (
				'key' => 'field_57682258e12f8',
				'label' => 'Timeline',
				'name' => 'timeline',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5799343ddc95c',
						'label' => 'Full, Single or Double',
						'name' => 'full_single_or_double',
						'type' => 'radio',
						'column_width' => '',
						'choices' => array (
							'Full' => 'Full',
							'Single' => 'Single',
							'Double' => 'Double',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
					),
					array (
						'key' => 'field_57682268e12f9',
						'label' => 'Year',
						'name' => 'timeline_year',
						'type' => 'number',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
					),
					array (
						'key' => 'field_57682279e12fa',
						'label' => 'Title',
						'name' => 'timeline_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5768229de12fb',
						'label' => 'Copy',
						'name' => 'timeline_copy',
						'type' => 'wp_wysiwyg',
						'column_width' => '',
						'default_value' => '',
						'teeny' => 0,
						'media_buttons' => 1,
						'dfw' => 1,
					),
					array (
						'key' => 'field_576822b0e12fc',
						'label' => 'Image',
						'name' => 'timeline_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5795d7e634731',
						'label' => 'Second Caption',
						'name' => 'second_caption',
						'type' => 'wp_wysiwyg',
						'instructions' => 'optional',
						'column_width' => '',
						'default_value' => '',
						'teeny' => 0,
						'media_buttons' => 1,
						'dfw' => 1,
					),
					array (
						'key' => 'field_5795d80634732',
						'label' => 'Second Image',
						'name' => 'second_image',
						'type' => 'image',
						'instructions' => 'optional',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-timeline.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_venue-details',
		'title' => 'Venue Details',
		'fields' => array (
			array (
				'key' => 'field_538f7a7ee8c4e',
				'label' => 'Venue Logo',
				'name' => 'venue_logo',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_538f78309f8a8',
				'label' => 'Dimentions',
				'name' => 'dimentions',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538f78439f8a9',
				'label' => 'Seated',
				'name' => 'seated',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538f784b9f8aa',
				'label' => 'Reception',
				'name' => 'reception',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538f78559f8ab',
				'label' => 'Rate',
				'name' => 'rate',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_538f78649f8ac',
				'label' => 'Plan View',
				'name' => 'plan_view',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_538f78729f8ad',
				'label' => 'Elevation View',
				'name' => 'elevation_view',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_538f787d9f8ae',
				'label' => 'Floor Plan',
				'name' => 'floor_plan',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_54bed6ca19bb0',
				'label' => 'Floor Plan PDF',
				'name' => 'floor_plan_pdf',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5398a8b2b8df3',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'select',
				'choices' => array (
					'Full Venue' => 'Full Venue',
					'Field Level' => 'Field Level',
					'Promenade' => 'Promenade',
					'Club Level' => 'Club Level',
					'Suite Level' => 'Suite Level',
				),
				'default_value' => '',
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53fbc49d5ba65',
				'label' => 'Show Catering',
				'name' => 'show_catering',
				'type' => 'checkbox',
				'choices' => array (
					'Yes?' => 'Yes?',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'venue',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-yacht-single.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_video-widget',
		'title' => 'Video Widget',
		'fields' => array (
			array (
				'key' => 'field_53a2231730edc',
				'label' => 'Video Title',
				'name' => 'video_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53a2233330edd',
				'label' => 'Video Copy',
				'name' => 'video_copy',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53a2234530ede',
				'label' => 'Youtube Code',
				'name' => 'video_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page_template',
					'operator' => '!=',
					'value' => 'template-yacht.php',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_gallery',
		'title' => 'Gallery',
		'fields' => array (
			array (
				'key' => 'field_53a481dc5c68c',
				'label' => 'Gallery Shortcode',
				'name' => 'gallery_shortcode',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_544176ca49864',
				'label' => 'Page Gallery',
				'name' => 'page_gallery',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_544176ec49865',
						'label' => 'Page Gallery Image',
						'name' => 'page_gallery_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5441a67c44109',
						'label' => 'Page Gallery Caption',
						'name' => 'page_gallery_caption',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_569862d63846c',
						'label' => 'Page Gallery Video Code',
						'name' => 'page_gallery_video_code',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_569862f93846d',
						'label' => 'Page Gallery Video Type',
						'name' => 'page_gallery_video_type',
						'type' => 'radio',
						'column_width' => '',
						'choices' => array (
							'Youtube' => 'Youtube',
							'Vimeo' => 'Vimeo',
						),
						'other_choice' => 0,
						'save_other_choice' => 0,
						'default_value' => '',
						'layout' => 'vertical',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Slide',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '!=',
					'value' => '17',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'service',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'venue',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 10,
	));
	register_field_group(array (
		'id' => 'acf_content-boxes',
		'title' => 'Content Boxes',
		'fields' => array (
			array (
				'key' => 'field_588ba6b7691da',
				'label' => 'Boxes',
				'name' => 'boxes',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_589bb81d0192f',
						'label' => 'Choose Post Type',
						'name' => 'choose_content_type',
						'type' => 'true_false',
						'column_width' => '',
						'message' => '',
						'default_value' => 0,
					),
					array (
						'key' => 'field_588ba6c3691db',
						'label' => 'Box Title',
						'name' => 'box_title',
						'type' => 'text',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_589bb81d0192f',
									'operator' => '!=',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_588ba6cf691dc',
						'label' => 'Box Copy',
						'name' => 'box_copy',
						'type' => 'wp_wysiwyg',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_589bb81d0192f',
									'operator' => '!=',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'teeny' => 0,
						'media_buttons' => 1,
						'dfw' => 1,
					),
					array (
						'key' => 'field_588ba6e0691dd',
						'label' => 'Box Link',
						'name' => 'box_link',
						'type' => 'text',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_589bb81d0192f',
									'operator' => '!=',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_588ba6ec691de',
						'label' => 'Box Image',
						'name' => 'box_image',
						'type' => 'image',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_589bb81d0192f',
									'operator' => '!=',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_589bb84d01930',
						'label' => 'Post Type',
						'name' => 'post_type',
						'type' => 'post_object',
						'conditional_logic' => array (
							'status' => 1,
							'rules' => array (
								array (
									'field' => 'field_589bb81d0192f',
									'operator' => '==',
									'value' => '1',
								),
							),
							'allorany' => 'all',
						),
						'column_width' => '',
						'post_type' => array (
							0 => 'venue',
							1 => 'gevent',
							2 => 'service',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'allow_null' => 0,
						'multiple' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-yacht.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 11,
	));
	register_field_group(array (
		'id' => 'acf_large-feature-with-text-box',
		'title' => 'Large Feature with Text Box',
		'fields' => array (
			array (
				'key' => 'field_588bbaeef0fd7',
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_588bbb15f0fd8',
				'label' => 'Copy',
				'name' => 'copy',
				'type' => 'wp_wysiwyg',
				'default_value' => '',
				'teeny' => 0,
				'media_buttons' => 1,
				'dfw' => 1,
			),
			array (
				'key' => 'field_588bbb20f0fd9',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-yacht.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 12,
	));
	register_field_group(array (
		'id' => 'acf_block-repeater',
		'title' => 'Block Repeater',
		'fields' => array (
			array (
				'key' => 'field_588bd0cc34b9e',
				'label' => 'Blocks',
				'name' => 'blocks',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_588bd0d834b9f',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_588bd0e334ba0',
						'label' => 'Copy',
						'name' => 'copy',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'br',
					),
					array (
						'key' => 'field_588bd0ed34ba1',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-yacht.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 13,
	));
	register_field_group(array (
		'id' => 'acf_multiple-galleries',
		'title' => 'Multiple Galleries',
		'fields' => array (
			array (
				'key' => 'field_588be542f6395',
				'label' => 'Multiple Galleries',
				'name' => 'multiple_galleries',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_588be5cab465c',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_588be54ef6396',
						'label' => 'New Gallery',
						'name' => 'new_gallery',
						'type' => 'repeater',
						'column_width' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_588be563f6397',
								'label' => 'Image',
								'name' => 'image',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-yacht.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 15,
	));
	register_field_group(array (
		'id' => 'acf_footer-widget',
		'title' => 'Footer Widget',
		'fields' => array (
			array (
				'key' => 'field_53989230d45bb',
				'label' => 'Show Top Footer Widget',
				'name' => 'footer_widget',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 99,
	));
}


