<?php
/*
Template Name: Gallery
*/

/**********************************************************************
* PRESTIGE WORDPRESS EDITION 
* (Ideal For Business And Personal Use: Portfolio or Blog)   
* 
* File name:   
*      gallery.php
* Brief:       
*      Theme gallery page template code
* Author:      
*      DigitalCavalry
* Author URI:
*      http://themeforest.net/user/DigitalCavalry
* Contact:
*      digitalcavalry@gmail.com   
***********************************************************************/ 

    get_header();     
    the_post();
    
    global $post;                                                 
    $pageid = $post->ID;
    $gallid = get_post_meta($post->ID, 'page_gallery', true);
    $gall_on_page = get_post_meta($post->ID, 'page_gallery_items', true); 
    $page_subtitle = get_post_meta($post->ID, 'page_subtitle', true); 
    if($page_subtitle != '')
    {
        $page_subtitle = '<span>'.$page_subtitle.'</span>';
    }
        
    
    $dccp = GetDCCPInterface();                                              
?>


    <div id="content">
         
        <?php 
                echo '<div class="page-width-920">';
               
               echo '<h1>'.$post->post_title.$page_subtitle.'</h1>';  
               
               global $nggdb;
               if(isset($nggdb) and $gallid != CMS_NOT_SELECTED)
               {    
                    $plist = $nggdb->get_gallery($gallid, 'sortorder', 'ASC', true, 0, $start = 0);
                    
                    $out = '';
                    $out .= '<div class="gallery-slider" style="height:'.(190*$gall_on_page/5).'px;">';
                    $counter = 0;
                    $row_counter = 0; 
                    $on_page = $gall_on_page;
                    $on_row = 5;
                    foreach($plist as $thumb)
                    {   
                        if($counter == 0)
                        {
                            $out .= '<div class="page">';    
                        }
                        $counter++;                        
                        
                        if($row_counter+1 == $on_row)
                        {
                            $out .= '<div class="thumb-wrapper-last">
                                <div class="img-wrapper framed"><a class="loader async-img" rel="'.$thumb->thumbURL.'"></a></div>
                                <a href="'.$thumb->imageURL.'" class="triger" '.$thumb->thumbcode.' title="'.stripcslashes($thumb->description).'"></a><a class="desc link-tip-bottom" title="'.stripcslashes($thumb->description).'">'.dcf_neatTrim(stripcslashes($thumb->description), 20, '..').'</a>
                            </div>';
                            $row_counter = 0;
                        } else
                        {
                            $out .= '<div class="thumb-wrapper">
                                <div class="img-wrapper framed"><a class="loader async-img" rel="'.$thumb->thumbURL.'"></a></div>
                                <a href="'.$thumb->imageURL.'" class="triger" '.$thumb->thumbcode.' title="'.stripcslashes($thumb->description).'"></a><a class="desc link-tip-bottom" title="'.stripcslashes($thumb->description).'">'.dcf_neatTrim(stripcslashes($thumb->description), 20, '..').'</a>
                            </div>';
                            $row_counter++;                            
                        }                                               
                        
                        if($counter == $on_page)
                        {
                            $out .= '</div><!--page-->';
                            $counter = 0;    
                        }
                                                            
                    }
                    
                    if($counter != 0)
                    {
                       $out .= '</div><!--page-->';  
                    }
                    
                    $out .= '<div class="control-panel">
                        <a class="prev">prev</a>
                        <span class="pages">1/1</span>
                        <a class="next">next</a>
                    </div>';                    
                    $out .= '</div>';
                    echo $out;  
               } // if
               
               the_content(); 
                if(comments_open($pageid))
                {
                    echo '<a name="comments"></a>';
                    comments_template();
                }                
                  
           ?>                                                                     
                   
                           
        </div>  <!-- page-width-xx0 -->
        <div class="clear-both"></div>
    </div> <!-- content -->
    
<?php    
    get_footer();
?>



