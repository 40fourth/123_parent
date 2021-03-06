<?php 
/**
 * Blog Posts Block
 * 
 */
    // empty return string
    $return['section'] = '';
    $guide = [];

    $return['posts'] ='<ul>';
    
    $guide['posts'] = '
        <li class="site__fade site__fade-up">
            <a href="%s">
                %s
                <div class="content">
                    <h5>%s</h5>
                    <div class="excerpt block__item-body">%s</div>
                    <p class="read_more" style="color:'.$cB['foreground_color'].';">Read More</p>
                </div>
            </a>
        </li>
    ';
    
    foreach($cB['blog_posts'] as $i => $post) {
        
        $fields = get_fields($post['blog_post']->ID);
            
        if( $fields['status'] ){
            $return['posts'] .= sprintf(
                $guide['posts']
                ,get_post_permalink($post['blog_post'])
                ,( !empty($fields['featured_image']['url']) ? '<div class="image__container"><div class="image rectangular_block" style="background-image:url('.$fields['featured_image']['url'].')"></div></div>' : '')
                ,$post['blog_post']->post_title
                ,(!empty($fields['excerpt']) ? $fields['excerpt'] : '')
            );
        }
    }
    $return['posts'] .= '</ul>';
    $imageblog = get_theme_mod( 'setting_blog_buttom_divider', '' ); 
    $imageblog2 = get_theme_mod( 'setting_blog_buttom_divider_top', '' );
    // empty guide string 
    $guide['section'] = '
        <section %s class="site__block block__blog_posts" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imageblog2 ).'"'.'>
            <div class="container %s %s" style="%s %s">
                %s
                %s
                %s
                %s
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imageblog ).'"'.'>
        </section>
    ';

    $return['section'] .= sprintf(
        $guide['section']
        ,( !empty($cB['anchor_enabled'] ) ? 'id="'.strtolower($cB['anchor_link_text']).'"' : '' ) // add an ID tag for the long scroll
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
        ,( !empty( $cB['heading'] ) ? '<h2 class="block__heading" style="text-align:'.$cB['heading_alignment'].';">'.$cB['heading'].'</h2>' : '' )
        ,( !empty( $cB['text'] ) ? '<div class="block__details">'.$cB['text'].'</div>' : '' )
        ,( !empty( $return['posts'] ) ? $return['posts'] : '' )
        ,( !empty( $cB['view_all_button']['link'] ) ? '<a class="site__button" href="'.$cB['view_all_button']['link']['url'].'">'.$cB['view_all_button']['link']['title'].'</a>' : '' )
    );

    // echo return string
    echo $return['section'];

    // clear the $cB, $return, $index and $guide vars for the next block
    unset($cB, $return, $guide);
 ?>