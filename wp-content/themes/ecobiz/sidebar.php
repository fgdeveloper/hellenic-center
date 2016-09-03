        <?php $aboutpage = get_page_by_title(get_option('ecobiz_about_page'));?>
        <?php $servicespage = get_page_by_title(get_option('ecobiz_services_page'));?>
                
        <!-- Sidebar -->
        <div id="sidebar">
        <?php
      		$children=wp_list_pages( 'echo=0&child_of=' . $post->ID . '&title_li' );
      		if ($children) {
      			$parent = $post->ID;
      		}else{
      			$parent = $post->post_parent;
      			if(!$parent){
      				$parent = $post->ID;
      			}
      		}              
          $children = wp_list_pages("title_li=&child_of=".$parent."&echo=0&depth=1&menu_order=sort_column");
          $parent_title = get_the_title($parent);
          ?>      
          
          <?php
          if (!is_home() && !is_page($servicespage->ID) && !is_page_template('homepage-static.php') && !is_page_template('homepage-kwicksslider.php')) { 
            if ($children) { 
            ?>
          <div class="sidebar">
            <div class="sidebartop"></div>
            <div class="sidebarmain">
              <div class="sidebarcontent">
                <h4 class="sidebarheading"><?php echo $parent_title;?></h4>             
                  <ul class="sidelist">
           	      <?php echo $children;?>
                </ul>                                                  
              </div>                  
            </div>
            <div class="sidebarbottom"></div>
          </div>
        <?php } 
          }
        ?>   
          <!-- Sidebar Box -->
          
          
          <?php if (is_home()  || is_page_template('homepage-blog.php')  || is_page_template('homepage-kwicksslider.php')  || is_page_template('homepage-static.php')) { ?>
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Sidebar')) { ?>
            <?php get_template_part('default-widget','widget placeholder');?>
            <?php } ?>
          <?php } else if (is_category() || is_archive() || is_search()) {
              if (function_exists('dynamic_sidebar') && dynamic_sidebar('Category Sidebar')) : else : 
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) :
                  get_template_part('default-widget','widget placeholder');
                endif;
              endif;
            } else if (is_page_template('blog-template.php')) {
              if (function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')) : else : 
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) :
                  get_template_part('default-widget','widget placeholder');
                endif;
              endif;
            } else if (is_page($aboutpage->ID)) {
              if (function_exists('dynamic_sidebar') && dynamic_sidebar('About Page')) : else : 
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) :
                  get_template_part('default-widget','widget placeholder');
                endif;
              endif;
            } else if (is_page($servicespage->ID)) {
              if (function_exists('dynamic_sidebar') && dynamic_sidebar('Services Page')) : else : 
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) :
                  get_template_part('default-widget','widget placeholder');
                endif;
              endif;              
            } else if (is_single()) {
              if (function_exists('dynamic_sidebar') && dynamic_sidebar('Single Post')) : else : 
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) :
                  get_template_part('default-widget','widget placeholder');
                endif;
              endif;
            } else {
              if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) :
                $blog_cats_include = get_option('of_blog_categories');
                get_template_part('default-widget','widget placeholder');
              endif;
            }
          ?>  
          <!-- Sidebar Box End -->
        </div>
        <!-- Sidebar End -->