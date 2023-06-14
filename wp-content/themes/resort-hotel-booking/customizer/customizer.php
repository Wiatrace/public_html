<?php

function resort_hotel_booking_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'adventure_travelling_color_option' );
    $wp_customize->remove_section( 'adventure_travelling_social_media' );
    $wp_customize->remove_setting( 'adventure_travelling_location' );
    $wp_customize->remove_control( 'adventure_travelling_location' );
    $wp_customize->remove_setting( 'adventure_travelling_timming' );
    $wp_customize->remove_control( 'adventure_travelling_timming' );
    $wp_customize->remove_setting( 'adventure_travelling_tp_body_layout_settings' );
    $wp_customize->remove_control( 'adventure_travelling_tp_body_layout_settings' );
    $wp_customize->remove_setting( 'adventure_travelling_footer_widget_image' );
    $wp_customize->remove_control( 'adventure_travelling_footer_widget_image' );
    $wp_customize->remove_setting( 'adventure_travelling_tp_footer_bg_color_option' );
    $wp_customize->remove_control( 'adventure_travelling_tp_footer_bg_color_option' );
}
add_action( 'customize_register', 'resort_hotel_booking_remove_customize_register', 11 );

function resort_hotel_booking_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'resort_hotel_booking_trip_offer_section' , array(
        'title'      => __( 'Latest Offer Settings', 'resort-hotel-booking' ),
        'panel' => 'adventure_travelling_panel_id'
    ) );

    $wp_customize->add_setting('resort_hotel_booking_offer_section_tittle',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('resort_hotel_booking_offer_section_tittle',array(
        'label' => __('Section Title','resort-hotel-booking'),
        'section'   => 'resort_hotel_booking_trip_offer_section',
        'type'      => 'text'
    ));

    $wp_customize->selective_refresh->add_partial( 'resort_hotel_booking_offer_section_tittle', array(
		'selector' => '#travel-offer h2',
		'render_callback' => 'adventure_travelling_customize_partial_resort_hotel_booking_offer_section_tittle',
	  ) );

    $categories = get_categories();
    $cats = array();
    $i = 0;
    $offer_cat[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $offer_cat[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('resort_hotel_booking_offer_section_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'adventure_travelling_sanitize_choices',
    ));
    $wp_customize->add_control('resort_hotel_booking_offer_section_category',array(
        'type'    => 'select',
        'choices' => $offer_cat,
        'label' => __('Select Category','resort-hotel-booking'),
        'section' => 'resort_hotel_booking_trip_offer_section',
    ));

}
add_action( 'customize_register', 'resort_hotel_booking_customize_register' );
