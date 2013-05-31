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
					$my_query = new WP_Query("cat=64&showposts=5&orderby=rand");
					$image = get_post_meta($post->ID, "image", true);     
					$count = 0; 		
					
					if (have_posts()) :
						  while ($my_query->have_posts()) : $my_query->the_post();
								
								if($count == 4){ ?>
									<li class="last">
					<?php			} else { ?>
									<li>
					<?php 		} ?>
								<a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single">
                                <img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=185&h=105&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>"></a><br />
								<a href="<?php the_permalink();?>" class="product-name"><strong><?php the_title(); ?></strong></a><br />
								<?php echo get_post_meta($post->ID,'_gmp_code',true); ?>
								</li>
					<?php			
								$count++;								
							endwhile;
						endif;
					?>
                </ul>
            </div>            
            <!--/Promotion-->
            
        </div>
        <!--/c1-->
        
        <!--c2-->
        <div id="c2">
        
        <div class="pages not-found">
        	<strong>Sorry!</strong>
        	<h2>Product - Not Found</h2>
        </div>        
        <!--Newest Product --> 
            <div class="related-product">           
            <h3>New Products</h3>
            	<ul class="list-items-detail-page">
            	<?php if (have_posts()) :			                   	   					
				  		
						$my_query = new WP_Query("cat=64&showposts=6&orderby=rand");
						$count = 0;
					    while ($my_query->have_posts()) : $my_query->the_post();
                        	
							if(($count % 2) == 0) {
								echo "<li>"; ?>
							<?php } else{ ?>
								<li class="last">
							<?php } ?>
									<a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single"><img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=150&h=80&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" alt="<?php the_title(); ?>" /></a><br />
									<a href="<?php the_permalink(); ?>" class="product-name"><strong><?php if (strlen(get_the_title()) >= 45) echo substr(get_the_title(), 0, 45).'...'; else the_title(); ?></strong></a><br />
									<?php echo get_post_meta($post->ID,'_gmp_code',true); ?>
									<a href="<?php the_permalink(); ?>" title="more detail" class="detail"><img src="<?php bloginfo('template_url'); ?>/styles/detail-btn.gif" alt="more detail" /></a>
									</li>
            
				<?php 
                    		$count++;
						endwhile;
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
                    <a href="<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" rel="single"><img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=150&h=80&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>" alt="<?php the_title(); ?>" /></a><br />
                    <a href="<?php the_permalink(); ?>" class="product-name"><strong><?php if (strlen(get_the_title()) >= 45) echo substr(get_the_title(), 0, 45).'...'; else the_title(); ?></strong></a><br />
                    <?php echo get_post_meta($post->ID,'_gmp_code',true); ?>
                    <a href="<?php the_permalink(); ?>" title="more detail" class="detail"><img src="<?php bloginfo('template_url'); ?>/styles/detail-btn.gif" alt="more detail" /></a>
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