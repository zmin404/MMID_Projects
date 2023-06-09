<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_RT_Accordions extends Widget_Base {

	public function get_name() {
		return 'rt-accordions';
	}

	public function get_title() {
		return "[RT] ".esc_html_x( 'Accordion', 'Adnin Panel', 'businesslounge' );
	}

	public function get_categories() {
		return [ 'rt-elementor-addons' ];
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	protected function _register_controls() {

		// Content Controls
  		$this->start_controls_section(
  			'RT_accordion_content',
  			[
  				'label' => esc_html_x( 'Accordion','Admin Panel','businesslounge' )
  			]
  		); 
  
		$this->add_control(
			'style',
				[	
					'type'    => Controls_Manager::SELECT,
					'label'   => esc_html_x( 'Accordion Style', 'Admin Panel', 'businesslounge' ),
					'default' => 'numbered',
					'options' => array( 
									"numbered" => esc_html_x("Numbered", 'Admin Panel','businesslounge'),
									"icons" => esc_html_x("With Icons", 'Admin Panel','businesslounge'),
									"only_captions" => esc_html_x("Captions Only", 'Admin Panel','businesslounge'),  
								),
			]
		); 

		$this->add_control(
			'first_one_open',
			[
				'label' => esc_html_x("First one open", 'Admin Panel','businesslounge'),
				'type' => Controls_Manager::SWITCHER,
				'description' => esc_html_x('Keep the first section opened when the page loaded.', 'Admin Panel','businesslounge' ),
				'label_on' => esc_html_x("ON", 'Admin Panel','businesslounge'),
				'label_off' => esc_html_x("OFF", 'Admin Panel','businesslounge'),
				'return_value' => 'true',
			]
		); 		


			$this->add_control(
				'accordion_items',
				[
					'label' => esc_html_x( 'Accordion Items','Admin Panel','businesslounge' ),
					'type' => Controls_Manager::REPEATER,
					'default' => [
						[
							'title' => esc_html_x( 'Title', 'Admin Panel', 'businesslounge' ),
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
						],
						[
							'title' => esc_html_x( 'Title', 'Admin Panel', 'businesslounge' ),
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
						],
						[
							'title' => esc_html_x( 'Title', 'Admin Panel', 'businesslounge' ),
							'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
						]	
					],																										
					'fields' => [
						[
							'name' => 'title',
							'label' => esc_html_x( 'Title', 'Admin Panel', 'businesslounge' ),
							'type' => Controls_Manager::TEXT,
							'default' => esc_html_x( 'Title', 'Admin Panel', 'businesslounge' ),
							'placeholder' => esc_html_x( 'Title', 'Admin Panel', 'businesslounge' ),
							'label_block' => true,
						],
						[
							'name' => 'content',
							'label' => esc_html_x( 'Content', 'Admin Panel', 'businesslounge' ), 
							'type' => Controls_Manager::WYSIWYG,
							'show_label' => false,
						],
						[	
							'name' => 'icon_name',
							'label' => esc_html_x("Icon", 'Admin Panel','businesslounge'),
							'type' => Controls_Manager::ICON,
							'return_value' => 'true',			
						]

					],
					'title_field' => '{{{ title }}}',
				]
		);

		$this->end_controls_section();  
	}

	protected function render( ) {

		$settings = $this->get_settings(); 
		$panes = ""; 
		$count = 1;

		foreach ( $settings["accordion_items"] as $accordion ) {

			extract($accordion);

			//id attr
			$id_attr = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";

			//class
			$class = ($settings["first_one_open"] && $count==1) ? " open" : "";

			$panes .= '<li '.$id_attr.' class="'.sanitize_html_class($class).'">'; 
			$panes .= '<div class="toggle-head">';
			
			$panes .= $settings["style"] == "numbered" ? '<div class="toggle-number">'.$count.'</div>' : "";
			$panes .= $settings["style"] == "icons" ? '<div class="toggle-title"><span class="'.$icon_name.'"></span>'.$title.'</div>' : '<div class="toggle-title">'.$title.'</div>' ;
			$panes .= '</div>'; 
			$panes .= '<div class="toggle-content">';
			$panes .=  $content; 
			$panes .= '</div>';
			$panes .= '</li>';

			$count++;
		}

		echo rt_shortcode_accordion( $settings, $panes );
	}

	protected function content_template() {
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_RT_Accordions() );
