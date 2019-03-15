<?php  
/**
 * Touring Zone Lite Theme Customizer
 *
 * @package Touring Zone Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function touring_zone_lite_customize_register( $wp_customize ) {	
	
	function touring_zone_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function touring_zone_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
			'title'	=> __('Site Layout','touring-zone-lite'),			
			'priority'	=> 1,
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
			'sanitize_callback' => 'touring_zone_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	   'section'   => 'layout_option',    	 
		   'label'	=> __('Check to Box Layout','touring-zone-lite'),
		   'description'	=> __('if you want to box layout please check the Box Layout Option.','touring-zone-lite'),
    	   'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#e99a00',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','touring-zone-lite'),			
			 'description'	=> __('More color options in PRO Version','touring-zone-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_section('hdr_contactinfo_sec',array(
			'title'	=> __('Header Contact Info','touring-zone-lite'),				
			'priority'		=> null
	));
	$wp_customize->add_setting('hdr_phone_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('hdr_phone_text',array(	
			'type'	=> 'text',
			'label'	=> __('Add phone here','touring-zone-lite'),
			'section'	=> 'hdr_contactinfo_sec',
			'setting'	=> 'hdr_phone_text'
	));	
	
	$wp_customize->add_setting('contact_emailid',array(
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_emailid',array(
			'type'	=> 'text',
			'label'	=> __('Add email address here.','touring-zone-lite'),
			'section'	=> 'hdr_contactinfo_sec'
	));	
	
	$wp_customize->add_setting('show_hdrtop',array(
				'default' => false,
				'sanitize_callback' => 'touring_zone_lite_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_hdrtop', array(
			   'settings' => 'show_hdrtop',
			   'section'   => 'hdr_contactinfo_sec',
			   'label'     => __('Check To show This Section','touring-zone-lite'),
			   'type'      => 'checkbox'
	 ));//Show header top Section 	
	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Header social icons','touring-zone-lite'),
			'description' => __( 'Add social icons link here to display icons in header', 'touring-zone-lite' ),			
			'priority'		=> null
	));
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','touring-zone-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','touring-zone-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','touring-zone-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','touring-zone-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_setting('show_socialicons',array(
				'default' => false,
				'sanitize_callback' => 'touring_zone_lite_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_socialicons', array(
			   'settings' => 'show_socialicons',
			   'section'   => 'social_sec',
			   'label'     => __('Check To show This Section','touring-zone-lite'),
			   'type'      => 'checkbox'
	 ));//Show Social icons Section 	
	
	// Slider Section		
	$wp_customize->add_section( 'slider_options', array(
            'title' => __('Slider Section', 'touring-zone-lite'),
            'priority' => null,
			'description'	=> __('Default image size for slider is 1400 x 827 pixel.','touring-zone-lite'),            			
    ));
	
	$wp_customize->add_setting('sliderpage1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','touring-zone-lite'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage2',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','touring-zone-lite'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('sliderpage3',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('sliderpage3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','touring-zone-lite'),
			'section'	=> 'slider_options'
	));	// Slider Section	
	
	$wp_customize->add_setting('slider_readmore',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('slider_readmore',array(	
			'type'	=> 'text',
			'label'	=> __('Add slider Read more button name here','touring-zone-lite'),
			'section'	=> 'slider_options',
			'setting'	=> 'slider_readmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('show_slider',array(
				'default' => false,
				'sanitize_callback' => 'touring_zone_lite_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_slider', array(
			   'settings' => 'show_slider',
			   'section'   => 'slider_options',
			   'label'     => __('Check To Show This Section','touring-zone-lite'),
			   'type'      => 'checkbox'
	 ));//Show Slider Section
	 
	 // Welcome section 
	$wp_customize->add_section('welcome_section', array(
		'title'	=> __('Welcome Page Section','touring-zone-lite'),
		'description'	=> __('Select Pages from the dropdown for welcome page section','touring-zone-lite'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('welcome_page',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'welcome_page',array(
			'type' => 'dropdown-pages',			
			'section' => 'welcome_section',
	));		
	
	
	$wp_customize->add_setting('show_welcome_page',array(
			'default' => false,
			'sanitize_callback' => 'touring_zone_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_welcome_page', array(
			   'settings' => 'show_welcome_page',
			   'section'   => 'welcome_section',
			   'label'     => __('Check To Show This Section','touring-zone-lite'),
			   'type'      => 'checkbox'
	 ));//Show Welcome Page Section	
	 
	  // Three Column Services Section
	$wp_customize->add_section('pageboxs_section', array(
		'title'	=> __('Four Page Box Section','touring-zone-lite'),
		'description'	=> __('Select pages from the dropdown for four column Page section','touring-zone-lite'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('services_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('services_title',array(	
			'type'	=> 'text',
			'label'	=> __('Add services title here','touring-zone-lite'),
			'section'	=> 'pageboxs_section',
			'setting'	=> 'services_title'
	)); // services title text	
	
	$wp_customize->add_setting('services-pagebox10',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'services-pagebox10',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));		
	
	$wp_customize->add_setting('services-pagebox11',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'services-pagebox11',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('services-pagebox12',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'services-pagebox12',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('services-pagebox13',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'touring_zone_lite_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'services-pagebox13',array(
			'type' => 'dropdown-pages',			
			'section' => 'pageboxs_section',
	));
	
	$wp_customize->add_setting('show_servicesbox',array(
			'default' => false,
			'sanitize_callback' => 'touring_zone_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_servicesbox', array(
			   'settings' => 'show_servicesbox',
			   'section'   => 'pageboxs_section',
			   'label'     => __('Check To Show This Section','touring-zone-lite'),
			   'type'      => 'checkbox'
	 ));//Show Services Section	 
	 
		 
}
add_action( 'customize_register', 'touring_zone_lite_customize_register' );

function touring_zone_lite_custom_css(){
		?>
        	<style type="text/css"> 					
				a, .recent_articles h2 a:hover,
				#sidebar ul li a:hover,									
				.recent_articles h3 a:hover,					
				.recent-post h6:hover,					
				.page-four-column:hover h3,												
				.postmeta a:hover,
				.logo h1 span,
				.social-icons a:hover,				
				.header-menu ul li a:hover, 
				.header-menu ul li.current-menu-item a,
				.header-menu ul li.current-menu-parent a.parent,
				.header-menu ul li.current-menu-item ul.sub-menu li a:hover,
				.social-icons a:hover,
				.header-top .left span
					{ color:<?php echo esc_html( get_theme_mod('color_scheme','#e99a00')); ?>;}			 
					
				.pagination ul li .current, .pagination ul li a:hover, 
				#commentform input#submit:hover,					
				.nivo-controlNav a.active,
				.learnmore,
				h3.widget-title,				
				.appbutton:hover,					
				#sidebar .search-form input.search-submit,				
				.wpcf7 input[type='submit'],
				#featureswrap,
				.column-3:hover .learnmore,
				nav.pagination .page-numbers.current,
				.slide_info .slide_more,					
				.toggle a,
				.threebox:hover .pagemore
					{ background-color:<?php echo esc_html( get_theme_mod('color_scheme','#e99a00')); ?>;}	
					
				blockquote,
				.threebox:hover .thumbbx		
					{ border-color:<?php echo esc_html( get_theme_mod('color_scheme','#e99a00')); ?>;}						
					
					
			</style> 
<?php               
}
         
add_action('wp_head','touring_zone_lite_custom_css');	 


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function touring_zone_lite_customize_preview_js() {
	wp_enqueue_script( 'touring_zone_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'touring_zone_lite_customize_preview_js' );