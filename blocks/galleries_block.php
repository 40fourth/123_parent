<style>


#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 999; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: hidden; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 65px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

<?php 
/**
 * Galleries Block
 * 
 */
    // empty return string
    $return = [];
    $guide = [];
    $return['section'] = '';
    $return['tabs'] = '';
    
    // if we have galleries
    if( !empty($cB['galleries']) ){

        $return['galleries'] = '';

        // set the galleries guide string
        $guide['galleries'] = '<li class="site__fade site__fade-up"><div><div class="image" style="background-image: url(%s)" onclick="openimage('."'".'%s'."'".')"></div></div></li>';
        // set the galleries return string
        $return['galleries'] .= '<div class="">';

        // open the tabs list
        if( $cB['tab_type'] != 'none' ){
            $return['tabs'] .= '<div class="tabs site__fade site__fade-up"><ul>';
        }

        // loop thru the galleries
        foreach( $cB['galleries'] as $i => $gallery ){

            // create a tab for each gallery
            if( $cB['tab_type'] !== 'none' ){
                $return['tabs'] .= '<li class="'.( ($i === 0 ) ? 'tab_active' : '' ).'"><a href="javascript:;" style="color:'.$cB['foreground_color'].';">'.$gallery['title'].'</a></li>';
            }

            // open the galleries grid
            if ( $cB['tab_type'] == 'none' ){
                $return['galleries'] .= '<div class="site__grid '.( ($i===0) ? 'current_gallery' : 'hidden_gallery' ).'"><h2 class="site__fade site__fade-up">'.$gallery['title'].'</h2><ul>';
            }else{
                $return['galleries'] .= '<div class="site__grid '.( ($i===0) ? 'current_gallery' : 'hidden_gallery' ).'"><ul>';
            }

            // loop thru the gallery images to create line items
            foreach( $gallery['images'] as $image ){
                $return['galleries'] .= sprintf(
                    $guide['galleries']
                    ,$image['url']
                     ,$image['url']
                );
            }
            $return['galleries'] .= '</ul></div>';
        }
        // close the tabs list
        if( $cB['tab_type'] !== 'none' ){
            $return['tabs'] .= '</ul></div>';
        }

        $return['galleries'] .= '</div>';
    }
    $imagegallery = get_theme_mod( 'setting_gallery_buttom_divider', '' ); 
    $imagegallery2 = get_theme_mod( 'setting_gallery_buttom_divider_top', '' );
    // empty guide string 
    $guide['section'] = '
        <section %s class="site__block block__galleries" style="%s %s %s %s %s %s %s %s">
        <img class="spacerdiviermenutop" src='.'"'. esc_url( $imagegallery2 ).'"'.'>
            <div class="container %s %s" style="%s %s">
                %s
                %s
                <div class="">
                    %s
                    %s
                </div>
                %s
            </div>
            <img class="spacerdiviermenubottom" src='.'"'. esc_url( $imagegallery ).'"'.'>
        </section>
    ';

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
        ,( !empty($cB['heading']) ? '<h2 class=" block__heading site__fade site__fade-up">'.$cB['heading'].'</h2>' : '' )
        ,( !empty($cB['text']) ? '<div class="block__details site__fade site__fade-up">'.$cB['text'].'</div>' : '' )
        // gallery options
        ,( !empty($return['tabs']) ? $return['tabs'] : '' )
        ,( !empty($return['galleries']) ? $return['galleries'] : '' )
        // view all
        ,( !empty($cB['view_all_button']['link']) ? '<a class="site__button" href="'.$cB['view_all_button']['link']['url'].'">'.$cB['view_all_button']['link']['title'].'</a>' : '' )
    );


    // echo return string
    echo $return['section'];

    // clear the $cB, $return, $index and $guide vars for the next block
    unset($cB, $return, $guide);
 ?>
 
 
 
 <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");
function openimage(url){
// Get the image and insert it inside the modal - use its "alt" text as a caption
var modalImg = document.getElementById("img01");

  modal.style.display = "block";
  modalImg.src = url;
 

}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>