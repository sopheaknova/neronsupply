<?php
get_header();?>
    
    <!--start content-->
  <div id="content">
    	
        <!--c1-->
    	<div id="c1">
        
        	<!--left menu-->
        	<div class="left-menu">
            	<h3>Product Categories</h3>
                
                <!--menu-left-glove-->
                <div id="menu-left-glove" class="ddsmoothmenuleftglove">
                <h4>Gloves &amp; Safety Products</h4>
                <ul>
					<?php wp_list_categories('orderby=id&title_li=0&child_of=3'); ?>
                </ul>
                <h4>Electronic Products</h4>
                <ul>               	
                    <?php wp_list_categories('orderby=id&title_li=0&child_of=4'); ?>
                </ul>
                <h4>Home Care Products</h4>
                <ul>               	
                   <?php wp_list_categories('orderby=id&title_li=0&child_of=5'); ?>
                </ul>    
                </div>
                <!--/menu-left-glove-->
            </div>            
            <!--/left menu-->            
        </div>
        <!--/c1-->
        
        <!--c2-->
        <div id="c2">
        	<!--product detail-->
            <div id="product-detail">            
            	<?php if (have_posts()) :                    	   						  

					   while (have_posts()) : the_post(); ?>
                           
            	<!--product photo-->
            	<div class="photo">
                <?php if (get_post_meta($post->ID,'_gmp_image_01',true) != '') : ?>
                <a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="productphoto"><img src="<?php bloginfo('template_url'); ?>/images/zoom.png" alt="zoom in" class="zoomin" /></a>
                <img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=380&h=227&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" id="largeImg">                
                <!--<ul class="list-product-photo">
                	<li><a href="#"><img src="/script/timthumb.php?q=100&w=55&h=55&src="></a></li>
                </ul>-->
                <?php else :?>
					<img src="<?php bloginfo('template_url'); ?>/images/none-image.gif" width="380" height="227" alt="None Image" />
				<?php endif; ?>
                </div>
                <!--/product photo-->
                
                <!--product info-->
                <div class="product-info">					                                        
                                <h2><?php the_title(); ?></h2>
                                <span><?php echo get_post_meta($post->ID,'_gmp_code',true); ?><br />
                                In Stock: <strong><?php echo get_post_meta($post->ID,'_gmp_instock',true) ?></strong></span>
                                
                                <div class="desc">			                    	                                    
                                    <strong>Description:</strong>            	                    
									<?php the_content('Read the rest of this entry &raquo;'); ?>                                    
                                    
                                </div>
                                <p class="stats"><?php if (function_exists('cp_ad_views_today')) { cp_ad_views_today($post->ID, '', __('total views','cp'), __('so far today','cp'), 0, 'noshow'); } ?></p>
                        <?php 						
								endwhile; 
                
                        else : ?>
                
                        <h2>Not Found</h2>
                        <p>Sorry, but you are looking for something that isn't here.</p>
                
                    <?php endif; ?>                                    
                    
                </div>
                <!--/product info-->
            </div>            
            <!--/product detail-->
            
            <!--Related Product --> 
            <div class="related-product">           
            <h3>Related Products</h3>
            	<ul class="list-items-detail-page">
            	<?php if (have_posts()) :
				
						//the loop
						$categories = get_the_category();			
						$related = '';
						foreach($categories as $category){
						   $related .= $category->cat_ID . ","; //category name
						}			
						$cat_related = substr($related, 0, strlen($related)-1);                    	   					
				  		
						$my_query = new WP_Query("cat=$cat_related&showposts=6&orderby=rand");
						$count = 0;
					    while ($my_query->have_posts()) : $my_query->the_post();
                        	
							if(($count % 2) == 0) {
								echo "<li>"; ?>
							<?php } else{ ?>
								<li class="last">
							<?php } ?>
									<a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single"><img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=150&h=132&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" alt="<?php the_title(); ?>" /></a><br />
									<a href="<?php the_permalink(); ?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a><br />
									<?php limit_code_num(get_post_meta($post->ID,'_gmp_code',true)); ?>
                                    
                                    <div class="add-info">
                                    <small>
<?php echo get_instock(get_post_meta($post->ID,'_gmp_instock',true)) ?>
                    			</small> 
									<a href="<?php the_permalink(); ?>" title="more detail" class="detail"><img src="<?php bloginfo('template_url'); ?>/styles/detail-btn.gif" alt="more detail" /></a>
                                    <div class="clear"></div>
                                    </div>
									</li>
            
				<?php 
                    		$count++;
						endwhile;
						
						wp_reset_query();
						
                       endif;  ?>      
                </ul>            
            </div>    
            <!--/Related Product -->
            
            <!--popular Product -->
            <div class="most-popular">
            <h3>Most Popular Products</h3>            
            <?php
			  // give us the most popular product based on page views
			  $sql = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "cp_ad_pop_total a "
				   . "INNER JOIN " . $wpdb->posts . " p ON p.ID = a.postnum "
				   . "WHERE postcount > 0 AND post_status = 'publish' "
				   . "ORDER BY postcount DESC LIMIT 6");

			  $pageposts = $wpdb->get_results($sql);
			  ?>
            <?php if ($pageposts): ?>
            <ul class="list-items-detail-page">

			<?php 
			$count = 0;	
			foreach ($pageposts as $post): 
			
			setup_postdata($post);
			
            if(($count % 2) == 0) {
				echo "<li>"; ?>
			<?php } else{ ?>
				<li class="last">
			<?php } ?>
                    <a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single"><img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=150&h=132&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" alt="<?php the_title(); ?>" /></a><br />
                    <a href="<?php the_permalink(); ?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a><br />
                    <?php limit_code_num(get_post_meta($post->ID,'_gmp_code',true)); ?>

                    <div class="add-info">
                    <small>
<?php echo get_instock(get_post_meta($post->ID,'_gmp_instock',true)) ?>
                    			</small> 
                    <a href="<?php the_permalink(); ?>" title="more detail" class="detail"><img src="<?php bloginfo('template_url'); ?>/styles/detail-btn.gif" alt="more detail" /></a>
                    <div class="clear"></div>
                    </div>
                    </li>
            
            <?php 
				$count++;
			endforeach; ?>
            
            </ul>

		    <?php // if(function_exists('cp_pagination')) cp_pagination(); ?>

            <?php else: ?>
                <div align="center">
                    <h3><?php _e('Sorry, no listings were found.','cp')?></h3>
                </div><!-- /whiteblock -->

            <?php endif; ?>
            
            </div>
            <!--/popular Product -->
            <div class="clear"></div>
            
        </div>
      <!--/c2-->
           
    </div>
    <!--/content-->

<?php
get_footer();
?>