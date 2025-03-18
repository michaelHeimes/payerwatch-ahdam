<?php
if(!defined('ABSPATH')) {
	exit;
}
$size = 'full';
$heading = get_sub_field('heading') ?? null;
$large_text = get_sub_field('large_text') ?? null;
$text = get_sub_field('text') ?? null;
$link = get_sub_field('button_link') ?? null;
?>
<section class="banner page-banner has-bg grid-x align-bottom">
	<div class="banner-img bg has-bg">
		<?php if(is_archive()):?>
		
			<?php get_template_part('template-parts/content', 'post-banner-bg-img');?>
				
		<?php else:?>
		
			<div class="bg" style="background-image: url(<?php the_sub_field('background_image');?>)"></div>
			
		<?php endif;?>
		<div class="bg banner-gradient"></div>
	</div>
	<div class="wide-width">
		<div class="grid-container fluid">
			<div class="banner-inner grid-x grid-padding-x">
				<div class="left cell shrink tablet-shrink large-shrink large-offset-1 white">
					<div class="bg blue-bg banner-bg-skew"></div>
					<div class="left-inner relative">
					<?php if(is_archive()):?>
						<?php if(is_tax()):?>
							<h1 class="page-title white"><?php the_archive_title(); ?></h1>
						<?php else:?>
							<h1 class="page-title white"><?php post_type_archive_title();?></h1>
						<?php endif;?>
					<?php else:?>
						<?php if( !empty($heading) ):?>
							<h1 class="white">
								<?=esc_html($heading);?>
							</h1>
						<?php endif;?>
						<?php if( !empty($large_text) ):?>
							<p class="large-copy">
								<?=wp_kses_post($large_text);?>
							</p>
						<?php endif;?>
						<?php if( !empty($text) ):?>
							<p class="medium-copy">
								<?=esc_html($text);?>
							</p>
						<?php endif;?>
						<?php 
						if( $link ): 
						    $link_url = $link['url'];
						    $link_title = $link['title'];
						    $link_target = $link['target'] ? $link['target'] : '_self';
						    ?>
						<div class="btn-link">
						    <a class="button large arrow-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
							    <span class="gradient">
							    	<span class="text">
							    		<?php echo esc_html( $link_title ); ?>
							    	</span>
							    </span>
							    <span class="arrow">
									<svg data-name="Symbol 82" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path data-name="Path 10" d="M8 0 6.545 1.455l5.506 5.506H0v2.078h12.052l-5.507 5.506L8 16l8-8Z" fill="#050d57"/></svg>
							    </span>
							</a>
						</div>
						<?php endif; ?>		
					<?php endif; ?>				
					</div>
				</div>
				<div class="right cell small-12 tablet-auto large-5">
					<div class="bg theme-color-bg banner-bg-skew"></div>
					<?php 
					$image = get_sub_field('image');
					if( !empty( $image ) ): ?>
					<div class="fh img-wrap grid-x grid-padding-x align-middle">
						<?=wp_get_attachment_image( $image['id'], $size );?>
					</div>
					<?php endif; ?>
					<div class="accent"></div>
				</div>
			</div>
		</div>
	</div>
	<?php if( have_rows('cta') ):?>
	<div class="banner-cta">
		<?php while ( have_rows('cta') ) : the_row();?>	
		<div class="grid-container fluid">
			<div class="grid-x grid-padding-x align-right">
				<div class="cell shrink">
					<div class="grid-x grid-padding-x align-middle blue-bg">
						<div class="cell auto white">
							<?php the_sub_field('text');?>
						</div>
						<div class="cell shrink">
							<?php 
							$link = get_sub_field('button_link');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="button mint-bg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>					
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile;?>
	</div>
	<?php endif;?>
</section>