<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$heading = get_sub_field('heading') ?? null;
$icons_w_labels = get_sub_field('icons_w_labels') ?? null;
?>
<section <?=$dev_tools_element_id;?>class="icons-labels module text-center" <?=esc_attr($dev_tools_element_class);?>>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php if(!empty($heading)):?>
				<div class="cell small-12">
					<h2><?php echo $heading;?></h2>
				</div>
			<?php endif;?>
			<?php foreach( $icons_w_labels as $icons_label ):
				$label = $icons_label['label'];	
				$icon = $icons_label['icon'];	
				$fontawesome_icon = $icons_label['fontawesome_icon'];	
			?>
			<div class="cell small-12 medium-6">
				<?php if( !empty($icon) ):?>
					<div class="icon-wrap">
						<?php 
						$image = $icon;
						if( !empty( $image ) && empty($fontawesome_icon) ): ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					</div>
				<?php endif;?>
				<?php if( !empty($fontawesome_icon) && empty( $image ) ):?>
					<div class="icon-wrap">
						<?php echo $fontawesome_icon;?>
					</div>
				<?php endif;?>
				<?php if( !empty($label) ):?>
					<h3 class="h4"><?php echo $label;?></h3>
				<?php endif;?>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</section>