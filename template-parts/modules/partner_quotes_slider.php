<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$slides = get_sub_field('slides') ?? null;
?>
<?php if( !empty($slides) ):?>
<section <?=$dev_tools_element_id;?>class="partner-quotes-slider module color-bg royal-blue-bg <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<h2 class="white"><?php the_sub_field('heading');?></h2>
				<div class="pq-slider">
					<div class="swiper-wrapper">
						<?php if( !empty($slides) ):
							foreach($slides as $slide):	
								$image = $slide['photo'];
								$name = $slide['name'];
								$title = $slide['title'];
								$quote = $slide['quote'];
						?>
						
							<div class="pq-slide swiper-slide">
								<div class="inner white-bg">
									<div class="top grid-x">
										<?php 
										if( !empty( $image ) ): ?>
										<div class="img-wrap cell small-12 medium-shrink">
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										</div>
										<?php endif; ?>	
										<?php if( !empty( $name ) || !empty( $title ) ):?>
										<div class="name-title cell small-12 medium-auto">
											<?php if( !empty( $name ) ):?>
												<h3 class="brand-blue medium-copy bold">
													<?=esc_html( $name );?>
												</h3>
											<?php endif; ?>	
											<?php if( !empty( $title ) ):?>
												<h4 class="p">
													<?=esc_html($title);?>
												</h4>
											<?php endif; ?>	
										</div>		
										<?php endif; ?>					
									</div>
									<?php if( !empty( $quote ) ):?>
										<div class="bottom brand-blue medium-copy bold">
											<?=wp_kses_post($quote);?>
										</div>
									<?php endif; ?>	
								</div>
							</div>
						<?php endforeach; endif;?>
					</div>
				</div>	
				<div class="dots-container swiper-pagination"></div>	
			</div>					
		</div>
	</div>
</section>
<?php endif;?>