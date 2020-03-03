<?php 
/**
*  Copy Content Block
* 
* 
*/
    // set return and guide string arrays
    $return = [];
    $guide = [];
    $return['section'] = '';
    $guide['section'] = '';
    
    // guide string for the section
    $guide['section'] = '
        <section %s class="site__block block__copy" style="%s %s %s %s %s %s %s %s">
                <h2>%s</h2>
                <div class="coupon_description block__item-body">%s</div>
            <div class="container %s %s" style="%s">
                %s
            </div>
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
        ,( !empty( $cB['width'] ) ? $cB['heading_title'] : '' )  
        ,( !empty( $cB['width'] ) ? $cB['heading_subtitle'] : '' )  
        ,( !empty( $cB['width'] ) ? $cB['width'] : '' )                                                         // container width
        ,( !empty( $cB['background_color'] ) ? 'hasbg' :'' )                                                    // container has bg color class
        ,( !empty( $cB['background_color'] ) ? 'background-color:'.$cB['background_color'].';' : '' )           // container bg color style
        ,'<div style="color: '.$cB['foreground_color'].'">'.$cB['copy'].'</div>'                              // copy content w/ foreground color on container for easy override
    );


    // echo return string
    echo $return['section'];

    // clear the $cB, $return and $guide vars
    unset($cB, $return, $guide);
 ?>