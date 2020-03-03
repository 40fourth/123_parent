<?php 
/**
 * Services Block
 * 
 */
    // empty return string

    $return = [];
    $return['section'] = '';
    $guide = [];
    $return['services'] ='<ul>';
    
    foreach($cB['services'] as $i => $service) {
        
        $fields = get_fields($service['service']->ID);

        if( $cB['style'] == 'one'){
            $guide['services'] = '
                <li>
                    <a href="%s">
                        <div><div class="image '.( ($cB['style'] == 'one') ? 'less_size_block' : '').'" style="background-image:url(%s);"></div></div>
                        <div>
                            %s 
                            <div class="service__details block__item-body">%s</div>
                            <p class="service_price">%s</p>
                        </div>
                    </a>
                </li>
            ';
            
            if( $fields['status'] ){ 
                $return['services'] .= sprintf(
                    $guide['services']
                    ,get_permalink($service['service']->ID)
                    ,(!empty($fields['image']['url']) ? $fields['image']['url'] : '')
                    ,( !empty($service['service']->post_title ) ? '<h3>'.$service['service']->post_title.'</h3>' : '' )
                    ,(!empty($fields['details']) ? $fields['details'] : '')
                    ,(!empty($fields['price']) ? $fields['price'] : '')
                );
            }
        }else if( $cB['style'] == 'three' || $cB['style'] == 'two'){

            if($i % 2 == 0){
                $guide['services'] = '
                    <li>
                        <a href="%s">
                            <div><div class="image '.( ($cB['style'] == 'one') ? 'less_size_block' : '').'" style="background-image:url(%s);"></div></div>
                            <div>
                                %s 
                                <div class="service__details block__item-body">%s</div>
                            </div>
                        </a>
                    </li>
                ';
                if( $fields['status'] ){ 
                    $return['services'] .= sprintf(
                        $guide['services']
                        ,get_permalink($service['service']->ID)
                        ,(!empty($fields['image']['url']) ? $fields['image']['url'] : '')
                        ,( !empty($service['service']->post_title) ? '<h3><span>'.$service['service']->post_title.'</span><span>'.(!empty($fields['price']) ? ''.$fields['price'] : '').'</span></h3>' : '' )
                        ,(!empty($fields['details']) ? $fields['details'] : '')
                    );
                }
            }else{
                $guide['services'] = '
                    <li>
                        <a href="%s">
                            <div>
                                %s 
                                <div class="service__details block__item-body">%s</div>
                            </div>
                            <div><div class="image '.( ($cB['style'] == 'one') ? 'less_size_block' : '').'" style="background-image:url(%s);"></div></div>
                        </a>
                    </li>
                ';
                if( $fields['status'] ){ 
                    $return['services'] .= sprintf(
                        $guide['services']
                        ,get_permalink($service['service']->ID)
                        ,( !empty($service['service']->post_title) ? '<h3><span>'.$service['service']->post_title.'</span><span>'.(!empty($fields['price']) ? ''.$fields['price'] : '').'</span></h3>' : '' )
                        ,(!empty($fields['details']) ? $fields['details'] : '')
                        ,(!empty($fields['image']['url']) ? $fields['image']['url'] : '')
                    );
                }
            }

        }
    }
    $return['services'] .= '</ul>';
    $imageservice = get_theme_mod( 'setting_services_buttom_divider', '' ); 
    $imageservice2 = get_theme_mod( 'setting_services_buttom_divider_top', '' );
    
    // empty guide string 
    $guide['section'] = '
        <section %s class="site__block block__services" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imageservice2 ).'"'.'>
            <div class="container %s %s services__%s" style="%s %s">
                %s
                %s
                %s
                %s
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imageservice ).'"'.'>
        </section>
    ';

    $return['section'] .= sprintf(
         $guide['section']
        ,( !empty($cB['anchor_enabled']) ? 'id="'.strtolower($cB['anchor_link_text']).'"' : '' ) // add an ID tag for the long scroll
        ,( !empty($cB['background_settings']['background_image']) ? 'background-image:url('."'".strtolower($cB['background_settings']['background_image'])."'".');' : '' )//this is the background image
        ,( !empty($cB['background_settings']['background_position']) ? 'background-position:'.strtolower($cB['background_settings']['background_position']).';' : '' )//this is for background  position
        ,( !empty($cB['background_settings']['background_size']) ? 'background-size:'.strtolower($cB['background_settings']['background_size']).';' : '' )//this is for background size
        ,( !empty($cB['background_settings']['background_repeat']) ? 'background-repeat:'.strtolower($cB['background_settings']['background_repeat']).';' : '' )//this is for background repeat
        ,( !empty($cB['background_setting']['background_attachment']) ? 'background-attachment:'.strtolower($cB['background_setting']['background_attachment']).';' : '' )//this is for background attachment
        ,( !empty($cB['background_setting']['background_origin']) ? 'background-origin:'.strtolower($cB['background_setting']['background_origin']).';' : '' )//this is for background origin
        ,( !empty($cB['background_setting']['background_clip']) ? 'background-clip:'.strtolower($cB['background_setting']['background_clip']).';' : '' )//this is for background clip
        ,( !empty($cB['background_setting']['background_color']) ? 'background-color:'.strtolower($cB['background_setting']['background_color']).';' : '' )//this is for background color
        
        ,( !empty( $cB['width'] ) ? $cB['width'] : '' )    // container width
        ,( !empty( $cB['background_color'] ) ? 'hasbg' :'' )                                                    // container has bg color class
        ,( !empty( $cB['style']) ? $cB['style'] : '')                                                     
        ,( !empty( $cB['background_color'] ) ? 'background-color:'.$cB['background_color'].';' : '' )           // container bg color style
        ,( !empty( $cB['foreground_color'] ) ? 'color:'.$cB['foreground_color'].';' : '' )           // container bg color style
        ,( !empty($cB['heading']) ? '<h2 class="block__heading" style="text-align:'.$cB['heading_alignment'].';">'.$cB['heading'].'</h2>' : '' )
        ,( !empty($cB['text']) ? '<div class="block__details">'.$cB['text'].'</div>' : '' )
        ,( !empty($return['services']) ? '<div '.( ($cB['style'] == 'one') ? 'class="site__grid"' : '').'>'.$return['services'].'</div>' : '' )
        ,( !empty($cB['view_all_button']['link']) ? '<a class="site__button" href="'.$cB['view_all_button']['link']['url'].'">'.$cB['view_all_button']['link']['title'].'</a>' : '' )
    );

    // echo return string
    echo $return['section'];

    // clear the $cB, $return, $index and $guide vars for the next block
    unset($cB, $return, $guide);
 ?>