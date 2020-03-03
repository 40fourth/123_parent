<?php 
/**
*  Heading Content Block
* 
* 
*/

    // set return and guide string arrays
    $return = [];
    $return['section'] = '';
    $guide = [];
    
    // build a grid of post objects
    if( !empty($cB['staff_members']) ){

        // set grid return string
        $return['staff'] = '<ul>';

        // loop thru each staff member
        foreach($cB['staff_members'] as $i => $staff_member) {
            
            // get fields for this sttaff member
            $fields = get_fields($staff_member['staff_member']->ID);

            $social_media = '';
            if( !empty($fields['social_media']) ){
                $social_media .= '<ul class="site__social-media">';
                $social_format = '
                    <li>
                        <a href="%s" title="%s" target="_blank">
                            %s
                        </a>
                    </li>
                ';
                foreach( $fields['social_media']['icons'] as $i => $social_icon ){

                    $img = $social_icon['image'];
                    $fa = $social_icon['icon'];
    
                    $url = ( !empty($social_icon['link']['url']) ? $social_icon['link']['url'] : '' );
                    $title = ( !empty($social_icon['link']['title']) ? $social_icon['link']['title'] : '' );
    
                    if( !empty($social_icon['image']) ){
                        $social_media .= sprintf(
                            $social_format
                            ,$url
                            ,$title
                            ,( !empty($img['url']) ? '<img src="'.$img['url'].'" />' : '')
                        );
                    }else if( !empty($social_icon['icon']) ){
                        $social_media .= sprintf(
                            $social_format
                            ,$url
                            ,$title
                            ,( !empty($fa) ? $fa : '')
                        );
                    }else{
                        $social_media = '';
                    }
    
                }
                $social_media .= '</ul>';
            }

            if( $cB['style'] == 'one' ){

                // style one grid guide string
                $guide['staff'] = '
                    <li class="site__fade site__fade-up">
                        <a href="%s">
                            <div class="staff__image">
                                <div class="image less_size_block site__bgimg_img" style="background-image:url(%s);"></div>
                            </div>
                            <div class="staff__content"> 
                                <h3>%s</h3>
                                <div class="staff__details block__item-body">%s</div>
                            </div>
                        </a>
                        <div class="staff__social">%s</div>
                    </li>
                ';

                // write to return string
                $return['staff'] .= sprintf(
                    $guide['staff']
                    ,get_permalink($staff_member['staff_member']->ID)
                    ,( !empty($fields['image']['url'] )? $fields['image']['url'] : '' )
                    ,$staff_member['staff_member']->post_title
                    ,( !empty($fields['short_bio']) ? $fields['short_bio'] : '' )
                    ,$social_media
                );

            }else if( $cB['style'] == 'two' ){
                
                // style two grid guide string
                $guide['staff'] = '
                    <li class="site__fade site__fade-up">
                        <a href="%s">
                            <div>
                                <div class="staff__image">
                                    <div class="image site__bgimg_img" style="background-image:url(%s);"></div>
                                </div>
                                <div class="staff__details block__item-body">%s<br>%s</div>
                            </div>
                        </a>
                    </li>
                ';

                // write to return string
                $return['staff'] .= sprintf(
                    $guide['staff']
                    ,get_permalink($staff_member['staff_member']->ID)
                    ,( !empty($fields['image']['url'] )? $fields['image']['url'] : '' )
                    ,$staff_member['staff_member']->post_title
                    ,( !empty($fields['short_bio']) ? $fields['short_bio'] : '' )
                );
 
            }
            
        }
        // close grid return string
        $return['staff'] .= '</ul>';
    }

    $imagetesstaff = get_theme_mod( 'setting_staff_buttom_divider', '' ); 
    $imagetesstaff2 = get_theme_mod( 'setting_staff_buttom_divider_top', '' );
    // empty guide string 
    $guide['section'] = '
        <section %s class="site__block block__staff" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imagetesstaff2 ).'"'.'>
            <div class="container %s %s" style="%s %s">
                %s
                %s
                %s
                %s
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imagetesstaff ).'"'.'>
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
       
        ,( !empty( $cB['width'] ) ? $cB['width'] : '' )                                                         // container width
        ,( !empty( $cB['background_color'] ) ? 'hasbg' :'' )                                                    // container has bg color class
        ,( !empty( $cB['background_color'] ) ? 'background-color:'.$cB['background_color'].';' : '' )           // container bg color style
        ,( !empty( $cB['foreground_color'] ) ? 'color:'.$cB['foreground_color'].';' : '' )           // container bg color style
        ,( !empty($cB['heading']) ? '<h2 class="block__heading" style="text-align:'.$cB['heading_alignment'].';">'.$cB['heading'].'</h2>' : '' )
       
        ,( !empty($cB['text']) ? '<div class="block__details">'.$cB['text'].'</div>' : '' )
         ,( !empty($cB['view_all_button']['link']) ? '<a class="site__button" href="'.$cB['view_all_button']['link']['url'].'">'.$cB['view_all_button']['link']['title'].'</a><div><br></div>' : '' )
        ,( !empty($return['staff']) ? '<div class="'.( ($cB['style'] == 'one')? 'staff__'.$cB['style'] .' site__grid' : 'staff__'.$cB['style']) .'">'.$return['staff'].'</div>' : '' )
        
    );

    // echo return string
    echo $return['section'];

    // clear the $cB, $return, $index and $guide vars for the next block
    unset($cB, $return, $guide);
 ?>