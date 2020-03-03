<?php 

    $guide = []; 
    $return = [];
    $return['section'] = '';

    // Functions 
    function get_menu_items($menu_style, $item){
        switch($menu_style){
            case 'menu_photo_list': 
            $format = '
                <li class="menu_item site__fade site__fade-up">
                    %s
                    <div>
                        <h3>%s</h3>
                        <div class="menu__item-description">%s</div>
                        %s
                    </div>
                </li>
            ';
           
            $return = sprintf(
                $format
                ,(!empty($item['image']) ? '<div class="image_provided block" style="background-image:url('.$item['image']['url'].');"></div>' : '')
                ,(!empty($item['title']) ? $item['title'] : '')
                ,(!empty($item['description']) ? $item['description'] : '')
                ,(!empty($item['price']) ? '<div class="menu__item-price">$'.$item['price'].'</div>' : '')
            );
            break;

            case 'menu_photo_tiled_x3':
            $price = (!empty($item['price']) ? $item['price'] : '');
            $priceArr = explode('.',$price);
            $format = '
                <li class="menu_item site__fade site__fade-up">
                    %s
                    <h3 class="menu__item-price">%s <div>$%s.<span>%s</span></div></h3>
                    <div class="menu__item-description">%s</div>
                </li>
            ';

            $return = sprintf(
                $format
                ,(!empty($item['image']) ? '<div class="image_provided block" style="background-image:url('.$item['image']['url'].');"></div>' : '')
                ,(!empty($item['title']) ? $item['title'] : '')
                ,$priceArr[0]
                ,$priceArr[1]
                ,(!empty($item['description']) ? $item['description'] : '')
            );
            break;

            default: 
            $format = '
                <li class="menu_item site__fade site__fade-up">
                    <h3 class="menu__item-price">%s <span class="menu_price">%s</span></h3>
                    <div class="menu__item-description">%s</div>
                </li>
            ';
            
            $return = sprintf(
                $format
                ,(!empty($item['title']) ? $item['title'] : '')
                ,(!empty($item['price']) ? $item['price'] : '')
                ,(!empty($item['description']) ? $item['description'] : '')
            );
            break;
        }
        return $return;
    }

    // If there are menu posts added to the Food Menus block
    if( !empty($cB['menus']) ){

        // open buttons and menus container
        $return['buttons_and_menus'] = '<div id="tabs_style__'.$cB['tabs_style'].'" class="tabs">'; 
        
        // open buttons wrapper (sibling of content area)
        $return['buttons'] = '<ul class="button_group">';
        
        // open wrapper for the menus area (sibling of buttons)
        $return['menus'] = '<div class="menu_area tabs_style__'.$cB['tabs_style'].'">';

        // for each menu
        foreach( $cB['menus'] as $i => $menu ){

            // get fields for this menu post object
            $fields = get_fields($menu['menu_post']->ID);

            // guide for a button (pill etc)
            $guide['buttons'] = '
                <li class="'.( ($i===0) ? 'tab_active' : '' ).'">
                    <a href="javascript:;">%s</a>
                </li>
            ';
            
            // write to the button group
            $return['buttons'] .= sprintf(
                $guide['buttons'] 
                ,$menu['menu_post']->post_title
            );

            // if this menu post has menu sections
            if( !empty($fields['menu_sections']) ){

                if($fields['style'] !== 'menu_text_sub_group_half'){
                    // open the wrapper for the menu sections
                    $return['menu_sections'] = '<ul class="menu_section '.$fields['style'].( ($i===0) ? ' current_food_menu ' : ' hidden_food_menu ' ).'">';
                }else{
                    // open the wrapper for the menu sections
                    $return['menu_sections'] = '<ul class="menu_section '.$fields['style'].' menu_flex '.( ($i===0) ? ' current_food_menu ' : ' hidden_food_menu ' ).'">';
                }

                // loop thru each menu section (rows in the repeater)
                foreach( $fields['menu_sections'] as $i => $section ){

                    // Menu Header Format
                    if($fields['style'] !== 'menu_text_sub_group_half'){
                        $header_format = '
                            <h2><span>%s</span></h2>
                            %s
                        ';
                    }else{
                        $header_format = '
                            <div><h2><span>%s</span></h2>
                            %s
                        ';
                    }

                    // Menu Title and Description
                    $return['menu_sections'] .= sprintf(
                        $header_format
                        ,(!empty($section['title']) ? $section['title'] : '')
                        ,(!empty($section['description']) ? $section['description'] : '')
                    );

                    // Open Menu Items Content
                    $return['menu_sections'] .= '<ul class="menu_items">';

                    foreach( $section['item'] as $i => $item){
                        $return['menu_sections'] .=  get_menu_items($fields['style'], $item);
                    }

                    // Close Menu Items Content
                    if($fields['style'] !== 'menu_text_sub_group_half'){
                        $return['menu_sections'] .= '</ul>';
                    }else{
                        $return['menu_sections'] .= '</ul></div>';
                    }
                }

                // close the menu sections wrapper
                $return['menu_sections'] .= '</ul>';

                // write this menu into the menus wrapper
                $return['menus'] .= $return['menu_sections'];
            }
        }

        // close buttons
        $return['buttons'] .= '</ul>';

        // close content
        $return['menus'] .= '</div>';
        
        // close buttons and menus container
        $return['buttons_and_menus'] .= $return['buttons'] . $return['menus'];
        
        $return['buttons_and_menus'] .= '</div>';
    }
    $imagemenu = get_theme_mod( 'setting_menu1_buttom_divider', '' ); 
    $imagemenu2 = get_theme_mod( 'setting_menu1_buttom_divider_top', '' );
    $guide['section'] = '
        <section %s class="site__block block__food_menus" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imagemenu2 ).'"'.'>
            <div class="container %s %s" style="%s %s">
                %s
                %s
                %s
                %s
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imagemenu ).'"'.'>
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
        ,( !empty($cB['text']) ? '<p class="block__details">'.$cB['text'].'</p>' : '' )

        // Return the food menus block content which is the buttons and menus
        ,( !empty($return['buttons_and_menus']) ? $return['buttons_and_menus'] : '' )

        ,( !empty($cB['view_all_button']['link']) ? '<a class="site__button" href="'.$cB['view_all_button']['link']['url'].'">'.$cB['view_all_button']['link']['title'].'</a>' : '' )
    );

    echo $return['section'];
     
    // clear the $cB, $return, $index and $guide vars for the next block
    unset($cB, $return, $guide);
?>