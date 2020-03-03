<style>
#staffidimg{
  display:block;
  width:50%; height:50%;
  object-fit: cover;
}
</style>
<?php 
/**
 * Template Name: Staff
 * Template Post Type: staff
 */

    $fields = get_fields($post->ID);  

    if( $fields['status'] ){
        $format_staff = '
            <ul>    
                <li>
                    <div class=""><img id="staffidimg" src="%s"><div style="background-image: url(%s)" class="site__bgimg_img"></div></div>
                </li>
               
            </ul>
            <div><center>
                <h3>%s</h3>
               %s</center>
            </div>
        ';
        $return_staff = sprintf(
            $format_staff
            ,$fields['image']['url']
             ,$fields['image']['url']
            ,$post->post_title
            ,$fields['full_bio']
        );
    } else {
        $return_staff = '';
    }

    $return = '
        <section class="mod__featured_grid"><center>
            <div class="container">
                <div class="site__grid site__fade site__fade-up">
                    '.$return_staff.'
                </div>
            </div></center>
        </section>
    ';

    get_header();
?>
<main id="single_about">
<?php 
    echo $return;
    get_footer();
 ?>