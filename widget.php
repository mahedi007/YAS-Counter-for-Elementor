<?php
/**
 * yashf Widget Class
 *
 * @package           yashfCounter
 * @author            Mahedi Hasan
 * @copyright         Mahedi Hasan
 * @license           GPL-2.0-or-later
 */
class yashf_counter extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve yashf counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'yashfc';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve yashf counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'yashf Counter', 'yashf-counter-plugin' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve yashf counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return ' eicon-plug ';
	}

	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'jquery-numerator' ];
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://smmahedihasan.xyz';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the yashf counter widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'yashf-counter-category' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the yashf counter widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'yashf counter', 'url', 'link' ];
	}

	/**
	 * Register yashf counter widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-yashf counter-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'btn_icon',
			[
				'label' => __( 'Icon', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-bars',
					'library' => 'solid',
				],
			]
		);
        
        $repeater->add_control(
			'number',
			[
				'label' => esc_html__( 'Number', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'suffix',
			[
				'label' => esc_html__( 'Suffix', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__( 'Plus', 'yashf-counter-plugin' ),
			]
		);

        $repeater->add_control(
			'card_title',
			[
				'label' => __( 'Text', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'John Doe.', 'yashf-counter-plugin' ),
				'placeholder' => __( 'Type your title here', 'yashf-counter-plugin' ),
			]
		);

        $this->add_control(
			'material_counter',
			[
				'label' => __( 'Counter Box List', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'card_title' => __( 'Your Text 1', 'yashf-counter-plugin' ),   
					],
					[
						'card_title' => __( 'Your Text 2', 'yashf-counter-plugin' ),   
					],
					[
						'card_title' => __( 'Your Text 3', 'yashf-counter-plugin' ),   
					],
					[
						'card_title' => __( 'Your Text 4', 'yashf-counter-plugin' ),   
					],
					
				],
				'title_field' => '{{{ card_title }}}', 
			]
		);
		

		$this->end_controls_section();

		$this->start_controls_section(
			'typography_section',
			[
				'label' => __( 'Text Style', 'yashf-counter-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Text Typography', 'yashf-counter-plugin' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .text',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'number_section',
			[
				'label' => __( 'Number', 'yashf-counter-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'number_typo',
				'label' => __( 'Number Typography', 'yashf-counter-plugin' ),
				'scheme' => Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .num',
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => esc_html__( 'Number Color', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .num' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon Style', 'yashf-counter-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon' => 'color: {{VALUE}};',
				],
				
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'counter_section',
			[
				'label' => __( 'Counter Box Style', 'yashf-counter-plugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'custom_color',
			[
				'label' =>__( 'Background Color', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container' => 'background-color: {{VALUE}};',
				],
				
			]
		);

		$this->add_control(
			'custom_color2',
			[
				'label' =>__( 'Border Top Color', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container' => 'border-top-color: {{VALUE}};',
				],
				
			]
		);

		$this->add_control(
			'custom_color3',
			[
				'label' =>__( 'Border Bottom Color', 'yashf-counter-plugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .container' => 'border-bottom-color: {{VALUE}};',
				],
				
			]
		);
		

		$this->end_controls_section();

	}

	

	/**
	 * Render yashf counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
        if ( $settings['material_counter'] ) {
            echo '<div class="wrapper">';
            foreach (  $settings['material_counter'] as $item ) { ?>
		
            <div class="container">
                <span class="icon"><i class="<?php echo esc_attr( $item['btn_icon']['value']); ?>"></i></span>
				<div class="number-wrapper">
						
						<span class="num" data-val="<?php echo esc_attr( $item['number'] );?>"><?php echo esc_attr( $item['number']); ?></span>
						<span class="suf"><?php echo esc_attr( $item['suffix'] );?></span>
					
				</div>
				<span class="text"><?php echo esc_attr( $item['card_title']); ?></span>
            </div>
            
        	<?php }
        	echo '</div>';
    	}
	}
}