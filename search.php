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
        <div id="c2porduct-list">
            <?php if (have_posts()) :?>
            <!--glove category -->            
            <div class="head-cat"><span>Found: <strong><?php echo wp_specialchars($s, 1); ?></strong></span></div>
            <?php $itemcount = 1; ?>
            
            <ul class="list-items">
            
			<?php while (have_posts()) : the_post(); ?>            		
                    <?php if($itemcount == 3) : ?>
                    <li class="last">
                    <?php 
					$itemcount = 0;
					else : ?>
					<li>
					<?php endif; ?>
                    
                    <a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single"><img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=134&h=132&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" alt="<?php the_title(); ?>" /></a><br />
                    <a href="<?php the_permalink();?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a><br />
                    <?php limit_code_num(get_post_meta($post->ID,'_gmp_code',true)); ?>
                    
                    <div class="add-info">
					<small>
<?php echo get_instock(get_post_meta($post->ID,'_gmp_instock',true)) ?>
                    			</small> 
                    <a href="<?php the_permalink(); ?>" title="more detail" class="detail"><img src="<?php bloginfo('template_url'); ?>/styles/detail-btn.gif" alt="more detail" /></a>
                    <div class="clear"></div>
                    </li>
            
            <?php $itemcount++; ?>
  
	        <?php endwhile; ?>    
            
            </ul>
            
			<?php
				//include('wp-pagenavi.php');
				//if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
				wp_pagenavi(); 
			?>            
		
			<?php endif; ?>
            
        </div>
        <!--/c2-->
        
        <!--c3-->
        <div id="c3">
        
        <!--Newest Product --> 
            <div class="widget">           
            <h3>New Products</h3>
            	<ul>
            	<?php if (have_posts()) :			                   	   					
				  		
						$my_query = new WP_Query("cat=64&showposts=5&orderby=rand");
				
					    while ($my_query->have_posts()) : $my_query->the_post();
				 ?>
                            <li>
                            <a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single"><img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=100&h=48&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" alt="<?php the_title(); ?>" /></a>
                            <h5><a href="<?php the_permalink(); ?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a></h5>
                            <span><?php limit_code_num(get_post_meta($post->ID,'_gmp_code',true)); ?></span>									
                            </li>
            
				<?php 
                    		
						endwhile;
						
						wp_reset_query();
						
                       endif;  ?>      
                </ul>            
            </div>    
            <!--/Newest Product -->
            
            <!--popular Product -->
            <div class="widget">
            <h3>Most Popular Products</h3>            
            <?php
			  // give us the most popular product based on page views
			  $sql = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "cp_ad_pop_total a "
				   . "INNER JOIN " . $wpdb->posts . " p ON p.ID = a.postnum "
				   . "WHERE postcount > 0 AND post_status = 'publish' "
				   . "ORDER BY postcount DESC LIMIT 5");

			  $pageposts = $wpdb->get_results($sql);
			  ?>
            <?php if ($pageposts): ?>
            <ul>

			<?php 			
			foreach ($pageposts as $post): 
			
			setup_postdata($post);
			?>
                    <li>
                    <a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single"><img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=100&h=48&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" alt="<?php the_title(); ?>" /></a>
                    <h5><a href="<?php the_permalink(); ?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a></h5>
                    <span><?php limit_code_num(get_post_meta($post->ID,'_gmp_code',true)); ?></span>								
                    </li>
            
            <?php 
				
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
        <!--/c3-->
        
    </div>
    <!--/content-->

<?php
get_footer();
?>