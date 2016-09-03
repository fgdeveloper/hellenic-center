      </div>
      <div class="clear"></div>
    </div>

    <!-- Footer Start -->
    <div id="bottomwrapper"></div>
    
    <div id="footer">
      <?php $disable_footer_columns = get_option('ecobiz_disable_footer_columns');?>
      <?php if ($disable_footer_columns  !="true") { 
        if (function_exists('switch_footer_columns')) switch_footer_columns();
      } ?>
      <div class="clear"></div>
      
      <div class="bottom">
        <!-- Footer Menu -->
        <div class="footermenu">
          <?php 
            if (function_exists('wp_nav_menu')) { 
              wp_nav_menu( array( 'menu_class' => '', 'theme_location' => 'footernav', 'fallback_cb'=>'imediapixel_footermenu_pages','depth' =>1 ) );
            } 
          ?>        
        </div>
        <!-- Footer Menu End -->
        
        <!-- Site Copyright -->
        <div class="copyright">
          <p><?php $footer_text = get_option('ecobiz_footer_text');?>
        <?php echo ($footer_text) ? $footer_text : "&copy; 2007 - 2011 - Designed by <a href='#'>imediapixel.com</a>";?></p>
        </div>
        <!-- Site Copyright End -->     
      </div>
    </div>
    <!-- Footer End  -->
  </div>
  <?php 
  $ga_code = get_option('ecobiz_ga_code');
  if ($ga_code) echo stripslashes($ga_code);
  ?>    
  <?php wp_footer();?>
  <script type="text/javascript">Cufon.now();</script> 
</body>
</html>