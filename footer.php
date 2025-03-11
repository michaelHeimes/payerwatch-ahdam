<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */		
 
 if(!defined('ABSPATH')) {
	 exit;
 }
 
 $theme_brand = get_field('theme_brand', 'option') ?? null;
 
 if( $theme_brand = 'ahdam' ) {
	$heading_color = 'violet';	
 } else {
	$heading_color = 'mint-';
 }
 
 $hours = get_field('hours', 'option') ?? null;
 $footer_information_links_ahdam_only = get_field('footer_information_links_ahdam_only', 'option') ?? null;
 
 $footer_about_text = get_field('footer_about_text', 'option') ?? null;
 ?>
					
				<footer class="footer navy-bg small-copy" role="contentinfo">
					<div class="grid-container">
						<div class="inner-footer grid-x grid-padding-x">
							
							<div class="logo-wrap cell small-12 tablet-4">
								<ul class="menu logo-menu">
									<li class="menu show-for-sr"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
									<li class="logo footer-logo"><a href="<?php echo home_url(); ?>">
										<?php 
										$image = get_field('footer_logo', 'option');
										if( !empty( $image ) ): ?>
										    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>	
									</a></li>
								</ul>
								<?php if(  $theme_brand == 'ahdam' && !empty(  $footer_about_text ) ):?>
									<div class="ahdam-about">
										<div class="heading">
											<h3 class="<?=$heading_color;?>">About</h3>
										</div>
										<?=wp_kses_post($footer_about_text);?>
									</div>
								<?php endif;?>
							</div>
							
							<div class="right cell small-12 tablet-7 xlarge-offset-1">
								<div class="grid-x grid-padding-x">
									<div class="cell small-12 medium-6">
										
										<div class="grid-x grid-padding-x small-up-2">
											<div class="item cell location">
												<h3 class="<?=$heading_color;?>">Location</h3>
												<a href="<?php the_field('directions_url', 'option');?>" target="_blank">
													<?php the_field('address', 'option');?>
												</a>
											</div>
											<div class="item cell in-touch">
												<h3 class="<?=$heading_color;?>">Get In Touch</h3>
												<div>
													<a href="tel:<?php the_field('phone_number', 'option');?>">
														+<?php the_field('phone_number', 'option');?>
													</a>
												</div>
												<div>
													<a href="mailto:<?php the_field('email_address', 'option');?>">
														<?php the_field('email_address', 'option');?>
													</a>
												</div>
											</div>	
											<?php if( $footer_information_links_ahdam_only && $theme_brand == 'ahdam' ) :?>
												<div class="item cell hours">
													<h3 class="<?=$heading_color;?>">Information</h3>
													<?php foreach($footer_information_links_ahdam_only as $info_link):
														$link = $info_link['link'] ?? null;
														if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
													?>
														<div>
															<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
														</div>
													<?php endif; endforeach;?>
												</div>
											<?php endif;?>
											<?php if( !empty( $hours ) && $theme_brand == 'payerwatch' ):?>
											<div class="item cell hours">
												<h3 class="<?=$heading_color;?>">Hours</h3>
												<?php the_field('hours', 'option');?>
											</div>			
											<?php endif;?>
											<?php if($theme_brand == 'payerwatch' ):?>
												<div class="item social cell">
													<?php trailhead_social_links(); ?>
												</div>									
											<?php endif;?>	
										</div>
										
									</div>
									
									<div class="item cell small-12 medium-6">
										
										<div class="grid-x grid-padding-x">
											<div class="cell sitemap">
												<h3 class="<?=$heading_color;?>">Sitemap</h3>
											</div>
											<div class="cell small-6">
												<nav role="navigation">
						    						<?php trailhead_footer_links1(); ?>
						    					</nav>
						    				</div>
		
											<div class="cell small-6">
												<nav role="navigation">
						    						<?php trailhead_footer_links2(); ?>
						    					</nav>
						    				</div>
											
											<div class="cell">
												
											</div>
									
										</div>
										
									</div>
								
								</div>
							</div>
						</div> <!-- end #inner-footer -->
					</div>
					
					<div class="grid-container fluid">
						<div class="grid-x grid-padding-x">
							<div class="cell text-right">
								<p class="source-org copyright small">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><?php if($theme_brand == 'payerwatch' ):?> | <a href="https://proprdesign.com/" target="_blank">Made by Propr</a><?php endif;?></p>
							</div>
						</div>
					</div>
				
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
		
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->