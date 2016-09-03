<?php get_header();?>
    
      <?php
        global $post;
        
        $heading_image = get_post_meta($post->ID,"_heading_image",true);
        $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
        $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
      ?>      
      <!-- Page Heading --> 
      <div id="page-heading">
        <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
        <div class="heading-text<?php if ($bgtext_heading_position =="right") echo '-right';?>">
          <h3><?php the_title();?></h3>
          <p><?php echo $page_short_desc;?></p>
        </div>
      </div>
      <!-- Page Heading End -->
      <div class="clear"></div>
      
      <div class="center">
        <?php $enable_breadcrumbs = get_option('ecobiz_enable_breadcrumb');?>
        <?php if ($enable_breadcrumbs =="true") { ?>
          <div class="breadcrumb">
            <?php if ( function_exists( 'breadcrumbs_plus' ) ) breadcrumbs_plus(); ?>
          </div>
        <?php } ?>
        <!-- Main Content Wrapper -->
        <div class="maincontent-full">
        <?php $product_desc = get_option('ecobiz_product_desc');?>
        <?php echo stripslashes($product_desc);?>
        <br />
        <!-- Portfolio Filter //-->
    			<ul  id="filter">
          	<?php  
          	
          	$product_button_text = get_option('ecobiz_product_button_text');          	
            $categories = get_categories('taxonomy=product_category&orderby=ID&title_li=&hide_empty=0');
            foreach ($categories as $category) { 
            $termlink = get_term_link($category->slug,$category->taxonomy);
            ?>
              <li><a  class="<?php if (get_query_var($category->taxonomy) == $category->slug) echo 'current';?>" href="<?php echo $termlink;?>"><?php echo $category->name;?></a></li>
              <?php
            }
            ?>
        	</ul>
    			<div class="clear"></div>        
          <?php
          	global $post;
          	
          	$product_order = get_option('ecobiz_product_order') ? get_option('ecobiz_product_order') : "date";
            $product_cat = get_option('ecobiz_product_cat');
            $currency = get_option('ecobiz_currency');
            $billing_cycle = get_option('ecobiz_billing_cycle');            
            $product_button_text = get_option('ecobiz_product_button_text');

            while ( have_posts() ) : the_post();
            $counter++;
            $product_price = get_post_meta($post->ID,'_product_price',true);
            $product_image = get_post_meta($post->ID,'_product_image',true);
            $product_url = get_post_meta($post->ID,'_product_url',true);
            $product_feature = get_post_meta($post->ID,'_product_feature',true);
            $features_list = explode(",",$product_feature);
          ?>   
          
          <div class="productbox<?php if ($counter %3 == 0) echo '-last';?>">
            <div class="topproduct"></div>
            <div class="headingproduct">
              <div class="title">
                <h4><?php the_title();?></h4>
              </div>
              <div class="price">
                <span class="currency"><?php echo $currency ? $currency : "&#36;";?></span><span class="price"><?php echo $product_price;?></span><span class="month">/<?php if ($billing_cycle == "monthly") echo 'month'; else echo 'year';?></span>
              </div>
              <div class="clear"></div>
              <div class="description">
                <?php the_content();?>
              </div>
            </div>
            <div class="contentproduct">
              <ul class="productfeatures">
                <?php foreach ($features_list as $feature_list) { ?> 
                <li><img src="<?php echo get_template_directory_uri();?>/images/features-icon1.png" alt="" class="product-icon"/><?php echo $feature_list;?></li>
                <?php } ?>
              </ul>
              <div class="clear"></div>
              <div class="buttoncenter">
                <a href="<?php echo $product_url ? $product_url : "#";?>" class="button"><span><?php echo $product_button_text ? $product_button_text : "ORDER NOW!";?> <img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>
              </div>
              <div class="clear"></div>
            </div>
            <div class="bottomproduct"></div>
          </div> 
          
          <?php endwhile;?>      
        </div>
        <!-- Main Content Wrapper End -->
    
  <?php get_footer();?>