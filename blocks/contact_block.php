<?php 
/**
*  Contact Block
* 
* 
*/
    if( !function_exists('return_column_content') ){

        /**
         * return the content for a column
         *
         * @param array $column
         * @return void
         */
        function return_column_content( $column ){

            // reset the column return string
            $return['column'] = '';
            
            // guide string for a location
            $guide['locations'] = '
                <li class="site__fade site__fade-up">
                    %s
                    <div>
                        %s
                        %s
                        %s
                        %s
                        %s
                        %s
                    </div>
                    <a class="site__button" href="javascript:;">Directions</a>
                </li>
            ';
            
            if( !empty($column) ){
                // each row in this column (acf flex content layouts)
                foreach( $column as $row ){
                    // check which layout this row is
                    switch ($row['acf_fc_layout']) {
                        // this row is a locations block
                        case 'locations':
                            // open the locations wrapper
                            $return['column'] .='<ul class="locations">';
                            // loop thru location items
                            if( !empty($row['locations']) ){
                                foreach( $row['locations'] as $location ){
                                    // get this location posts fields
                                    $fields = get_fields($location['location']->ID);
                                    //echo json_encode($fields['content']['hours_of_op']);
                                    // shorten using the address field (bad practice tho)
                                    $hours='';
                                    for($i=0;$i<7;$i++){
                                        $hours.=$fields['content']['hours_of_op'][$i]['days'].' '.$fields['content']['hours_of_op'][$i]['opening_hours'].'-'.$fields['content']['hours_of_op'][$i]['closing_hours'].'<br>';
                                    }
                                    //echo $hours.'miguel';
                                    $address = ( !empty($fields['content']['address']) ? $fields['content']['address'] : '');
                                    // write this location to the return string for the column
                                    $return['column'] .= sprintf(
                                        $guide['locations']
                                        ,( !empty($fields['content']['heading']) ? '<h3 class="area__heading">'.$fields['content']['heading'].'</h3>' : '')
                                        ,( !empty($address['address_street']) ? '<p class="area__address-1">'.$address['address_street'].'</p>' : '')
                                        ,( !empty($address['address_street_2']) ? '<p class="area__address-2">'.$address['address_street_2'].'</p>' : '')
                                        ,'<span class="area__city-state-post">'.$address['address_city'] . ', ' . $address['address_state'] . ' ' . $address['address_postcode'].'</span>'
                                        ,( !empty($fields['content']['phone_number_1']) ? '<br><a class="area__phone-1" href="tel:'.$fields['content']['phone_number_1'].'"><span>Phone: </span>'.$fields['content']['phone_number_1'].'</a>' : '' )
                                        ,( !empty($fields['content']['phone_number_2']) ? '<br><a class="area__phone-2" href="tel:'.$fields['content']['phone_number_2'].'"><span>Phone: </span>'.$fields['content']['phone_number_2'].'</a>' : '' )
                                        , '<br><span>'.$hours. '</span>'
                                    );
                                }
                            }
                            // close the locations wrapper
                            $return['column'] .= '</ul>';
                            break;
                            case 'form':
                                $return['column'] .= '<div class="contact__block-form site__fade site__fade-up"><p>Send Us An Email</p>'.do_shortcode('[gravityform id="'.$row['form']['id'].'" title="false" description="false"]').'</div>';
                                break;
                        default:
                            # code...
                            break;
                    }
                }
            }
            return $return['column'];
        }
    }


    // set return and guide string arrays
    $return = [];
    $guide = [];
    $imagetescontact = get_theme_mod( 'setting_contact_buttom_divider', '' ); 
    $imagetescontact2 = get_theme_mod( 'setting_contact_buttom_divider_top', '' );
    // guide string for the section
    $guide['section'] = '
        <section %s class="site__block block__contact" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imagetescontact2 ).'"'.'>
            <div class="container %s %s" style="%s %s">
                %s
                %s
                <ul class="columns">
                    <li class="left">%s</li>
                    <li class="right">%s</li>
                </ul>
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imagetescontact ).'"'.'>
        </section>
    ';

    // if left has rows
    $return['left'] = '';
    $return['right'] = '';

    $return['left'] .= return_column_content($cB['left']);
    $return['right'] .= return_column_content($cB['right']);

    $return['section'] = '';

    // write all the content we can into the opening until the left/right part
    $return['section'] .= sprintf(
        $guide['section']
        //  options for every block
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
        // post object grid options
        ,( !empty($cB['heading']) ? '<h2 class="block__heading site__fade site__fade-up">'.$cB['heading'].'</h2>' : '' )
        ,( !empty($cB['text']) ? '<div class="block__details site__fade site__fade-up">'.$cB['text'].'</div>' : '' )
        ,$return['left']
        ,$return['right']
    );

    // echo return string
    echo $return['section'];

    // clear the $cB, $return and $guide vars
    unset($cB, $return, $guide);
 ?>                                                                                                                                                                                                                                                      