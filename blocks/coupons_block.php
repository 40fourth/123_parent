<?php 
/**
 * coupons Block
 * 
 */
    // empty return string
    $return = [];
    $return['section'] = '';
    $guide = [];
    $return['coupon'] ='<ul>';

    $guide['coupon'] = '
        <li class="site__fade site__fade-up coupons__'.$cB['style'].'">
            <a class="coupon_print" href="%s?style='.$cB['style'].'" target="_blank">
                <h5>%s</h5>
                <div class="coupon_description block__item-body">%s</div>
                %s
                %s
            </a>
        </li>
    ';
    
    foreach($cB['coupons'] as $i => $coupon) {
        
        $fields = get_fields($coupon['coupon']->ID);

        if( $fields['status'] ){ 
            $return['coupon'] .= sprintf(
                $guide['coupon']
                ,get_permalink($coupon['coupon']->ID)
                ,$coupon['coupon']->post_title
                ,(!empty($fields['details']) ? $fields['details'] : '')
                ,(!empty($fields['code']) ? '<p class="coupon_code">Code: <span>'.$fields['code'].'</span></p>' : '')
                ,(!empty($fields['expiration']) ? '<p class="coupon_expiration">Expires: <span>'.$fields['expiration'].'</span></p>' : '')
            );
        }
    }
    $return['coupon'] .= '</ul>';
    $imagecoupons = get_theme_mod( 'setting_coupon_buttom_divider', '' ); 
    $imagecoupons2 = get_theme_mod( 'setting_coupon_buttom_divider_top', '' );
    // empty guide string 
    $guide['section'] = '
        <section %s class="site__block block__coupons" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imagecoupons2 ).'"'.'>
            <div class="container %s %s" style="%s %s">
                %s
                %s
                %s
                %s
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imagecoupons ).'"'.'>
        </section>
    ';

    $return['section'] .= sprintf(
        $guide['section']
        // opts 
        ,( !empty($cB['anchor_enabled']) ? 'id="'.strtolower($cB['anchor_link_text']).'"' : '' ) // add an ID tag for the long scroll
        ,( !empty($cB['background_settings']['background_image']) ? 'background-image:url('."'".strtolower($cB['background_settings']['background_image'])."'".');' : '' )//this is the background image
        ,( !empty($cB['background_settings']['background_position']) ? 'background-position:'.strtolower($cB['background_settings']['background_position']).';' : '' )//this is for background  position
        ,( !empty($cB['background_settings']['background_size']) ? 'background-size:'.strtolower($cB['background_settings']['background_size']).';' : '' )//this is for background size
        ,( !empty($cB['background_settings']['background_repeat']) ? 'background-repeat:'.strtolower($cB['background_settings']['background_repeat']).';' : '' )//this is for background repeat
        ,( !empty($cB['background_setting']['background_attachment']) ? 'background-attachment:'.strtolower($cB['background_setting']['background_attachment']).';' : '' )//this is for background attachment
        ,( !empty($cB['background_setting']['background_origin']) ? 'background-origin:'.strtolower($cB['background_setting']['background_origin']).';' : '' )//this is for background origin
        ,( !empty($cB['background_setting']['background_clip']) ? 'background-clip:'.strtolower($cB['background_setting']['background_clip']).';' : '' )//this is for background clip
        ,( !empty($cB['background_setting']['background_color']) ? 'background-color:'.strtolower($cB['background_setting']['background_color']).';' : '' )//this is for background color
        ,( !empty( $cB['width'] ) ? $cB['width'] : '' )                                                         // container width
        ,( !empty( $cB['background_color'] ) ? 'hasbg' :'' )                                                    // container has bg color class
        ,( !empty( $cB['background_color'] ) ? 'background-color:'.$cB['background_color'].';' : '' )           // container bg color style
        ,( !empty( $cB['foreground_color'] ) ? 'color:'.$cB['foreground_color'].';' : '' )           // container bg color style
        // 
        ,( !empty($cB['heading']) ? '<h2 class="site__fade site__fade-up block__heading" style="text-align:'.$cB['heading_alignment'].';">'.$cB['heading'].'</h2>' : '' )
        ,( !empty($cB['text']) ? '<div class="site__fade site__fade-up block__details">'.$cB['text'].'</div>' : '' )
        // 
        ,( !empty($return['coupon']) ? '<div class="site__grid coupons__'.$cB['style'].'">'.$return['coupon'].'</div>' : '' )
        ,( !empty($cB['view_all_button']['link']) ? '<a class="site__button" href="'.$cB['view_all_button']['link']['url'].'">'.$cB['view_all_button']['link']['title'].'</a>' : '' )
    );


    // echo return string
    echo $return['section'];

    // clear the $cB, $return, $index and $guide vars for the next block
    unset($cB, $return, $guide);
 ?>