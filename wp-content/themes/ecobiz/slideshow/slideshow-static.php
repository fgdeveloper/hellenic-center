      <?php
        $static_slideshow_source = get_option('ecobiz_static_slideshow_source');
        $static_slideshow_title = get_option('ecobiz_static_slideshow_title');
        $static_slideshow_desc = get_option('ecobiz_static_slideshow_desc');
        $static_slideshow_buttontext = get_option('ecobiz_static_slideshow_buttontext');
        $static_slideshow_url = get_option('ecobiz_static_slideshow_url');
      ?>
            
      <!-- Slideshow Wrapper -->
      <div id="slide-wrapper">
        <!-- Slideshow Static -->
        <div class="static-block">
        <?php 
          if ($static_slideshow_source != "") {
            switch_slideshow_src($static_slideshow_source,620,345); 
          } else { ?>
            <img src="<?php echo get_template_directory_uri();?>/images/image-static.jpg" alt="" />
          <?php } ?> 
        </div>      
        <div class="static-text">
          <h3><?php echo ($static_slideshow_title) ? stripslashes($static_slideshow_title) : "Welcome to ECOBIZ";?></h3>
          <?php echo $static_slideshow_desc ? "<p>".stripslashes($static_slideshow_desc)."</p>" : "
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Etiam vulputate, dui quis tincidunt pretium, urna quam rutrum libero, at porttitor dui nibh in arcu. Maecenas sed turpis cursus leo venenatis mattis ut nec diam. Proin dignissim posuere venenatis. </p>
          <p>Aliquam id tellus et ligula blandit ultrices. Maecenas sed turpis cursus leo venenatis mattis ut nec diam. Proin dignissim posuere venenatis. </p>";?>
          <a href="<?php echo $static_slideshow_url ? $static_slideshow_url : "#";?>" class="button">
            <span><?php echo $static_slideshow_buttontext ? stripslashes($static_slideshow_buttontext) : __("VIEW MORE DETAIL",'ecobiz');?> 
            <img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/>
            </span>
          </a>
        </div>
        <!-- Slideshow Static End -->
      </div>
      <!-- Slideshow Wrapper End -->