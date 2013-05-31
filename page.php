<?php
get_header();?>

    <!--start content-->
    <div id="content">
    	
        <!--c1-->
    	<div id="c1">
        
        	<!--Promotion Product-->
        	<div id="promotion">
            	<h3>Promotion Product</h3>
                <ul>
                	<?php 
					$my_query = new WP_Query("cat=64&showposts=4&orderby=rand");
					$image = get_post_meta($post->ID, "image", true);     
					$count = 0; 		
					
					if (have_posts()) :
						  while ($my_query->have_posts()) : $my_query->the_post();
								
								if($count == 3){ ?>
									<li class="last">
					<?php			} else { ?>
									<li>
					<?php 		} ?>
								<a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single">
                                <img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=185&h=105&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>"></a><br />
								<a href="<?php the_permalink();?>" class="product-name"><strong><?php the_title(); ?></strong></a><br />
                                <?php limit_code_num(get_post_meta($post->ID,'_gmp_code',true)); ?><br />
								
                                <div class="add-info">
                    <?php get_price_items(get_post_meta($post->ID,'_gmp_price',true)); ?>
                    <a href="<?php the_permalink(); ?>" title="more detail" class="detail"><img src="<?php bloginfo('template_url'); ?>/styles/detail-btn.gif" alt="more detail" /></a>
                    <div class="clear"></div>
								</li>
					<?php			
								$count++;								
							endwhile;
							
							wp_reset_query();
							
						endif;
					?>
                </ul>
            </div>            
            <!--/Promotion-->
            
        </div>
        <!--/c1-->
        
        <!--c2-->
        <div id="c2">
        
        <div class="pages">
        	<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?> 
                
                <h2><?php the_title(); ?></h2>
                <?php the_content('Read the rest of this entry &raquo;'); ?>
                
                <?php endwhile; 
            	else : ?>
        
                <h2>Not Found</h2>
                <p>Sorry, but you are looking for something that isn't here.</p>
        
            <?php endif; ?>
        </div>        
        <!--Newest Product --> 
            <div class="related-product">           
            <h3>New Products</h3>
            	<ul class="list-items-detail-page">
            	<?php if (have_posts()) :			                   	   					
				  		
						$my_query = new WP_Query("cat=64&showposts=2&orderby=rand");
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
									</li>
            
				<?php 
                    		$count++;
						endwhile;
						
						wp_reset_query();
						
                       endif;  ?>      
                </ul>            
            </div>    
            <!--/Newest Product -->
            
            <!--popular Product -->
            <div class="most-popular">
            <h3>Most Popular Products</h3>            
            <?php
			  // give us the most popular product based on page views
			  $sql = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "cp_ad_pop_total a "
				   . "INNER JOIN " . $wpdb->posts . " p ON p.ID = a.postnum "
				   . "WHERE postcount > 0 AND post_status = 'publish' "
				   . "ORDER BY postcount DESC LIMIT 2");

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