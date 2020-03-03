<?php 
/**
 * Services Block
 * 
 */
    // empty return string
    $return = [];
    $guide = [];
    $return['section'] = '';
    $guide['section'] = '';

    $guide['grid'] = '';
    
    $return['grid'] ='<ul class="site__fade site__fade-up square_ul">';

    foreach($cB['testimonials'] as $i => $testimonial){
        
        $fields = get_fields($testimonial['testimonial']->ID);

        if( $fields['type'] == 'text' ){
            $guide['grid'] = '
                <li class="testimonial_text">
                    <div>
                        %s
                        <div class="testimonial_content">
                            <div class="testimonial_name">
                                %s
                                %s
                            </div>
                            <div class="testimonial_details block__item-body">%s</div>
                        </div>
                    </div>
                </li>
            ';
            $return['grid'] .= sprintf(
                $guide['grid']
                ,(!empty($fields['image']) ? '<div class="block" style="background-image:url('.$fields['image']['url'].');"></div>' : '')
                ,(!empty($fields['name']) ? '<h3>'.$fields['name'].'</h3>' : '')
                ,(!empty($fields['location']) ? '<p>'.$fields['location'].'</p>' : '')
                ,(!empty($fields['details']) ? $fields['details'] : '')
            );    
        }
        else if( $fields['type'] == 'image' ){
            $guide['grid'] = '
                <li class="testimonial_image">
                    <div>
                        %s
                        <div class="testimonial_content">
                            <div class="testimonial_name">
                                %s
                                %s
                            </div>
                            <div class="testimonial_details block__item-body">%s</div>
                        </div>
                    </div>
                </li>
            ';
            $return['grid'] .= sprintf(
                $guide['grid']
                ,(!empty($fields['image']) ? '<div class="block" style="background-image:url('.$fields['image']['url'].');"></div>' : '')
                ,(!empty($fields['name']) ? '<h3>'.$fields['name'].'</h3>' : '')
                ,(!empty($fields['location']) ? '<p>'.$fields['location'].'</p>' : '')
                ,(!empty($fields['details']) ? $fields['details'] : '')
            );
        }
        else if( $fields['type'] == 'video' ){
            $guide['grid'] = '
                <li class="testimonial_video">
                    <div>
                        %s
                        <div class="testimonial_content">
                            <div class="testimonial_name">
                                %s
                                %s
                            </div>
                            <div class="testimonial_details block__item-body">%s</div>
                        </div>
                    </div>
                </li>
            ';
            $return['grid'] .= sprintf(
                $guide['grid']
                ,(!empty($fields['video_file']['url']) ? '<video controls><source src="'.$fields['video_file']['url'].'"type="video/mp4"></video>' : '')
                ,(!empty($fields['name']) ? '<h3>'.$fields['name'].'</h3>' : '')
                ,(!empty($fields['location']) ? '<p>'.$fields['location'].'</p>' : '')
                ,(!empty($fields['details']) ? $fields['details'] : '')
            );
        }
    }

    $return['grid'] .= '</ul>';
    $imagetestimonial = get_theme_mod( 'setting_testimonial_buttom_divider', '' ); 
    $imagetestimonial2 = get_theme_mod( 'setting_testimonial_buttom_divider_top', '' );
    // empty guide string 
    $guide['section'] = '
        <section %s class="site__block block__testimonials" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imagetestimonial2 ).'"'.'>
            <div class=" container %s %s" style="%s %s">
                %s
                %s
                %s
                %s
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imagetestimonial ).'"'.'>
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
        ,( !empty($cB['heading']) ? '<h2 class="site__fade site__fade-up block__heading" style="text-align:'.$cB['heading_alignment'].';">'.$cB['heading'].'</h2>' : '' )
        ,( !empty($cB['text']) ? '<div class="slider site__fade site__fade-up block__details">'.$cB['text'].'</div>' : '' )
        ,( !empty($return['grid']) ? '<div class=" site__grid">'.$return['grid'].'</div>' : '' )
        ,( !empty($cB['view_all_button']['link']) ? '<a class="site__button" href="'.$cB['view_all_button']['link']['url'].'">'.$cB['view_all_button']['link']['title'].'</a>' : '' )
    );

    // echo return string
    echo $return['section'];

    // clear the $cB, $return, $index and $guide vars for the next block
    unset($cB, $return, $guide);
 ?>
 <script>

function myFunction() {var delayInMilliseconds = 10000; //1 second

setTimeout(function() {
 var x = document.getElementsByClassName("testimonial_next");
  x[0].click();
  myFunction();
}, delayInMilliseconds);
    
    
  
}
 myFunction();
</script>