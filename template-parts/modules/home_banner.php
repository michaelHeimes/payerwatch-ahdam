<?php
if(!defined('ABSPATH')) {
	exit;
}
$size = 'full';
$heading = get_sub_field('heading') ?? null;
$large_text = get_sub_field('large_text') ?? null;
$text = get_sub_field('text') ?? null;
$link = get_sub_field('button_link') ?? null;
$image = get_sub_field('image') ?? null;
?>
<section class="banner home-banner royal-navy-gradient-bg" data-equalizer-watch="header-gradient">
	<div class="inner wide-width">
		<div class="grid-container fluid">
			<div class="grid-x grid-padding-x">
				<div class="left cell small-12 medium-6 white">
					<?php if( !empty( $heading ) ):?>
						<h1 class="white"><?=esc_html($heading);?></h1>
					<?php endif;?>
					<?php if( !empty( $large_text ) ):?>
						<p class="large-copy"><?=esc_html($large_text);?></p>
					<?php endif;?>
					<?php if( !empty( $text ) ):?>
						<p class="medium-copy"><?=wp_kses_post($text);?></p>
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
						    <span class="mint-bg arrow">
								<svg id="Symbol_82" data-name="Symbol 82" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
								  <path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H0V9.039H12.052L6.545,14.545,8,16l8-8Z" fill="#050d57"/>
								</svg>
						    </span>
						</a>
					</div>
					<?php endif; ?>					
	
				</div>
				<div class="right cell small-12 medium-6 large-5 large-offset-1">
					<?php 
					if( !empty( $image ) ): ?>
					<div class="img-wrap has-bfg">
						<span class="bg"></span>
						<?=wp_get_attachment_image( $image['id'], $size );?>
					</div>
					<?php endif; ?>
					<div class="accent"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if( have_rows('cta') ):?>
<section class="banner-cta">
	<?php while ( have_rows('cta') ) : the_row();?>	
	<div class="grid-container fluid">
		<div class="grid-x grid-padding-x align-right">
			<div class="cell small-12 large-shrink">
				<div class="inner grid-x grid-padding-x align-middle has-bg">
					<div class="bg mint-bg"></div>
					<div class="bg blue-bg"></div>
					<div class="cta-left cell small-12 medium-auto white relative">
						<?php the_sub_field('text');?>
					</div>
					<div class="cta-right cell small-12 medium-shrink relative">
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
</section>
<?php endif;?>
