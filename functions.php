<?php
/**
* 
*/
// 
// libs
require('includes/util.general.php');       // helpers
require('includes/acf.extensions.php');     // php extensions for acf (options pages, manually defined fields, other stuff?)
require('classes/class.NavWalker.php');     // wordpress built in nav
require('classes/class.NavHandler.php');    // handler for creating theme headers
require('classes/customizer/class.Customizer.php');    // wordpress customizer stuff

// 
// setup the theme
require('classes/class.Setup.php');         // Theme Setup / Init
require('classes/class.UserRoles.php');     // Custom Users and Roles
require('classes/class.customposts.php'); // custom posts

include_once( dirname( __FILE__ ) . '/includes/kirki/kirki.php' );

function mytheme_kirki_configuration() {
    return array( 'url_path'     => get_stylesheet_directory_uri() . '/includes/kirki/' );
}
add_filter( 'kirki/config', 'mytheme_kirki_configuration' );






function mytheme_kirki_sections( $wp_customize ) {
	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'style', array(
		'priority'    => 10,
		'title'       => __( 'Style', 'kirki' ),
    ) );
    $wp_customize->add_panel( 'tex', array(
		'priority'    => 10,
		'title'       => __( 'Typography', 'kirki' ),
    ) );
    $wp_customize->add_panel( 'global', array(
		'priority'    => 10,
		'title'       => __( 'Global', 'kirki' ),
    ) );
    

	/**
	 * Add sections
	 */
    $wp_customize->add_section( 'section_color', array(
        'title'       => __( 'Colors + Backgrounds', 'kirki' ),
        'priority'    => 20,
        'panel'       => 'style',
    ) );
    
    $wp_customize->add_section( 'section_typography', array(
        'title'       => __( 'Typography', 'kirki' ),
        'priority'    => 20,
        'panel'       => 'style',
    ) );

    $wp_customize->add_section( 'section_global', array(
        'title'       => __( 'Global Style', 'kirki' ),
        'priority'    => 20,
        'panel'       => 'style',
    ) );
   
    

   

    

}
add_action( 'customize_register', 'mytheme_kirki_sections' );

function mytheme_kirki_fields( $wp_customize ) {
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'Header', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    
    
       //header
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'background_setting_header',
        'label'       => esc_html__( 'Header Background ', 'kirki' ),
        'description' => esc_html__( 'Header Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#fff',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 
    // header colors fields
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_header',
        'label'       => esc_html__( 'Header text colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for Header element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    $fields[] = array(
    'type'        => 'select',
	'settings'    => 'section_header_size1',
	'label'       => esc_html__( 'Header Size', 'kirki' ),
	'section'     => 'section_color', 
	'default'     => 'default',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'default' => esc_html__( 'default', 'kirki' ),
		'narrow' => esc_html__( 'narrow', 'kirki' ),
        'medium' => esc_html__( 'medium', 'kirki' ),
        'wide' => esc_html__( 'wide', 'kirki' ),
		'full' => esc_html__( 'full', 'kirki' ),
       
		
	],
);
    
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'background_setting_buttons_header',
        'label'       => esc_html__( 'Backgroung Button on Header ', 'kirki' ),
        'description' => esc_html__( 'Backgroung Button on header ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'background_setting_buttons_header_hover',
        'label'       => esc_html__( 'Button on Header on Hover ', 'kirki' ),
        'description' => esc_html__( 'Button on header on Hover ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'text_setting_buttons_header',
        'label'       => esc_html__( 'Backgroung Button on Header ', 'kirki' ),
        'description' => esc_html__( 'Backgroung Button on header ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'text_setting_buttons_header_hover',
        'label'       => esc_html__( 'Button on Header on Hover ', 'kirki' ),
        'description' => esc_html__( 'Button on header on Hover ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
        $fields[] = array(
        'type'        => 'color',
        'settings'    => 'text_setting_buttons_header_icons_phone',
        'label'       => esc_html__( 'Header icon ', 'kirki' ),
        'description' => esc_html__( 'Header iconsr ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
    
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'text_setting_buttons_header_icons_social',
        'label'       => esc_html__( 'Header social icon ', 'kirki' ),
        'description' => esc_html__( 'Header social icons ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
    
     // accent fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'background_setting_accent2',
        'label'       => esc_html__( 'Accent color ', 'kirki' ),
        'description' => esc_html__( 'Accent color ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
    
     $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_nav',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'Nav', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    
    //nav
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'background_setting_nav',
        'label'       => esc_html__( 'Nav Background ', 'kirki' ),
        'description' => esc_html__( 'Nav Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    // nav colors fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_nav',
        'label'       => esc_html__( 'Navigation text colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for navegation element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_nav_onhover',
        'label'       => esc_html__( 'Navigation On Hover ', 'kirki' ),
        'description' => esc_html__( 'Select color for navegation element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    
    
     $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_hero',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'Hero', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    // hero background color
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'background_setting_hero',
        'label'       => esc_html__( 'Hero Background ', 'kirki' ),
        'description' => esc_html__( 'Hero Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => [
            'background-color'      => '#ffffff',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '.image2',
            ],
        ],
    );
    
     $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_hero_mobile_image',
	'label'       => esc_html__( 'Mobile Background image', 'kirki' ),
	'section'     => 'section_color',
	'default'     => '',
	   );
	   
	  
    // foreground background color
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'background_setting_hero_foreground',
        'label'       => esc_html__( 'Background Overlays ', 'kirki' ),
        'description' => esc_html__( 'this set over the background', 'kirki' ),
        'section'     => 'section_color',
        'default'     => [
            'background-color'      => 'transparent',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
           
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'section.hero .tinto',
            ],
        ],
    );

    //blend mode
    $fields[] = array(
        'type'        => 'select',
	'settings'    => 'background_setting_hero_foreground_blend3',
	'label'       => esc_html__( 'Tint Overlay Blend Mode', 'kirki' ),
	'section'     => 'section_color',
	'default'     => 'normal',
	'placeholder' => esc_html__( 'Blend Mode', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'normal' => esc_html__( 'normal', 'kirki' ),
		'multiply' => esc_html__( 'multiply', 'kirki' ),
		'screen' => esc_html__( 'screen', 'kirki' ),
        'overlay' => esc_html__( 'overlay', 'kirki' ),
        'darken' => esc_html__( 'darken', 'kirki' ),
		'lighten' => esc_html__( 'lighten', 'kirki' ),
		'color-dodge' => esc_html__( 'color-dodge', 'kirki' ),
        'saturation' => esc_html__( 'saturation', 'kirki' ),
        'color' => esc_html__( 'color', 'kirki' ),
		'luminosity' => esc_html__( 'luminosity', 'kirki' ),
	],
    );
     // Hero text
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_hero',
        'label'       => esc_html__( 'Hero text colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for Hero element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    
    //radio buttons
 $fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_global_HEADER_STYLE',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_global',
    'default'     => '<div class="bartitle">' . esc_html__( 'HEADER STYLE', 'kirki' ) . '</div>',
    'priority'    => 10,
);   
    
     $fields[] = array(
        'type'        => 'select',
	'settings'    => 'header_style',
	'label'       => esc_html__( 'SELECT HEADER STYLE', 'kirki' ),
	'section'     => 'section_global',
	'default'     => 'one',
	'placeholder' => esc_html__( 'HEADER STYLE', 'kirki' ),
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'one' => esc_html__( 'one', 'kirki' ),
		'two' => esc_html__( 'two', 'kirki' ),
		'three' => esc_html__( 'three', 'kirki' ),
        'four' => esc_html__( 'four', 'kirki' ),
        'five' => esc_html__( 'five', 'kirki' ),
		'six' => esc_html__( 'six', 'kirki' ),
		'seven' => esc_html__( 'seven', 'kirki' ),
        'eight' => esc_html__( 'eight', 'kirki' ),
        'nine' => esc_html__( 'nine', 'kirki' ),
		'ten' => esc_html__( 'ten', 'kirki' ),
	],
    );
    
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_global_button',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_global',
    'default'     => '<div class="bartitle">' . esc_html__( 'BUTTONS (round corners)', 'kirki' ) . '</div>',
    'priority'    => 10,
);
$fields[] = array(
   

    'type'        => 'slider',
	'settings'    => 'section_buttons',
	'label'       => esc_html__( 'Corner Radius ', 'kirki' ),
	'section'     => 'section_global',
	'default'     => 42,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
);

    
    //type lines
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_global_dividers',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_global',
    'default'     => '<div class="bartitle">' . esc_html__( 'DIVIDERS', 'kirki' ) . '</div>',
    'priority'    => 10,
);
$fields[] = array(
    'type'        => 'select',
	'settings'    => 'section_divid1',
	'label'       => esc_html__( 'Dividers', 'kirki' ),
	'section'     => 'section_global',
	'default'     => 'solid',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => [
		'solid' => esc_html__( 'solid', 'kirki' ),
		'dotted' => esc_html__( 'dotted', 'kirki' ),
        'dashed' => esc_html__( 'dashed', 'kirki' ),
        'double' => esc_html__( 'double', 'kirki' ),
		'groove' => esc_html__( 'groove', 'kirki' ),
        'ridge' => esc_html__( 'ridge', 'kirki' ),
        'insert' => esc_html__( 'inset', 'kirki' ),
        'outset' => esc_html__( 'outset', 'kirki' ),
		'none' => esc_html__( 'none', 'kirki' ),
		'hidden' => esc_html__( 'hidden', 'kirki' ),
		
	],
);
    
    
    
    
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_divider',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_global',
        'default'     => '<div class="bartitle">' . esc_html__( 'Shape Dividers', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    //divider hero bottom
    $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_hero_buttom_divider_top',
	'label'       => esc_html__( 'Hero Shape divider top', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
    //divider hero bottom
    $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_hero_buttom_divider',
	'label'       => esc_html__( 'Hero Shape divider bottom', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
    
    $fields[] = array(
       'type'        => 'radio-buttonset',
	'settings'    => 'setting_true_false_true1',
	'label'       => esc_html__( 'Hero Shape Divider Mobile', 'kirki' ),
	'section'     => 'section_global',
	'default'     => 'ON',
	'priority'    => 10,
	'choices'     => [
		'ON'   => esc_html__( 'ON', 'kirki' ),
		'OFF' => esc_html__( 'OFF', 'kirki' ),
		
	],
	
    );

     //divider menu top
     $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_menu1_buttom_divider_top',
	'label'       => esc_html__( 'Menu Shape divider top', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
    //divider menu bottom
    $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_menu1_buttom_divider',
	'label'       => esc_html__( 'Menu Shape divider bottom', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
     //divider location bottom
     $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_location_buttom_divider_top',
	'label'       => esc_html__( 'Location Shape divider top', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
    //divider location bottom
    $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_location_buttom_divider',
	'label'       => esc_html__( 'Location Shape divider bottom', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );

     //divider coupon bottom
     $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_coupon_buttom_divider_top',
	'label'       => esc_html__( 'Coupon Shape divider top', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
    //divider coupon bottom
    $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_coupon_buttom_divider',
	'label'       => esc_html__( 'Coupon Shape divider bottom', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
     //divider gallery bottom
     $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_gallery_buttom_divider_top',
	'label'       => esc_html__( 'Gallery Shape divider top', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
    //divider gallery bottom
    $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_gallery_buttom_divider',
	'label'       => esc_html__( 'Gallery Shape divider bottom', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
     //divider services bottom
     $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_services_buttom_divider_top',
	'label'       => esc_html__( 'services Shape divider top', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
    //divider services bottom
    $fields[] = array(
        'type'        => 'image',
	'settings'    => 'setting_services_buttom_divider',
	'label'       => esc_html__( 'services Shape divider bottom', 'kirki' ),
	'section'     => 'section_global',
	'default'     => '',
	
    );
 //divider blog bottom
 $fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_blog_buttom_divider_top',
'label'       => esc_html__( 'blog Shape divider top', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);
//divider blog bottom
$fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_blog_buttom_divider',
'label'       => esc_html__( 'blog Shape divider bottom', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);
//divider testimonial bottom
$fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_testimonial_buttom_divider_top',
'label'       => esc_html__( 'testimonial Shape divider top', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);
//divider testimonial bottom
$fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_testimonial_buttom_divider',
'label'       => esc_html__( 'testimonial Shape divider bottom', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);

//divider staff bottom
$fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_staff_buttom_divider_top',
'label'       => esc_html__( 'staff Shape divider top', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);
//divider staff bottom
$fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_staff_buttom_divider',
'label'       => esc_html__( 'staff Shape divider bottom', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);


//divider contact bottom
$fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_contact_buttom_divider_top',
'label'       => esc_html__( 'contact Shape divider top', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);
//divider contact bottom
$fields[] = array(
    'type'        => 'image',
'settings'    => 'setting_contact_buttom_divider',
'label'       => esc_html__( 'contact Shape divider bottom', 'kirki' ),
'section'     => 'section_global',
'default'     => '',

);
    

    // body background color
   /* $fields[] = array(
        'type'        => 'color',
        'settings'    => 'background_setting_body1',
        'label'       => esc_html__( 'Body Background ', 'kirki' ),
        'description' => esc_html__( 'Body Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );*/
        $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_body',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'Body', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'background_setting_body2',
        'label'       => esc_html__( ' ', 'kirki' ),
        'description' => esc_html__( ' ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => [
            'background-color'      => '#ffffff',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    );
     // body colors fields
      $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_p',
        'label'       => esc_html__( 'Body text colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for body element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
 
  $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_footer',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'Footer', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    // footer fields
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'background_setting_footer',
        'label'       => esc_html__( 'Footer Background ', 'kirki' ),
        'description' => esc_html__( 'Footer Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => [
            'background-color'      => '#ffffff',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'footer',
            ],
        ],
    );

     // footer copyright fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'background_setting_footercopyright',
        'label'       => esc_html__( 'Footer Copyright Background ', 'kirki' ),
        'description' => esc_html__( 'Footer Copyright Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
    );
   // footer text
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_footer',
        'label'       => esc_html__( 'Footer text colors ', 'kirki' ),
        'description' => esc_html__( 'Select text color for Footer element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );

     // Footer copyright text
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_footer_copyright',
        'label'       => esc_html__( 'Footer copyright colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for footer copyright element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    
$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_sections',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'Sections / Pages', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    
     // about colors
     
$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_about',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="header-one">' . esc_html__( 'About', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_about',
        'label'       => esc_html__( 'Staff Background Colors ', 'kirki' ),
        'description' => esc_html__( ' Background Colors', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#dedede',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 
    
         // Steff colors
     
$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_staff',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="header-one">' . esc_html__( 'About Staff', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_staff',
        'label'       => esc_html__( 'Staff Background Colors ', 'kirki' ),
        'description' => esc_html__( ' Background Colors', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#dedede',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_Blog',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="header-one">' . esc_html__( 'Blog', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    // blog colors
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'background_setting_blog',
        'label'       => esc_html__( 'Blog Background ', 'kirki' ),
        'description' => esc_html__( 'Blog Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => [
            'background-color'      => '#dedede',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'section.block__blog_posts > div.container ul li > a > div.content',
            ],
        ],
    );

$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_coupons',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="header-one">' . esc_html__( 'Coupons', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    // coupon colors
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'background_setting_coupon',
        'label'       => esc_html__( 'Coupons Background ', 'kirki' ),
        'description' => esc_html__( 'Coupons Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => [
            'background-color'      => '#dedede',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'ul > li.coupons__one, ul > li.coupons__two, ul > li.coupons__three, ul > li.coupons__four',
            ],
        ],
    );
$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_services',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="header-one">' . esc_html__( 'Services', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    // Services colors
    $fields[] = array(
        'type'        => 'background',
        'settings'    => 'background_setting_services',
        'label'       => esc_html__( 'Services Background ', 'kirki' ),
        'description' => esc_html__( 'Services Background Color Controls ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => [
            'background-color'      => '#dedede',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'section.block__services > .container.services__one .site__grid > ul > li > a > div:last-of-type',
            ],
        ],
    );

$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_testimonials',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="header-one">' . esc_html__( 'Testimonials', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
     // Testimonials colors
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_testi',
        'label'       => esc_html__( 'Testimonail Background Colors ', 'kirki' ),
        'description' => esc_html__( 'Testimonail Background Colors', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#dedede',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 



    // Testimonials colors
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_outline',
        'label'       => esc_html__( 'Outline Background Colors ', 'kirki' ),
        'description' => esc_html__( 'Outline Background Colors', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#dedede',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//type
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_type',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_color',
    'default'     => '<div class="bartitle">' . esc_html__( 'TYPE', 'kirki' ) . '</div>',
    'priority'    => 10,
);
     // h1 colors fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_h1',
        'label'       => esc_html__( 'h1 colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for h1 element', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 

     // h2 colors fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_h2',
        'label'       => esc_html__( 'h2 colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for h2 element', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 

     // h3 colors fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_h3',
        'label'       => esc_html__( 'h3 colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for h3 element', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
        
    ); 
    // h4 colors fields
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_h4',
        'label'       => esc_html__( 'h4 colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for h4 element', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
        
    ); 
     // h5 colors fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_h5',
        'label'       => esc_html__( 'h5 colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for h5 element', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
        
    ); 
     // h6 colors fields
     $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_h6',
        'label'       => esc_html__( 'h6 colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for h6 element', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    ); 
  //button text color
     $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_botton',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'Buttons', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_button_text',
        'label'       => esc_html__( 'Button text colors  ', 'kirki' ),
        'description' => esc_html__( 'Select color for button element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    //button background
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_button',
        'label'       => esc_html__( 'Button Background colors  ', 'kirki' ),
        'description' => esc_html__( 'Select color for button background element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    // button background hover
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_button_hover',
        'label'       => esc_html__( 'Button background colors on hover  ', 'kirki' ),
        'description' => esc_html__( 'Select color for button background element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_button_border',
        'label'       => esc_html__( 'Button border colors   ', 'kirki' ),
        'description' => esc_html__( 'Select color for button border ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );

    
    $fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_Divider',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_color',
    'default'     => '<div class="bartitle">' . esc_html__( 'Divider', 'kirki' ) . '</div>',
    'priority'    => 10,
);
   
    // Hero text
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_divider',
        'label'       => esc_html__( 'Divider colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for Divider element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
  

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //links5
    //link color text

    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_links',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '<div class="bartitle">' . esc_html__( 'LINKS', 'kirki' ) . '</div>',
        'priority'    => 10,
    );

    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_links',
        'label'       => esc_html__( 'Links text colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for links element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    //links hover color
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_links_hover',
        'label'       => esc_html__( 'Links text colors on hover ', 'kirki' ),
        'description' => esc_html__( 'Select color for links on hover element ', 'kirki' ),
        'section'     => 'section_color',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );
    //color bg links
    /*
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'color_links',
        'label'       => esc_html__( 'Links text colors ', 'kirki' ),
        'description' => esc_html__( 'Select color for links element ', 'kirki' ),
        'section'     => 'links',
        'default'     => '#0088CC',
        'choices'     => [
            'alpha' => true,
        ],
       
    );*/
  



    //typography headline

    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_typo_headline',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_typography',
        'default'     => '<div class="bartitle">' . esc_html__( 'HEADLINE', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'headline_h1',
        'label'       => esc_html__( 'H1', 'kirki' ),
        'section'     => 'section_typography',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
            'font-size'      => '100px',
            'line-height'    => '1.5',
            'letter-spacing' => '0',
            'text-transform' => 'none',
            'text-align'     => 'none',
            'text-decoration'     => 'none',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    );
//headline h2
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'headline_h2',
        'label'       => esc_html__( 'H2', 'kirki' ),
        'section'     => 'section_typography',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
            'font-size'      => '50px',
            'line-height'    => '1.5',
            'letter-spacing' => '0',
            'text-transform' => 'none',
            'text-align'     => 'none',
            'text-decoration'     => 'none',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    );
    //headline h3
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'headline_h3',
        'label'       => esc_html__( 'H3', 'kirki' ),
        'section'     => 'section_typography',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
            'font-size'      => '100px',
            'line-height'    => '1.5',
            'letter-spacing' => '0',
            'text-transform' => 'none',
            'text-align'     => 'none',
            'text-decoration'     => 'none',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3,h5, section.block__blog_posts > div.container ul li > a > div.content > h5, ul > li.coupons__one h5, ul > li.coupons__two h5, ul > li.coupons__three h5, ul > li.coupons__four h5,section.block__services > .container.services__one .site__grid > ul > li > a > div:last-of-type > h3,section.block__contact > .container ul.locations > li > h3.area__heading,section.site__block.block__testimonials > div.container > .site__grid > ul li > div .testimonial_content > div.testimonial_name > h3,section.site__block.block__testimonials > div.container > .site__grid > ul li > div .testimonial_content > div.testimonial_name > p',
            ],
        ],
    );
//headline h4
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'headline_h4',
    'label'       => esc_html__( 'H4', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '100px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'h4',
        ],
    ],
);
//headline h5
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'headline_h5',
    'label'       => esc_html__( 'H5', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '100px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'h5',
        ],
    ],
);
//headline <h6>
$fields[] = array(
        'type'        => 'typography',
        'settings'    => 'headline_h6',
        'label'       => esc_html__( 'H6', 'kirki' ),
        'section'     => 'section_typography',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
            'font-size'      => '100px',
            'line-height'    => '1.5',
            'letter-spacing' => '0',
            'text-transform' => 'none',
            'text-align'     => 'none',
            'text-decoration'     => 'none',
            
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'my_setting_typo_body',
        'label'       => esc_html__( '', 'kirki' ),
        'section'     => 'section_typography',
        'default'     => '<div class="bartitle">' . esc_html__( 'BODY (Blog Post Content)', 'kirki' ) . '</div>',
        'priority'    => 10,
    );
    //headline <body>
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'body_body',
    'label'       => esc_html__( 'Body', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '30px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'body',
        ],
    ],
);
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_typo_navigation',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => '<div class="bartitle">' . esc_html__( 'NAVIGATION', 'kirki' ) . '</div>',
    'priority'    => 10,
);
//headline <nav>
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'nav',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => 'regular',
        'font-size'      => '100px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'nav,header#opt_header_eight > div:first-of-type > nav .navlinks .navlinks-item .navlinks-item-link',
        ],
    ],
);
//typography_hero_title
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_typo_hero_title',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => '<div class="bartitle">' . esc_html__( 'HERO TITLE', 'kirki' ) . '</div>',
    'priority'    => 10,
);
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'hero_title',
    'label'       => esc_html__( 'Hero Title', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => '600',
        'font-size'      => '100px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'section.hero .hero_foreground h1',
        ],
    ],
);
//typography_hero_title
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_typo_hero_sub_title',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => '<div class="bartitle">' . esc_html__( 'HERO SUB-TITLE', 'kirki' ) . '</div>',
    'priority'    => 10,
);
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'hero_subtitle',
    'label'       => esc_html__( 'Hero Sub-Title', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => '600',
        'font-size'      => '100px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => '',//sub title ?
        ],
    ],
);
//typography buttons
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_typo_buttons',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => '<div class="bartitle">' . esc_html__( 'BUTTONS', 'kirki' ) . '</div>',
    'priority'    => 10,
);
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'typography_button',
    'label'       => esc_html__( 'Button', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => '600',
        'font-size'      => '30px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'section.block__contact > .container ul.locations > li .site__button','section.block__blog_posts > div.container ul li > a > div.content > p.read_more',
        ],
    ],
);

//typography_alt_text
$fields[] = array(
    'type'        => 'custom',
    'settings'    => 'my_setting_typo_alt_text',
    'label'       => esc_html__( '', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => '<div class="bartitle">' . esc_html__( 'ALT TEXT(Sub title under food menu item)', 'kirki' ) . '</div>',
    'priority'    => 10,
);
$fields[] = array(
    'type'        => 'typography',
    'settings'    => 'typography_alttext',
    'label'       => esc_html__( 'Button', 'kirki' ),
    'section'     => 'section_typography',
    'default'     => [
        'font-family'    => 'Roboto',
        'variant'        => '600',
        'font-size'      => '30px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
        'text-align'     => 'none',
        'text-decoration'     => 'none',
        
        
    ],
    'priority'    => 10,
    'transport'   => 'auto',
    'output'      => [
        [
            'element' => 'section.block__food_menus > .container .menu_section.menu_photo_list .menu_items .menu_item > div:last-of-type > div.menu__item-description',
        ],
    ],
);

    return $fields;
}
add_filter( 'kirki/fields', 'mytheme_kirki_fields' );














/**
 * Returns the SITE LOGO
 *
 * @return void
 */

 


function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyCfDxwoigWRerVQMojFfT6nk0MMOYsz8XA');
}

add_action('acf/init', 'my_acf_init');

function get_site_logo() {
    // look for a 'custom logo'
    $content_logo = '';
    // if we have a custom logo

    if (!empty(get_theme_mod('custom_logo'))) {
        $logo_src = wp_get_attachment_image_src(get_theme_mod('custom_logo'));
        $logo_srcset = wp_get_attachment_image_srcset(get_theme_mod('custom_logo'));
        $format_logo = '
            <a class="" href="%s" title="Logo button">
                <img src="%s" srcset="%s" alt="%s">
            </a>
        ';
        $content_logo .= sprintf(
            $format_logo,
            site_url(),
            $logo_src,
            $logo_srcset,
            get_bloginfo('sitename')
        );
    }
    return $content_logo;
}
/**
 * Returns the SITE NAV
 *
 * @param string $pre
 * @return void
 */
function get_site_nav($pre = 'navlinks')
{

    if (get_field('header', 'options')['long_scroll']) {

        // get them fields
        $fields = get_fields(get_option('page_on_front'));

        $return['blocks_links'] = '';

        if (!empty($fields['content_blocks'])) {

            $guide['blocks_links'] = '<li class="navlinks-item"><a class="navlinks-item-link scroll" href="#%s">%s</a></li>';
            $return['blocks_links'] = '<ul class="navlinks nav__spyscroll">';

            foreach ($fields['content_blocks'] as $i => $cB) {
                if ($cB['anchor_enabled']) {
                    $return['blocks_links'] .= sprintf(
                        $guide['blocks_links'],
                        strtolower(str_replace(' ', '_', $cB['anchor_link_text'])),
                        $cB['anchor_link_text']
                    );
                }
            }
            $return['blocks_links'] .= '</ul>';
        }

        return $return['blocks_links'];
    } else {

        // create an unwrapped site nav
        $site__nav = wp_nav_menu(array(
            'menu' => 'nav__header', 'container' => '', 'items_wrap' => '<ul class="nav-menu navlinks">%3$s</ul>', 'walker' => new NavWalker, 'echo' => false
        ));
        return $site__nav;
    }
}
/**
 * TRAINING WIDGET IN DASHBOARD
 */
if (!function_exists('add_dashboard_widgets')) {
    function add_dashboard_widgets()
    {
        wp_add_dashboard_widget('dashboard_questions_comments_widget', 'Questions, Comments, Concerns ?', 'do_create_training_widget');
    }
}
if (!function_exists('do_create_training_widget')) {
    function do_create_training_widget($post, $callback_args)
    {
        ?>
        <a target="_blank" href="http://www.123websites.com/training">
            <img style="width: 100%;" src="http://www.123websites.com/images/training-ad-dashboard.png">
        </a>
    <?php
}
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets');

function wpb_image_editor_default_to_gd( $editors ) {
    $gd_editor = 'WP_Image_Editor_GD';
    $editors = array_diff( $editors, array( $gd_editor ) );
    array_unshift( $editors, $gd_editor );
    return $editors;
}
add_filter( 'wp_image_editors', 'wpb_image_editor_default_to_gd' );


/**
 *       G. PLEASE CLEAN UP THIS JUNK BELOW. 
 */

function get_gmaps_api_key()
{
    return 'AIzaSyCfDxwoigWRerVQMojFfT6nk0MMOYsz8XA';
}



function get_phone_number_1()
{
    $company_info = get_field('company_info', 'options');
    return (!empty($company_info['phone_number_1']) ? $company_info['phone_number_1'] : '');
}

function get_phone_number_2()
{
    $company_info = get_field('company_info', 'options');
    return (!empty($company_info['phone_number_2']) ? $company_info['phone_number_2'] : '');
}

function get_email()
{
    return (!empty($company_info['email']) ? $company_info['email'] : '');
}

function get_social_icons()
{
    $company_info = get_field('company_info', 'options');

    $content_social_icons = '';
    // if we have social media icons
    if (!empty($company_info['social_media'])) {
        $content_social_icons .= '<ul class="site__social-media">';
        $format_social_icons = '
			<li>
				<a href="%s" title="Social icon button" target="_blank">
					%s
				</a>
			</li>
		';
        foreach ($company_info['social_media'] as $social_icon) {
            $url = $social_icon['url'];
            $img = $social_icon['image'];
            $fa = $social_icon['icon'];
            $custom_png_url = '';
            $icon_url = '';
            // we have a preconfigured URL
            if (strpos($url, 'booksy')) {
                $custom_png_url = get_template_directory_uri() . '/library/img/social_icons/booksy.png';
            }
            if (strpos($url, 'groupon')) {
                $custom_png_url = get_template_directory_uri() . '/library/img/social_icons/groupon.png';
            }
            if (strpos($url, 'pinterest')) {
                $custom_png_url = get_template_directory_uri() . '/library/img/social_icons/pinterest.png';
            }
            if (!empty($custom_png_url)) {
                $icon_url = $custom_png_url;
            } else {
                // we have img
                if (!empty($img)) {
                    $icon_url = $img;
                }
                // img is empty, we have fa
                else if (!empty($fa)) {
                    $icon_url = '';
                    $fa_icon = '<i class="fab ' . $fa . '"></i>';
                }
                // img and fa are empty
                // something went wrong...
                else {
                    $icon_url = '';
                }
            }
            if (!empty($url)) {
                $content_social_icons .= sprintf(
                    $format_social_icons,
                    $url,
                    (!empty($icon_url)) ? '<img src="' . $icon_url . '">' : $fa_icon
                );
            }
        }
        $content_social_icons .= '</ul>';
    }
    return $content_social_icons;
}

function get_full_address_br()
{
    $company_info = get_field('company_info', 'options');

    $location = ($company_info['location'] ? $company_info['location'] : '');

    $full_address_br = '';
    if (!empty($location['address_street'])) {
        $street_1 = $location['address_street'];
        $street_2 = $location['address_street_2'];
        $city = $location['address_city'];
        $state = $location['address_state'];
        $postcode = $location['address_postcode'];
        $country = $location['address_country'];

        $format_full_address_br = '%s %s <br/>%s, %s %s';

        $full_address_br = sprintf(
            $format_full_address_br,
            $street_1,
            $street_2,
            $city,
            $state,
            $postcode
            // ,$country
        );
    }

    return $full_address_br;
}

function get_full_address()
{
    $company_info = get_field('company_info', 'options');

    $location = ($company_info['location'] ? $company_info['location'] : '');

    $full_address = '';

    if (!empty($location['address_street'])) {
        $street_1 = $location['address_street'];
        $street_2 = $location['address_street_2'];
        $city = $location['address_city'];
        $state = $location['address_state'];
        $postcode = $location['address_postcode'];
        $country = $location['address_country'];

        $format_full_address = '%s %s, %s, %s %s';

        $full_address = sprintf(
            $format_full_address,
            $street_1,
            $street_2,
            $city,
            $state,
            $postcode
            // ,$country
        );
    }
    return $full_address;
}

function admin_style() {
  wp_enqueue_style('admin-styles', 'https://40fourth.com/wp-backend/backend.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

?>