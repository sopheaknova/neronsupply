<?php
get_header();?>

    <!--start content-->
    <div id="content">
    	
        <!--c1-->
    	<div id="c1">
        
        	<!--about neron supply-->
            <div id="about">
            	<h3>About Neron Supply</h3>
            	<SCRIPT src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.latest.js" type=text/javascript></SCRIPT>
				<script type="text/javascript">
                $(document).ready(function() {
                    $('.slideshow').cycle({
                        fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
                        delay: 3000
                    });
                });
                </script>
                
                    <div class="slideshow">
                        <img src="<?php bloginfo('template_url'); ?>/images/about-image-home.jpg" alt="About our factory" />
                        <img src="<?php bloginfo('template_url'); ?>/images/about-image-home-02.jpg" alt="About our factory" />
                        <img src="<?php bloginfo('template_url'); ?>/images/about-image-home-03.jpg" alt="About our factory" />
                        <img src="<?php bloginfo('template_url'); ?>/images/about-image-home-04.jpg" alt="About our factory" />
                    </div>

                <p>Neron Supply Company is a Wholesale Products Company located in Long Beach, California, which distributes and sells products to households and businesses ...</p>
                <a href="http://www.neronsupply.com/about" title="more detail"><img src="<?php bloginfo('template_url'); ?>/styles/detail-btn.gif" alt="more detail" /></a>
            </div>
            <!--/about-->
        
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
                    <small>
                    <?php get_price_items(get_post_meta($post->ID,'_gmp_price',true)); ?>
					<?php get_original_price_items(get_post_meta($post->ID,'_gmp_org_price',true)); ?>
                    			</small>
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
        
        <!------------------------------------- THE CONTENT ------------------------------------------------->
        <div id="lofslidecontent45" class="lof-slidecontent  lof-snleft">
        <div class="preload"><div></div></div>
         <!-- MAIN CONTENT --> 
          <div class="lof-main-outer">
            <ul class="lof-main-wapper">
                <?php 
					$my_query = new WP_Query("category_name=featured&showposts=4&orderby=ASC");
					$image = get_post_meta($post->ID, "image", true);     
					$count = 0; 		
					
					if (have_posts()) :
						  while ($my_query->have_posts()) : $my_query->the_post();
				?>
							<li>
							<img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=410&h=380&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>">
							<div class="lof-main-item-desc">
							<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
							<p><?php limit_code_num(get_post_meta($post->ID,'_gmp_code',true)); ?></p>
							</div>
							</li>
				<?php			
							$count++;  
						endwhile;
						
						wp_reset_query();
						
					endif;
				?>
              </ul>  	
          </div>
          <!-- END MAIN CONTENT --> 
            <!-- NAVIGATOR -->
        
          <div class="lof-navigator-outer">
                <ul class="lof-navigator">
                    <?php 
						$my_query = new WP_Query("category_name=Featured&showposts=4&orderby=ASC");
						$image = get_post_meta($post->ID, "image", true);     
						$count = 0; 		
						
						if (have_posts()) :
							  while ($my_query->have_posts()) : $my_query->the_post();
							  //Custom field is set, display post info
								if($count == 0){ ?>
									<li class="first">
					<?php			} else { ?>
									<li>
					<?php 		} ?>
									<div>
									<img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=60&h=60&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>">
								<h3><?php the_title(); ?></h3>
								<?php echo get_post_meta($post->ID,'_gmp_code',true); ?>
									</div>
									</li>
					<?php			
								$count++;  
							endwhile;
							
							wp_reset_query();
							
						endif;
					?>                   		
                </ul>
          </div>
         </div> 
<!------------------------------------- END OF THE CONTENT ------------------------------------------------->

		

	
            
            <!--glove category -->            
            <div class="category-head">
            	<h3><a href="#">Glove &amp; Safety Products</a>
                </h3>
                <a class="cat-detail" href="http://www.neronsupply.com/category/product-category/glove-safety-products">all of this category</a>
            </div>
            
            <div class="cat-lists">
            	<ul>
                	<?php 
					$my_query = new WP_Query("cat=3&showposts=4&orderby=rand");
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
                                <img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=134&h=132&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>"></a><br />
								<a href="<?php the_permalink();?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a><br />
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
							
						endif;
					?>
                </ul>
            </div>            
            <!--/ glove category-->
            
            <!--electric category -->            
            <div class="category-head">
            	<h3><a href="#">Electronic Products</a></h3>
                <a class="cat-detail" href="http://www.neronsupply.com/category/product-category/electronic-products">all of this category</a>
            </div>
            
            <div class="cat-lists">
            	<ul>
                	<?php 
					$my_query = new WP_Query("cat=4&showposts=4&orderby=rand");
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
                                <img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=134&h=132&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>"></a><br />
								<a href="<?php the_permalink();?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a><br />
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
							
						endif;
					?>
                </ul>
            </div>            
            <!--/ electric category-->
            
            <!--electric category -->            
            <div class="category-head">
            	<h3><a href="#">Home Care Products</a></h3>
                <a class="cat-detail" href="http://www.neronsupply.com/category/product-category/home-care-products">all of this category</a>
            </div>
            
            <div class="cat-lists">
            	<ul>
                	<?php 
					$my_query = new WP_Query("cat=5&showposts=4&orderby=rand");
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
                                <img src="<?php bloginfo('template_url'); ?>/script/timthumb.php?q=100&w=134&h=132&src=<?php echo get_post_meta($post->ID,'_gmp_image_01',true) ?>"></a><br />
								<a href="<?php the_permalink();?>" class="product-name"><strong><?php limit_title_word(get_the_title()); ?></strong></a><br />
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
							
						endif;
					?>
                </ul>
            </div>            
            <!--/ electric category-->
            
        </div>
        <!--/c2-->
        
    </div>
    <!--/content-->

<?php
get_footer();
?>