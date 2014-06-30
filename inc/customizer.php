<?php
/**
 * Flex Theme Customizer support
 *
 * @package WordPress
 * @subpackage Flex
 * @since Flex 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Flex 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flex_customize_register($wp_customize) {
    $wp_customize->get_section('header_image')->priority = 26;
    $wp_customize->get_section('static_front_page')->priority = 27;
    $wp_customize->get_section('nav')->priority = 28;

    /** ===============
     * Extends CONTROLS class to add textarea
     */
    class flex_customize_textarea_control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>

            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>

            <?php
        }

    }

    // Displays a list of categories in dropdown
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {

        public $type = 'dropdown-categories';

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name' => '_customize-dropdown-categories-' . $this->id,
                        'echo' => 0,
                        'hide_empty' => false,
                        'show_option_none' => '&mdash; ' . __('Select', 'flex') . ' &mdash;',
                        'hide_if_empty' => false,
                        'selected' => $this->value(),
                    )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown);

            printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>', $this->label, $dropdown
            );
        }

    }

    // Add new section for theme layout and color schemes
    $wp_customize->add_section('flex_theme_layout_settings', array(
        'title' => __('Color Scheme', 'flex'),
        'priority' => 30,
    ));


    // Add color scheme options

    $wp_customize->add_setting('flex_color_scheme', array(
        'default' => 'blue',
        'sanitize_callback' => 'flex_sanitize_color_scheme_option',
    ));

    $wp_customize->add_control('flex_color_scheme', array(
        'label' => 'Color Schemes',
        'section' => 'flex_theme_layout_settings',
        'default' => 'red',
        'type' => 'radio',
        'choices' => array(
            'blue' => __('Blue', 'flex'),
            'red' => __('Red', 'flex'),
            'green' => __('Green', 'flex'),
            'purple' => __('Purple', 'flex'),
            'orange' => __('Orange', 'flex'),
            'brown' => __('Brown', 'flex'),
            'pink' => __('Pink', 'flex'),
            'yellow' => __('Yellow', 'flex'),
        ),
    ));


    // Add new section for Custom Favicon settings
    $wp_customize->add_section('flex_custom_favicon_setting', array(
        'title' => __('Custom Favicon', 'flex'),
        'priority' => 68,
    ));


    $wp_customize->add_setting('custom_favicon');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'custom_favicon', array(
        'label' => 'Custom Favicon',
        'section' => 'flex_custom_favicon_setting',
        'settings' => 'custom_favicon',
        'priority' => 1,
            )
            )
    );

    // Add new section for Custom Favicon settings
    $wp_customize->add_section('flex_tracking_code_setting', array(
        'title' => __('Tracking Code', 'flex'),
        'priority' => 69,
    ));


    $wp_customize->add_setting('tracking_code', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'tracking_code', array(
        'label' => __('Tracking Code', 'flex'),
        'section' => 'flex_tracking_code_setting',
        'settings' => 'tracking_code',
        'priority' => 2,
    )));

    // Add new section for Header Contact settings
    $wp_customize->add_section('header_contact_setting', array(
        'title' => __('Header Contact', 'flex'),
        'priority' => 36,
    ));

    $wp_customize->add_setting('header_contact', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'header_contact', array(
        'label' => __('Contact Detail', 'flex'),
        'section' => 'header_contact_setting',
        'settings' => 'header_contact',
        'priority' => 2,
    )));

    // Add new section for slider settings
    $wp_customize->add_section('home_slider_setting', array(
        'title' => __('Home Slider', 'flex'),
        'priority' => 37,
    ));

    $wp_customize->add_setting('slider_one', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_one', array(
        'label' => 'Slider 1',
        'section' => 'home_slider_setting',
        'settings' => 'slider_one',
        'priority' => 1,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_one', array(
        'label' => __('Slider One Title', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('slider_one_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'slider_one_description', array(
        'label' => __('Description', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_description',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('slider_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_text', array(
        'label' => __('Slider One Link Text', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('slider_one_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_one_link_url', array(
        'label' => __('Slider One Link URL', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_one_link_url',
        'priority' => 5,
    ));

    $wp_customize->add_setting('slider_two', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_two', array(
        'label' => 'Slider 2',
        'section' => 'home_slider_setting',
        'settings' => 'slider_two',
        'priority' => 6,
            )
            )
    );

    // slider Title
    $wp_customize->add_setting('slider_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_two', array(
        'label' => __('Slider Two Title', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_two',
        'priority' => 7,
    ));

    $wp_customize->add_setting('slider_two_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'slider_two_description', array(
        'label' => __('Description', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_description',
        'priority' => 8,
    )));

    // link text
    $wp_customize->add_setting('slider_two_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_text', array(
        'label' => __('Slider Two Link Text', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_text',
        'priority' => 9,
    ));

    // link url
    $wp_customize->add_setting('slider_two_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_two_link_url', array(
        'label' => __('Slider Two Link URL', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_two_link_url',
        'priority' => 10,
    ));


    $wp_customize->add_setting('slider_three', array(
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'slider_three', array(
        'label' => 'Slider 3',
        'section' => 'home_slider_setting',
        'settings' => 'slider_three',
        'priority' => 11,
            )
            )
    );


    // slider Title
    $wp_customize->add_setting('slider_title_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_title_three', array(
        'label' => __('Slider Three Title', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_title_three',
        'priority' => 12,
    ));

    $wp_customize->add_setting('slider_three_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'slider_three_description', array(
        'label' => __('Description', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_description',
        'priority' => 13,
    )));

    // link text
    $wp_customize->add_setting('slider_three_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_link_text', array(
        'label' => __('Slider Three Link Text', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_link_text',
        'priority' => 14,
    ));

    // link url
    $wp_customize->add_setting('slider_three_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('slider_three_link_url', array(
        'label' => __('Slider Three Link URL', 'flex'),
        'section' => 'home_slider_setting',
        'settings' => 'slider_three_link_url',
        'priority' => 15,
    ));

    
    // Add new section for Social Icons
    $wp_customize->add_section('social_icon_setting', array(
        'title' => __('Social Icons', 'flex'),
        'priority' => 35,
    ));

    // link url
    $wp_customize->add_setting('facebook_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('facebook_link_url', array(
        'label' => __('Facebook URL', 'flex'),
        'section' => 'social_icon_setting',
        'settings' => 'facebook_link_url',
        'priority' => 1,
    ));

    // link url
    $wp_customize->add_setting('twitter_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('twitter_link_url', array(
        'label' => __('Twitter URL', 'flex'),
        'section' => 'social_icon_setting',
        'settings' => 'twitter_link_url',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('googleplus_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('googleplus_link_url', array(
        'label' => __('Google Plus URL', 'flex'),
        'section' => 'social_icon_setting',
        'settings' => 'googleplus_link_url',
        'priority' => 3,
    ));

    // link url
    $wp_customize->add_setting('pinterest_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pinterest_link_url', array(
        'label' => __('Pinterest URL', 'flex'),
        'section' => 'social_icon_setting',
        'settings' => 'pinterest_link_url',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('github_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('github_link_url', array(
        'label' => __('Github URL', 'flex'),
        'section' => 'social_icon_setting',
        'settings' => 'github_link_url',
        'priority' => 5,
    ));

    // link url
    $wp_customize->add_setting('youtube_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('youtube_link_url', array(
        'label' => __('Youtube URL', 'flex'),
        'section' => 'social_icon_setting',
        'settings' => 'youtube_link_url',
        'priority' => 6,
    ));


    // Add new section for Home Featured One settings
    $wp_customize->add_section('home_featured_one_setting', array(
        'title' => __('Home Featured #1', 'flex'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('home_featured_one');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_one', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_one_setting',
        'settings' => 'home_featured_one',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_one', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_one', array(
        'label' => __('Title', 'flex'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_title_one',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_one', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'home_description_one', array(
        'label' => __('Description', 'flex'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_description_one',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_one_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_text', array(
        'label' => __('Link Text', 'flex'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_one_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_one_link_url', array(
        'label' => __('Link URL', 'flex'),
        'section' => 'home_featured_one_setting',
        'settings' => 'home_one_link_url',
        'priority' => 5,
    ));

    // Add new section for Home Featured Two settings
    $wp_customize->add_section('home_featured_two_setting', array(
        'title' => __('Home Featured #2', 'flex'),
        'priority' => 45,
    ));


    $wp_customize->add_setting('home_featured_two');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_two', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_two_setting',
        'settings' => 'home_featured_two',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_two', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_two', array(
        'label' => __('Title', 'flex'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_title_two',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_two', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'home_description_two', array(
        'label' => __('Description', 'flex'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_description_two',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_two_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_text', array(
        'label' => __('Link Text', 'flex'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_two_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_two_link_url', array(
        'label' => __('Link URL', 'flex'),
        'section' => 'home_featured_two_setting',
        'settings' => 'home_two_link_url',
        'priority' => 5,
    ));



    // Add new section for Home Featured Three settings
    $wp_customize->add_section('home_featured_three_setting', array(
        'title' => __('Home Featured #3', 'flex'),
        'priority' => 50,
    ));


    $wp_customize->add_setting('home_featured_three');

    $wp_customize->add_control(
            new WP_Customize_Image_Control(
            $wp_customize, 'home_featured_three', array(
        'label' => 'Featured Image',
        'section' => 'home_featured_three_setting',
        'settings' => 'home_featured_three',
        'priority' => 1,
            )
            )
    );

    // home Title
    $wp_customize->add_setting('home_title_three', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_title_three', array(
        'label' => __('Title', 'flex'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_title_three',
        'priority' => 2,
    ));

    $wp_customize->add_setting('home_description_three', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'home_description_three', array(
        'label' => __('Description', 'flex'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_description_three',
        'priority' => 3,
    )));

    // link text
    $wp_customize->add_setting('home_three_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_text', array(
        'label' => __('Link Text', 'flex'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_text',
        'priority' => 4,
    ));

    // link url
    $wp_customize->add_setting('home_three_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_three_link_url', array(
        'label' => __('Link URL', 'flex'),
        'section' => 'home_featured_three_setting',
        'settings' => 'home_three_link_url',
        'priority' => 5,
    ));



    // Add new section for Home Tagline settings
    $wp_customize->add_section('tagline_setting', array(
        'title' => __('Home Tagline', 'flex'),
        'priority' => 55,
    ));


    // Tagline Title
    $wp_customize->add_setting('tagline_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('tagline_title', array(
        'label' => __('Tagline', 'flex'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_title',
    ));

    $wp_customize->add_setting('tagline_description', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'tagline_description', array(
        'label' => __('Description', 'flex'),
        'section' => 'tagline_setting',
        'settings' => 'tagline_description',
        'priority' => 20,
    )));

    // Add new section for displaying Featured Posts on Front Page
    $wp_customize->add_section('flex_front_page_post_options', array(
        'title' => __('Featured Posts', 'flex'),
        'description' => __('Settings for displaying featured posts on Front Page', 'flex'),
        'priority' => 57,
    ));

    // enable featured posts on front page?
    $wp_customize->add_setting('flex_front_featured_posts_check', array(
        'default' => 1,
        'sanitize_callback' => 'flex_sanitize_checkbox',
    ));
    $wp_customize->add_control('flex_front_featured_posts_check', array(
        'label' => __('Show featured posts on Front Page', 'flex'),
        'section' => 'flex_front_page_post_options',
        'priority' => 1,
        'type' => 'checkbox',
    ));


    // post Title
    $wp_customize->add_setting('flex_post_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('flex_post_title', array(
        'label' => __('Section Title', 'flex'),
        'section' => 'flex_front_page_post_options',
        'settings' => 'flex_post_title',
        'priority' => 2,
    ));


    // select number of posts for featured posts on front page
    $wp_customize->add_setting('flex_front_featured_posts_count', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('flex_front_featured_posts_count', array(
        'label' => __('Number of posts to display', 'flex'),
        'section' => 'flex_front_page_post_options',
        'settings' => 'flex_front_featured_posts_count',
        'priority' => 20,
    ));
    // select category for featured posts 
    $wp_customize->add_setting('flex_front_featured_posts_cat', array('default' => 0,));
    $wp_customize->add_control(new WP_Customize_Dropdown_Categories_Control($wp_customize, 'flex_front_featured_posts_cat', array(
        'label' => __('Post Category', 'flex'),
        'section' => 'flex_front_page_post_options',
        'type' => 'dropdown-categories',
        'settings' => 'flex_front_featured_posts_cat',
        'priority' => 30,
    )));


    // Add new section for Home CTA settings
    $wp_customize->add_section('home_cta_setting', array(
        'title' => __('Home CTA', 'flex'),
        'priority' => 62,
    ));

    $wp_customize->add_setting('cta_text', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'cta_text', array(
        'label' => __('CTA Text', 'flex'),
        'section' => 'home_cta_setting',
        'settings' => 'cta_text',
        'priority' => 1,
    )));


    // link text
    $wp_customize->add_setting('home_cta_link_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_cta_link_text', array(
        'label' => __('Link Text', 'flex'),
        'section' => 'home_cta_setting',
        'settings' => 'home_cta_link_text',
        'priority' => 2,
    ));

    // link url
    $wp_customize->add_setting('home_cta_link_url', array('default' => __('', 'flex'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('home_cta_link_url', array(
        'label' => __('Link URL', 'flex'),
        'section' => 'home_cta_setting',
        'settings' => 'home_cta_link_url',
        'priority' => 3,
    ));

    // Add new section for Home Tagline settings
    $wp_customize->add_section('contact_setting', array(
        'title' => __('Contact Details', 'flex'),
        'priority' => 64,
    ));
    $wp_customize->add_setting('contact_details_check', array('default' => 0,
        'sanitize_callback' => 'flex_sanitize_checkbox',
    ));

    $wp_customize->add_control('contact_details_check', array(
        'label' => __('Show Contact Details', 'flex'),
        'section' => 'contact_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    // contact Title
    $wp_customize->add_setting('contact_title', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_title', array(
        'label' => __('Title', 'flex'),
        'section' => 'contact_setting',
        'settings' => 'contact_title',
        'priority' => 2,
    ));

    $wp_customize->add_setting('contact_email', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'flex'),
        'section' => 'contact_setting',
        'settings' => 'contact_email',
        'priority' => 3,
    ));

    $wp_customize->add_setting('contact_phone', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Phone', 'flex'),
        'section' => 'contact_setting',
        'settings' => 'contact_phone',
        'priority' => 4,
    ));

    $wp_customize->add_setting('address_detail', array('default' => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'address_detail', array(
        'label' => __('Address', 'flex'),
        'section' => 'contact_setting',
        'settings' => 'address_detail',
        'priority' => 5,
    )));

    $wp_customize->add_setting('social_icons_check', array('default' => 0,
        'sanitize_callback' => 'flex_sanitize_checkbox',
    ));

    $wp_customize->add_control('social_icons_check', array(
        'label' => __('Show Social Icons', 'flex'),
        'section' => 'contact_setting',
        'priority' => 6,
        'type' => 'checkbox',
    ));



    // Add new section for Home Tagline settings
    $wp_customize->add_section('flex_contact_form_setting', array(
        'title' => __('Contact Form', 'prism'),
        'priority' => 67,
    ));

    $wp_customize->add_setting('contact_form_check', array('default' => 0,
        'sanitize_callback' => 'flex_sanitize_checkbox',
    ));

    $wp_customize->add_control('contact_form_check', array(
        'label' => __('Show Contact form', 'flex'),
        'section' => 'flex_contact_form_setting',
        'priority' => 1,
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('flex_contact_form', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('flex_contact_form', array(
        'label' => __('Contact Form Short Code', 'flex'),
        'section' => 'flex_contact_form_setting',
        'settings' => 'flex_contact_form',
        'priority' => 2,
    ));


    // Add footer text section
    $wp_customize->add_section('flex_footer', array(
        'title' => 'Footer Text', // The title of section
        'priority' => 75,
    ));

    $wp_customize->add_setting('flex_footer_footer_text', array(
        'default' => null,
        'sanitize_callback' => 'sanitize_text_field',
        'sanitize_js_callback' => 'flex_sanitize_escaping',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'flex_footer_footer_text', array(
        'section' => 'flex_footer', // id of section to which the setting belongs
        'settings' => 'flex_footer_footer_text',
    )));


    // Add custom CSS section
    $wp_customize->add_section('flex_custom_css', array(
        'title' => 'Custom CSS', // The title of section
        'priority' => 80,
    ));

    $wp_customize->add_setting('flex_custom_css', array(
        'default' => '',
        'sanitize_callback' => 'flex_sanitize_custom_css',
        'sanitize_js_callback' => 'flex_sanitize_escaping',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new flex_customize_textarea_control($wp_customize, 'flex_custom_css', array(
        'section' => 'flex_custom_css', // id of section to which the setting belongs
        'settings' => 'flex_custom_css',
    )));



    //remove default customizer sections
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('colors');

    // add post message for various customizer settings 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
}

add_action('customize_register', 'flex_customize_register');


/*
 * Sanitize numeric values 
 * 
 * @since Flex 1.0
 */

function flex_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

/*
 * Escaping for input values
 * 
 * @since Flex 1.0
 */

function flex_sanitize_escaping($input) {
    $input = esc_attr($input);
    return $input;
}

/*
 * Sanitize Custom CSS 
 * 
 * @since Flex 1.0
 */

function flex_sanitize_custom_css($input) {
    $input = wp_kses_stripslashes($input);
    return $input;
}

/*
 * Sanitize Checkbox input values
 * 
 * @since Flex 1.0
 */

function flex_sanitize_checkbox($input) {
    if ($input) {
        $output = '1';
    } else {
        $output = false;
    }
    return $output;
}

/*
 * Sanitize layout options 
 * 
 * @since Flex 1.0
 */

function flex_sanitize_layout_option($layout_option) {
    if (!in_array($layout_option, array('full-width', 'boxed'))) {
        $layout_option = 'boxed';
    }

    return $layout_option;
}

/*
 * Sanitize color scheme options 
 * 
 * @since Flex 1.0
 */

function flex_sanitize_color_scheme_option($colorscheme_option) {
    if (!in_array($colorscheme_option, array('blue', 'red', 'green', 'purple', 'orange', 'brown', 'pink', 'yellow'))) {
        $colorscheme_option = 'blue';
    }

    return $colorscheme_option;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Flex 1.0
 */
function flex_customize_preview_js() {
    wp_enqueue_script('flex_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '20131205', true);
}

add_action('customize_preview_init', 'flex_customize_preview_js');

function flex_header_output() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
    <?php echo esc_attr(get_theme_mod('flex_custom_css')); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
}

// Output custom CSS to live site
add_action('wp_head', 'flex_header_output');
