<?php
include_once(DCS_DIVICAROUSEL_PATH.'/includes/modules/base/base.php');
include_once(DCS_DIVICAROUSEL_PATH.'/includes/modules/base/utils.php');

class DCS_ImageCarousel extends ET_Builder_Module {

	public $slug       = 'divi8_image_carousel';
	public $vb_support = 'on';
	public $child_slug = 'divi8_image_carousel_item';
    use DCS_UTILS;

	protected $module_credits = array(
		'module_uri' => 'https://divicarousels.com/divi-image-carousel/',
		'author'     => 'divicarousels',
		'author_uri' => 'https://divicarousels.com/',
	);


	public function init() {
		$this->name = esc_html__( 'Image Carousel', 'dcs-divicarousel' );
		// $this->icon_path               =  plugin_dir_path( __FILE__ ) . 'content_carousel_pro.svg';
		$this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'carousel_settings' => esc_html__( 'Carousel', 'dcs-divicarousel' ),
					'navigation_settings' => esc_html__( 'Navigation', 'dcs-divicarousel' ),
                    'pagination_settings' => esc_html__( 'Pagination', 'dcs-divicarousel' ),
                    'carousel_effect'    => esc_html__( 'Effect', 'dcs-divicarousel' ),
                	)
				),
				'advanced' => array(
					'toggles' => array(
						'carousel_item_settings' => esc_html__( 'Slider Item', 'dcs-divicarousel' ),
						'carousel_heading_settings' => esc_html__( 'Heading', 'dcs-divicarousel' ),
						'carousel_sub_heading_settings' => esc_html__( 'Sub Heading', 'dcs-divicarousel' ),
						'custom_spacing'        => array(
							'title'             => esc_html__('Custom Spacing', 'dcs-divicarousel' ),
							'tabbed_subtoggles' => true,
							'sub_toggles' => array(
								'wrapper'   => array(
									'name' => 'Wrapper',
								),
								'content'     => array(
									'name' => 'Content',
								)
							)
						)
					)
				)
        );
	}

	public function get_advanced_fields_config() {
        return array(
            'text'  => false,
            'fonts' => array(
                'heading' => array(
                    'css' => array(
                        'main' => '%%order_class%% .img_caro span',
						'important' => 'all'
                    ),
                    'toggle_slug' => 'carousel_heading_settings'
                ),
                'sub_heading' => array(
                    'css' => array(
                        'main' => '%%order_class%% .img_caro p',
						'important' => 'all'
                    ),
                    'toggle_slug' => 'carousel_sub_heading_settings'
                )
            ),
            'max_width' => false,
            'borders' => array(
                'default' => array(
                    'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .divi8_image_carousel_item',
							'border_styles' => '%%order_class%% .divi8_image_carousel_item',
                        ),
                    ),
                ),
                'image_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .carousel_content img',
							'border_styles' => '%%order_class%% .carousel_content img',
                        ),
                    ),
					'label_prefix' => esc_html__( 'Image', 'dcs-divicarousel' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'carousel_image_icon_settings',
                ),
				
				'item_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .divi8_image_carousel_item',
							'border_styles' => '%%order_class%% .divi8_image_carousel_item',
                        ),
                    ),
					'label_prefix' => esc_html__( 'Item', 'dcs-divicarousel' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'carousel_item_settings',
                ),
                'text_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .divi8_heading',
							'border_styles' => '%%order_class%% .divi8_heading',
                        ),
                    ),
					'label_prefix' => esc_html__( 'Text', 'dcs-divicarousel' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'carousel_heading_settings',
                ),
                'content_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .carousel_content p',
							'border_styles' => '%%order_class%% .carousel_content p',
                        ),
                    ),
					'label_prefix' => esc_html__( 'Content', 'dcs-divicarousel' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'carousel_content_settings',
				),

            ),
			'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .carousel_content',
                        'important' => 'all',
                    ),
                ),
                'item' => array(
                    'label_prefix' => esc_html__("Item Box Shadow", 'dcs-divicarousel'),
                    'css' => array(
                        'main' => '%%order_class%% .carousel_content',
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'carousel_item_settings'
                ),
				'image_box_shadow' => array(
                    'css'          => array(
                        'main' => '%%order_class%% .carousel_content img ',
                        'important' => 'all'
                    ),
					'label_prefix' => esc_html__( 'Image', 'dcs-divicarousel' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'carousel_image_icon_settings',
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main' => '%%order_class%% .carousel_content',
                ),
                'important' => 'all',
            ),
            'background' => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
				'default' => array(
					'css' => array(
						'main' => "%%order_class%% .carousel_content",
						'important' => 'all',
					),
				),
            ),
        );
    }	

	public function get_fields() {
		$fields = [];
		// Carousel Settings
		$fields['divi8_carousel_effects_types'] = [
			'label' => esc_html__( "Carousel Type", 'dcs-divicarousel'  ),
			'type'           => 'select',
			'option_category'=> 'basic_option',
			'options' => array(
			    'slide' => esc_html__('Slide', 'dcs-divicarousel'),
				'coverflow' => esc_html__('Coverflow', 'dcs-divicarousel'),

			),
			'default'        => 'Slide',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_sliderperview'] = [
			'label' => esc_html__( "Slide Per View", 'dcs-divicarousel'  ),
			'type'            => 'text',
			'option_category' => 'basic_option',
			'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dcs-divicarousel' ),
			'default'         => '3',
			'default_on_front' => '3',
			'mobile_options'   => true,
			'responsive'       => true,
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_sliderspeed'] = [
			'label' => esc_html__( "Carousel Speed (ms)", 'dcs-divicarousel'  ),
			'type'            => 'range',
			'mobile_options'  		=> true,
			'range_settings'  => array(
				'step' => 1,
				'min'  => 50,
				'max'  => 7000,
			),
			'default'         => '400',
			'fixed_unit'      => '',
			'validate_unit'   => false,
			'unitless'        => true,
			'show_if' => array(
				'divi8_autoplay' => 'on',
			),
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_sliderspcbtn'] = [
			'label' => esc_html__( "Item Space Between", 'dcs-divicarousel'  ),
			'type'            => 'range',
			'mobile_options'  		=> true,
			'range_settings'  => array(
				'step' => 1,
				'min'  => 0,
				'max'  => 50,
			),
			'default'         => '15',
			'fixed_unit'      => '',
			'validate_unit'   => false,
			'unitless'        => true,
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_autoplay'] = [
			'label' => esc_html__( "Auto Play", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('On', 'dcs-divicarousel'),
				'off' => esc_html__('Off', 'dcs-divicarousel'),
			),
			'affects' => array(
				'divi8_slider_autoplaydelay',
			),
			'default' => 'on',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_slider_autoplaydelay'] = [
			'label' => esc_html__( "Auto Play Delay (ms)", 'dcs-divicarousel'  ),
			'type'            => 'range',
			'mobile_options'  		=> true,
			'range_settings'  => array(
				'step' => 1,
				'min'  => 100,
				'max'  => 7000,
			),
			
			'default'         =>'3000',
			'show_if' => array(
				'divi8_autoplay' => 'on',
			),
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_autoplay_loop'] = [
			'label' => esc_html__( "Slider Loop", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_centered_slides'] = [
			'label' => esc_html__( "Center Slide", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_auto_height'] = [
			'label' => esc_html__( "Auto Height", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		$fields['divi8_autoplay_pause'] = [
			'label' => esc_html__( "Pause On Hover", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'carousel_settings',
		];
		//Heading Subheading show hide
		$fields['divi8_text_show_hide'] = [
        			'label' => esc_html__( "Text Show/Hide", 'dcs-divicarousel'  ),
        			'type'            => 'yes_no_button',
        			'options' => array(
        				'on' => esc_html__('Yes', 'dcs-divicarousel'),
        				'off' => esc_html__('No', 'dcs-divicarousel'),
        			),
        			'default'          => 'on',
        			'toggle_slug'      => 'carousel_settings',
        ];

		// Pagination Start from here 
		$fields['divi8_nav_show_hide'] = [
			'label' => esc_html__( "Pagination Show/Hide", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'toggle_slug'      => 'pagination_settings',
		];
		$fields['divi8_nav_grab_cursor'] = [
			'label' => esc_html__( "Use Grab Cursor", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'toggle_slug'      => 'pagination_settings',
			'show_if'      => array(
				'divi8_nav_show_hide' => 'on'
			)
		];
		$fields['divi8_nav_keyboard'] = [
			'label' => esc_html__( "Use Keyboard Navigation", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'toggle_slug'      => 'pagination_settings',
			'show_if'      => array(
				'divi8_nav_show_hide' => 'on'
			)
		];
		$fields['divi8_nav_mousewheel'] = [
			'label' => esc_html__( "Use Mouse Wheel Navigation", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'toggle_slug'      => 'pagination_settings',
			'show_if'      => array(
				'divi8_nav_show_hide' => 'on'
			)
		];
		$fields['divi8_pagi_alignment'] = [
			'label'           => esc_html__( 'Pagination Alignment', 'dcs-divicarousel' ),
			'description'     => esc_html__( 'Align to the left, right or center.', 'dcs-divicarousel' ),
			'type'            => 'align',
			'option_category' => 'layout',
			'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
			'toggle_slug'     => 'pagination_settings',
			'default'         => 'center',
		];
		$fields['divi8_nav_bullettype'] = [
			'label' => esc_html__( "Bullet Type", 'dcs-divicarousel'  ),
			'type'           => 'select',
			'option_category'=> 'basic_option',
			'options'        => array(
				'bullets' => esc_html__( 'Bullets',  'dcs-divicarousel' ),
				'fraction'   => esc_html__( 'Fraction', 'dcs-divicarousel' ),
				'long_active'   => esc_html__( 'Long Active', 'dcs-divicarousel' ),
			),
			'default'        => 'bullets',
			'toggle_slug'      => 'pagination_settings',
			'show_if'      => array(
				'divi8_nav_show_hide' => 'on'
			)
		];
		$fields['divi8_nav_dynamicbullet'] = [
			'label' => esc_html__( "Dynamic Bullet", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'toggle_slug'      => 'pagination_settings',
			'show_if'      => array(
				'divi8_nav_bullettype' => 'bullets',
				'divi8_nav_show_hide' => 'on'
			)
		];
		// Bullet Color
		$fields['divi8_pagi_bullet_color'] = [
			'label' => esc_html__( "Bullet Color", 'dcs-divicarousel'  ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'default'      => '#536171',
			'toggle_slug'      => 'pagination_settings',
			'option_category' => 'basic_option',
			'show_if'      => array(
				'divi8_nav_bullettype' => array('bullets', 'long_active'),
				'divi8_nav_show_hide' => 'on'
			)
		];
		$fields['divi8_pagi_progressbar_fill_color'] = [
			'label' => esc_html__( "Progressbar Fill Color", 'dcs-divicarousel'  ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'default'      => '#536171',
			'toggle_slug'      => 'pagination_settings',
			'option_category' => 'basic_option',
			'show_if'      => array(
				'divi8_nav_bullettype' => 'progressbar',
				'divi8_nav_show_hide' => 'on'
			)
		];
		$fields['divi8_pagi_size'] = [
			'label'           => esc_html__( 'Bullet Size', 'dcs-divicarousel' ),
			'type'            => 'range',
			'option_category' => 'basic_option',
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 100,
			),
			'default'         => '10',
			'toggle_slug'      => 'pagination_settings',
			'show_if'      => array(
				'divi8_nav_bullettype' => array('bullets', 'long_active'),
				'divi8_nav_show_hide' => 'on'
			)
		];
		//Effect Settings
		$fields['divi8_effect_slideshadow'] = [
			'label' => esc_html__( "Slider Shadow", 'dcs-divicarousel'  ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'toggle_slug'      => 'carousel_effect',
		];
		$fields['divi8_effect_slideshadow_dark'] = [
			'label' => esc_html__( "Shadow Color Dark", 'dcs-divicarousel'  ),
			'type'            => 'color-alpha',
			'custom_color' => true,
			'default'      => '#0c71c3',
			'toggle_slug'      => 'carousel_effect',
			'option_category' => 'basic_option',
			'show_if'      => array(
				'divi8_effect_slideshadow' => 'on'
			),
			'default'           => 'rgba(0,0,0,1)'
		];
		$fields['divi8_effect_slideshadow_light'] = [
			'label' => esc_html__( "Shadow Color Light", 'dcs-divicarousel'  ),
			'type'            => 'color-alpha',
			'custom_color' => true,
			'default'      => '#0c71c3',
			'toggle_slug'      => 'carousel_effect',
			'option_category' => 'basic_option',
			'show_if'      => array(
				'divi8_effect_slideshadow' => 'on'
			),
			'default'           => 'rgba(0,0,0,0)'
		];
		$fields['divi8_effect_sliderotate'] = [
			'label' => esc_html__( "Slide Rotate", 'dcs-divicarousel'  ),
			'type'            => 'range',
			'mobile_options'  		=> true,
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 1000,
			),
			'default'         => '0',
			'fixed_unit'      => '',
			'validate_unit'   => false,
			'unitless'        => true,
			'toggle_slug'      => 'carousel_effect',
		];
		$fields['divi8_effect_slidestretch'] = [
			'label' => esc_html__( "Slide Stretch", 'dcs-divicarousel'  ),
			'type'            => 'range',
			'mobile_options'  		=> true,
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 1000,
			),
			'default'         => '0',
			'fixed_unit'      => '',
			'validate_unit'   => false,
			'unitless'        => true,
			'toggle_slug'      => 'carousel_effect',
		];
		$fields['divi8_effect_slidedepth'] = [
			'label' => esc_html__( "Slide Depth", 'dcs-divicarousel'  ),
			'type'            => 'range',
			'mobile_options'  		=> true,
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 1000,
			),
			'default'         => '300',
			'fixed_unit'      => '',
			'validate_unit'   => false,
			'unitless'        => true,
			'toggle_slug'      => 'carousel_effect',
		];
		//Advance 

		// Arrow Start
		$fields['divi8_arrow_show_hide'] = [
			'label' => esc_html__( "Navigation Show/Hide", 'dcs-divicarousel' ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'on',
			'toggle_slug'      => 'navigation_settings',
		];
		$fields['divi8_arrow_icon_show_hide'] = [
			'label' => esc_html__( "Custom Arrow Icon", 'dcs-divicarousel' ),
			'type'            => 'yes_no_button',
			'options' => array(
				'on' => esc_html__('Yes', 'dcs-divicarousel'),
				'off' => esc_html__('No', 'dcs-divicarousel'),
			),
			'default'          => 'off',
			'toggle_slug'      => 'navigation_settings',
		];
		$fields['divi8_left_icon'] 	= [
			'label'               => esc_html__( 'Left Icon', 'dcs-divicarousel' ),
			'type'                => 'select_icon',
			'default'			  => '%%19%%',
			'option_category'     => 'basic_option',
			'class'               => array( 'et-pb-font-icon' ),
			'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'dcs-divicarousel' ),
			'depends_show_if'     => 'off',
			'mobile_options'      => true,
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_icon_show_hide' => 'on'
			)
		];
		$fields['divi8_right_icon'] 	= [
			'label'               => esc_html__( 'Right Icon', 'dcs-divicarousel' ),
			'type'                => 'select_icon',
			'default'			  => '%%20%%',
			'option_category'     => 'basic_option',
			'class'               => array( 'et-pb-font-icon' ),
			'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'dcs-divicarousel' ),
			'depends_show_if'     => 'off',
			'mobile_options'      => true,
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_icon_show_hide' => 'on'
			)
		];
		$fields['divi8_arrow_position_vertical'] = [
			'label' => esc_html__( "Vertical Position", 'dcs-divicarousel'  ),
			'type'           => 'select',
			'option_category'=> 'basic_option',
			'options' => array(
				'center' => esc_html__('Center', 'dcs-divicarousel'),
				'top' => esc_html__('Top', 'dcs-divicarousel'),
				'bottom' => esc_html__('Bottom', 'dcs-divicarousel'),
			),
			'default'        => 'center',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		$fields['divi8_arrow_position_horizontal'] = [
			'label' => esc_html__( "Horizontal Position", 'dcs-divicarousel'  ),
			'type'           => 'select',
			'option_category'=> 'basic_option',
			'options' => array(
				'space-between' => esc_html__('Justified', 'dcs-divicarousel'),
				'flex-start' => esc_html__('Left', 'dcs-divicarousel'),
				'flex-end' => esc_html__('Right', 'dcs-divicarousel'),
				'center' => esc_html__('Center', 'dcs-divicarousel'),
				'space-around' => esc_html__('Space Around', 'dcs-divicarousel'),
				'space-evenly' => esc_html__('Space Evenly', 'dcs-divicarousel'),
			),
			'default'         => 'space-between',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		$fields['divi8_icon_size'] = [
			'label'           => esc_html__( 'Icon Size', 'dcs-divicarousel' ),
			'type'            => 'range',
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 100,
			),
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'default'         => '44',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		$fields['divi8_arrow_padding'] = [
			'label'           => esc_html__( 'Background Size', 'dcs-divicarousel' ),
			'type'            => 'range',
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 100,
			),
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'default'         => '20',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		$fields['divi8_arrow_padding_hover'] = [
			'label'           => esc_html__( 'Background Size Hover', 'dcs-divicarousel' ),
			'type'            => 'range',
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 100,
			),
			'fixed_unit'      => '',
			'validate_unit'   => false,
			'unitless'        => true,
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'default'         => '20',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		$fields['divi8_arrow_border_radius'] = [
			'label'           => esc_html__( 'Radius', 'dcs-divicarousel' ),
			'type'            => 'range',
			'range_settings'  => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 100,
			),
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'default'         => '2',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		// Arrow Color
		$fields['divi8_arrow_color'] = [
			'label' => esc_html__( "Icon Color", 'dcs-divicarousel'  ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'default'      => '#E7E8ED',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		$fields['divi8_arrow_color_hover'] = [
			'label' => esc_html__( "Icon Color Hover", 'dcs-divicarousel'  ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'default'      => '#E7E8ED',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		// Arrow Background Color
		$fields['divi8_arrow_background'] = [
			'label'           => esc_html__( 'Background Color', 'dcs-divicarousel' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'default'      => '#BCBCBC',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];
		// Arrow Background Color Hover
		$fields['divi8_arrow_background_hover'] = [
			'label'           => esc_html__( 'Background Color Hover', 'dcs-divicarousel' ),
			'type'         => 'color-alpha',
			'custom_color' => true,
			'default'      => '#88c4dd',
			'toggle_slug' => 'main_content',
			'option_category' => 'basic_option',
			'toggle_slug'      => 'navigation_settings',
			'show_if'      => array(
				'divi8_arrow_show_hide' => 'on'
			)
		];


		// Custom Spacing
		$fields['wrapper_spacing_margin'] = [
			'label'           		=> esc_html__('Wrapper Margin', 'dcs-divicarousel'),
			'type'            		=> 'custom_margin',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
        $fields['wrapper_spacing_padding'] = [
			'label'           		=> esc_html__('Wrapper Padding', 'dcs-divicarousel'),
			'type'            		=> 'custom_padding',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
		$fields['item_spacing_margin'] = [
			'label'           		=> esc_html__('Item Wrapper Margin', 'dcs-divicarousel'),
			'type'            		=> 'custom_margin',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
        $fields['item_spacing_padding'] = [
			'label'           		=> esc_html__('Item Wrapper Padding', 'dcs-divicarousel'),
			'type'            		=> 'custom_padding',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
		$fields['nav_spacing_margin'] = [
			'label'           		=> esc_html__('Navigation Wrapper Margin', 'dcs-divicarousel'),
			'type'            		=> 'custom_margin',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
        $fields['navi_spacing_padding'] = [
			'label'           		=> esc_html__('Navigation Wrapper Padding', 'dcs-divicarousel'),
			'type'            		=> 'custom_padding',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
		$fields['pagi_spacing_margin'] = [
			'label'           		=> esc_html__('Pagination Wrapper Margin', 'dcs-divicarousel'),
			'type'            		=> 'custom_margin',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
        $fields['pagi_spacing_padding'] = [
			'label'           		=> esc_html__('Pagination Wrapper Padding', 'dcs-divicarousel'),
			'type'            		=> 'custom_padding',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
		$fields['img_caro_text_margin'] = [
			'label'           		=> esc_html__('Heading Wrapper Margin', 'dcs-divicarousel'),
			'type'            		=> 'custom_margin',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
        $fields['img_caro_text_padding'] = [
			'label'           		=> esc_html__('Heading Wrapper Padding', 'dcs-divicarousel'),
			'type'            		=> 'custom_padding',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'wrapper'
		];
		$fields['divi8_title_padding'] = [
			'label'           		=> esc_html__('Heading Padding', 'dcs-divicarousel'),
			'type'            		=> 'custom_padding',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'content'
			// 'show_if'      => array(
			// 	'divi8_contnt_show_hide' => 'on'
			// )
		];
		$fields['divi8_title_margin'] = [
			'label'           		=> esc_html__('Heading Margin', 'dcs-divicarousel'),
			'type'            		=> 'custom_margin',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'        		=> 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'content'
		];

		$fields['divi8_content_padding'] = [
			'label'           		=> esc_html__('Sub Heading Padding', 'dcs-divicarousel'),
			'type'            		=> 'custom_padding',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'content'
		];
		$fields['divi8_content_margin'] = [
			'label'           		=> esc_html__('Sub Heading Margin', 'dcs-divicarousel'),
			'type'            		=> 'custom_margin',
			'mobile_options'  		=> true,
			'hover'           		=> 'tabs',
			'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'option_category' 		=> 'layout',
			'tab_slug'     => 'advanced',
			'toggle_slug'      => 'custom_spacing',
			'sub_toggle'    => 'content'
		];
		return $fields;
	}

	public function before_render(){

	}
	public function  leftIconShow(){
		if ($this->props["divi8_left_icon"]){
		  $icon = "<i class='et-pb-icon divi8-icon-left'>";
		  $icon .=	esc_attr( et_pb_process_font_icon($this->props['divi8_left_icon']));
		  $icon .= "</i>";
		}else{
			$icon = "<i class='et-pb-icon divi8-icon-left'>5</i>";
		}
		return $icon;
	}
	public function  rightIconShow(){
		if ($this->props["divi8_right_icon"]){
		  $icon = "<i class='et-pb-icon divi8-icon-right'>";
		  $icon .=	esc_attr( et_pb_process_font_icon($this->props['divi8_right_icon']));
		  $icon .= "</i>";
		}else{
			$icon = "<i class='et-pb-icon divi8-icon-right'>5</i>";
		}
		return $icon;
	}
	public function render($attrs, $content = null , $render_slug) {
		// global $carousel_data;
		$divi8_autoplay_show_hide = "on" === $this->props['divi8_autoplay'];
        $divi8_autoplay_delay = $this->props['divi8_slider_autoplaydelay'];
		$divi8_coverflow_speed = $this->props['divi8_sliderspeed'];
        $divi8_coverflow_loop = $this->props['divi8_autoplay_loop'];
		$divi8_coverflow_direction = "horizontal";
        $divi8_coverflow_slides_perview_desktop = $this->props['divi8_sliderperview'];
        $divi8_coverflow_slides_perview_desktop_tablet = $this->props['divi8_sliderperview_tablet'];
        $divi8_coverflow_slides_perview_desktop_phone = $this->props['divi8_sliderperview_phone'];
		$divi8_coverflow_slides_perview_last_edited = $this->props['divi8_sliderperview_last_edited'];
        $divi8_coverflow_sliderotate = $this->props['divi8_effect_sliderotate'];
        $divi8_coverflow_slidestretch = $this->props['divi8_effect_slidestretch'];
        $divi8_coverflow_slidedepth = $this->props['divi8_effect_slidedepth'];
		$divi8_effect_slideshadow = $this->props['divi8_effect_slideshadow'];
		$divi8_pagination_type = $this->props['divi8_nav_bullettype'];
        $divi8_pagination_dynamicbullet = $divi8_pagination_type === 'bullets' ? $this->props['divi8_nav_dynamicbullet'] : "off";
        $divi8_space_between = $this->props['divi8_sliderspcbtn'];
		$divi8_centered_slides =  "on" === $this->props['divi8_centered_slides'];
        $divi8_auto_height = $this->props['divi8_auto_height'];
        $divi8_autoplay_pause = "on" === $this->props['divi8_autoplay_pause'];
		$divi8_grab_cursor = $this->props['divi8_nav_grab_cursor'];
		$divi8_nav_keyboard = $this->props['divi8_nav_keyboard'];
        $divi8_nav_mousewheel = $this->props['divi8_nav_mousewheel'];
		$divi8_pagi_bullet_color = $this->props['divi8_pagi_bullet_color'];
		$divi8_pagi_progressbar_fill_color = $this->props['divi8_pagi_progressbar_fill_color'];
		$divi8_pagi_size = $this->props['divi8_pagi_size'];
		$divi8_pagi_margin = $this->props['divi8_pagi_margin'] ?? 0;
		$divi8_pagi_padding = $this->props['divi8_pagi_padding'] ?? 0;
		$divi8_arrow_color = $this->props['divi8_arrow_color'];
		$divi8_arrow_color_hover = $this->props['divi8_arrow_color_hover'];
		$divi8_arrow_background = $this->props['divi8_arrow_background'];
		$divi8_arrow_background_hover = $this->props['divi8_arrow_background_hover'];
		$divi8_arrow_padding = $this->props['divi8_arrow_padding'];
		$divi8_arrow_padding_hover = $this->props['divi8_arrow_padding_hover'];
		$divi8_arrow_border_radius = $this->props['divi8_arrow_border_radius'];
		$divi8_effects_types = $this->props['divi8_carousel_effects_types'];
		$divi8_icon_size = $this->props['divi8_icon_size'];

        if ( '' !== $divi8_coverflow_slides_perview_desktop_tablet || '' !== $divi8_coverflow_slides_perview_desktop_phone || '' !== $divi8_coverflow_slides_perview_desktop ) {
			$is_responsive = et_pb_get_responsive_status( $divi8_coverflow_slides_perview_last_edited );

			$slide_to_show_values = array(
				'desktop' => $divi8_coverflow_slides_perview_desktop,
				'tablet'  => $is_responsive ? $divi8_coverflow_slides_perview_desktop_tablet : '',
				'phone'   => $is_responsive ? $divi8_coverflow_slides_perview_desktop_phone : '',
			);
        }


		if ($this->props["divi8_nav_show_hide"] == "on"){
			$pagination_show_hide = "block";
		}else{
			$pagination_show_hide = "none";
		}
		if ($this->props["divi8_arrow_show_hide"] == "on"){
			$pagi_show_hide = "";
		}else{
			$pagi_show_hide = "none";
		}
		if ($this->props["divi8_text_show_hide"] == "on"){
        	$text_show_hide = "";
        }else{
        	$text_show_hide = "none";
        }
		//pagination
		$pagination_class = "swiper-pagination ";
        if( $divi8_pagination_type === "bullets" && $divi8_pagination_dynamicbullet === "on"){
            $pagination_class .= "swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-bullets-dynamic";
        }else if($divi8_pagination_type === "bullets") {
            $pagination_class .= "swiper-pagination-clickable swiper-pagination-bullets";
        }else if($divi8_pagination_type === "fraction") {
            $pagination_class .= "swiper-pagination-fraction";
        }else if($divi8_pagination_type === "long_active"){
			$divi8_pagination_type = "bullets";
			$pagination_class .= "swiper-pagination-clickable swiper-pagination-bullets";
			$divi8_pagination_active = sprintf('width: 25px !important; height: %1$spx; border-radius: 4px;', esc_attr($divi8_pagi_size));
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .swiper-pagination-bullet-active",
				'declaration' => $divi8_pagination_active,
			) );
		}

		// ARROW STYLES 
		$divi8_arrow_styles_left = sprintf('display: %1$s !important;color: %2$s !important;padding: %3$spx; background-color: %4$s !important; border-radius: %5$spx;', 
		esc_attr($pagi_show_hide),
		esc_attr($divi8_arrow_color),
		esc_attr($divi8_arrow_padding),
		esc_attr($divi8_arrow_background),
		esc_attr($divi8_arrow_border_radius)
		);
		$divi8_arrow_styles_right = sprintf('display: %1$s !important;color: %2$s !important;padding: %3$spx; background-color: %4$s !important; border-radius: %5$spx;', 
		esc_attr($pagi_show_hide),
		esc_attr($divi8_arrow_color),
		esc_attr($divi8_arrow_padding),
		esc_attr($divi8_arrow_background),
		esc_attr($divi8_arrow_border_radius)
		);
		$divi8_arrow_background_hover_color_style = sprintf('background-color: %1$s !important;padding: %2$spx; color: %3$s !important;', esc_attr($divi8_arrow_background_hover),esc_attr($divi8_arrow_padding_hover),esc_attr($divi8_arrow_color_hover));
		$divi8_pagination_margin_style = sprintf('margin: %1$spx;position: relative;display: %2$s !important;text-align: %3$s',esc_attr($divi8_pagi_margin),esc_attr($pagination_show_hide),esc_attr($this->props["divi8_pagi_alignment"]));
		$divi8_pagination_color_size_style = sprintf('height: %1$spx;background-color:  %2$s ', esc_attr($divi8_pagi_size), esc_attr($divi8_pagi_bullet_color));
		$divi8_pagi_bullet_color_style = sprintf('width: %1$spx;height: %2$spx;background-color: %3$s;', esc_attr($divi8_pagi_size), esc_attr($divi8_pagi_size),esc_attr($divi8_pagi_bullet_color));
		$divi8_icon_size_style = sprintf('font-size: %1spx !important;',esc_attr($divi8_icon_size));
		$divi8_text_show_hide_style = sprintf('display: %1$s !important;',esc_attr($text_show_hide));
		ET_Builder_Element::set_style( $render_slug, array(
		 'selector'    => "%%order_class%% .swiper-button-prev",
		 'declaration' => $divi8_arrow_styles_left,
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .swiper-button-next",
			'declaration' => $divi8_arrow_styles_right,
		   ) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .swiper-button-prev:hover, %%order_class%% .swiper-button-next:hover",
			'declaration' => $divi8_arrow_background_hover_color_style,
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .swiper-button-prev:after, %%order_class%% .swiper-button-next:after",
			'declaration' => $divi8_icon_size_style,
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .swiper-pagination",
			'declaration' => $divi8_pagination_margin_style,
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .swiper-pagination .swiper-pagination-clickable .swiper-pagination-bullets",
			'declaration' => $divi8_pagination_color_size_style,
		) );
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .swiper-pagination-bullet",
			'declaration' => $divi8_pagi_bullet_color_style,
		) );
		ET_Builder_Element::set_style( $render_slug, array(
        	'selector'    => "%%order_class%% .img_caro_text",
        	'declaration' => $divi8_text_show_hide_style,
        ) );


		ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-left',
            'declaration' => sprintf(
                'background-image: linear-gradient(to left,%1$s,%2$s);',
                $this->props['divi8_effect_slideshadow_dark'],
                $this->props['divi8_effect_slideshadow_light']
            )
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .swiper-container-3d .swiper-slide-shadow-right',
            'declaration' => sprintf(
                'background-image: linear-gradient(to right,%1$s,%2$s);',
                $this->props['divi8_effect_slideshadow_dark'],
                $this->props['divi8_effect_slideshadow_light']
            )
        ));
		ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .swiper-navi-container',
            'declaration' => sprintf('justify-content: %1$s;',$this->props['divi8_arrow_position_horizontal'])
        ));
		if ($this->props["divi8_arrow_position_vertical"] == "top"){
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => '%%order_class%% .swiper-navi-container',
				'declaration' => 'top: 0%;'
			));
		  }
		  if ($this->props["divi8_arrow_position_vertical"] == "bottom"){
			ET_Builder_Element::set_style($render_slug, array(
				'selector' => '%%order_class%% .swiper-navi-container',
				'declaration' => 'top: auto;'
			));
		  }
		  ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .divi8-icon-right, %%order_class%% .divi8-icon-left",
			'declaration' => $divi8_icon_size_style,
		) );
		// custom spacing

		$output_carousel = sprintf('<div class="own">
			<div class="swiper-container imageswiper" data-slideperview="%1$s|%2$s|%3$s"
			 data-direction="%4$s" 
			 data-loop="%5$s" 
			 data-spacebetween="%6$s" 
			 data-effects="%7$s" 
			 data-coverflow-rotation="%8$s" 
			 data-coverflowstretch="%9$s"  
			 data-coverflowdepth="%10$s" 
			 data-coverflowshadow="%11$s" 
			 data-coverflowmodifier="%12$s" 
			 data-grabcursor="%13$s" 
			 data-centerslides="%14$s"  
			 data-zoom="%15$s" 
			 data-speed="%16$s" 
			 data-autoplay="%17$s" 
			 data-autoplay-delay="%18$s" 
			 data-observer="%19$s" 
			 data-pagi-dynamicbullets="%20$s" 
			 data-pagi-type="%21$s" 
			 data-mousewheel="%22$s"
			 data-keyboard="%23$s"
			 data-autoplay_pause="%24$s"
			 data-effects-type="%25$s"
			 ><div class="swiper-wrapper">',
            esc_attr($divi8_coverflow_slides_perview_desktop), //1
			'' !== $slide_to_show_values['tablet'] ? esc_attr( $slide_to_show_values['tablet'] ) : 1, //2
			'' !== $slide_to_show_values['phone'] ? esc_attr( $slide_to_show_values['phone'] ) : 1, //3
            esc_attr( $divi8_coverflow_direction ), //4
            esc_attr( $divi8_coverflow_loop ), // 5
            esc_attr( $divi8_space_between ), //6
            esc_attr( $divi8_effects_types ), // 7
            esc_attr( $divi8_coverflow_sliderotate ), // 8
            esc_attr( $divi8_coverflow_slidestretch ),//9
            esc_attr( $divi8_coverflow_slidedepth ), // 10
            esc_attr( $divi8_effect_slideshadow ), // 11
            1, // 12
            esc_attr( $divi8_grab_cursor ), //13
            esc_attr( $divi8_centered_slides ), // 14
            True, // 15
            esc_attr( $divi8_coverflow_speed ), // 16
            esc_attr( $divi8_autoplay_show_hide ), // 17
            $divi8_autoplay_delay, // 18
            True, // 19
            $divi8_pagination_dynamicbullet, //20
            $divi8_pagination_type, // 21
            $divi8_nav_mousewheel, // 22
            $divi8_nav_keyboard, // 23
			$divi8_autoplay_pause, //24
			$divi8_effects_types //25
        );
		$output_carousel .= $this->content;
		$output_carousel .= '</div>
			</div>
			<div class="swiper-navi-container">
				<div class="swiper-button-prev">'. $this->leftIconShow() .'</div>
				<div class="swiper-button-next">'. $this->rightIconShow() .'</div>
			</div>
			<div class="swiper-pagination"></div>
			<div class="swiper-progress-bar"></div>
		</div>';
		$this->apply_css($render_slug);
		return sprintf(
			'<div> %1$s </div> ', $output_carousel
		);
	}
	public function apply_css($render_slug){

		/**
		 * Custom Padding Margin Output
		 *
		*/
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "divi8_title_padding", "%%order_class%% .carousel_content span", "padding");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "divi8_title_margin", "%%order_class%% .carousel_content span", "margin");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "divi8_content_padding", "%%order_class%% .carousel_content p", "padding");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "divi8_content_margin", "%%order_class%% .carousel_content p", "margin");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "img_caro_text_padding", "%%order_class%% .img_caro_text", "padding");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "img_caro_text_margin", "%%order_class%% .img_caro_text", "margin");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "wrapper_spacing_margin", "%%order_class%% .own", "margin");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "wrapper_spacing_padding", "%%order_class%% .own", "padding");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "item_spacing_margin", "%%order_class%% .divi8_content_carousel_item", "margin");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "item_spacing_padding", "%%order_class%% .divi8_content_carousel_item", "padding");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "nav_spacing_margin", "%%order_class%% .swiper-navi-container", "margin");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "navi_spacing_padding", "%%order_class%% .swiper-navi-container", "padding");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "pagi_spacing_margin", "%%order_class%% .swiper-pagination", "margin");
		BaseDCSCarousel::basecarouse8_set_style($render_slug, $this->props, "pagi_spacing_padding", "%%order_class%% .swiper-pagination", "padding");
	}
}


new DCS_ImageCarousel;