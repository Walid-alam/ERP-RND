<?php



$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = $el_id = $div_wrapper =  $class_section = '';

extract(shortcode_atts(array(

    'el_id'           => '',

    'el_class'        => '',

    'bg_image_custom' => '',

    'div_wrapper'     => '',

    'bg_image'        => '',

    'bg_color'        => '',

    'bg_image_repeat' => '',

    'font_color'      => '',

    'padding'         => '',

    'full_width'       => 'no',

    'overlay_div'     => 'no',

    'margin_bottom'   => '',

    'css'             => '',

    'class_section'       => '',

    'el_html'         => '',

), $atts));



    wp_enqueue_style( 'js_composer_front' );

    wp_enqueue_script( 'wpb_composer_front_js' );

    wp_enqueue_style('js_composer_custom_css');

    


    $hand_sec = rand();

    $class_parallax = '';

    $el_class = $this->getExtraClass($el_class);

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.'vg_fixed'. $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

    $bg_image_vc = 0;

    $bg_image_customs = wp_get_attachment_image_src($bg_image_custom,'');

    $style = $this->buildStyle($bg_image_vc, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

if($bg_image_customs[0] != ''){

$img_me = 'style="background-image: url('.esc_url($bg_image_customs[0]).')"';

}else{

    $img_me = '';

}

if($full_width == 'no'){

    $output .='<div class="' .$el_class.'">

                        <div class="container">

                                <div class="'.$class_section.'">

                                    <div class="row">';   

}elseif($full_width=='overlay_bg'){

     $output .='<div class="' .$el_class.'" '.$img_me.'>

                    <div class="overlay"></div>

                        <div class="container">';

}else{

    $output .='<div class="row">';

   

}

    $output .= wpb_js_remove_wpautop($content);

if($full_width == 'no'){

    $output .='</div></div></div></div>';

}elseif($full_width=='overlay_bg'){

 $output .='</div></div>';

}else{

    $output .='</div>';

}

echo $output;