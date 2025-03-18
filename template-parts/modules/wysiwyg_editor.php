<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$wysiwyg_editor = get_sub_field('wysiwyg_editor') ?? null;
?>
<?php if( $wysiwyg_editor ):?>
	<section <?=$dev_tools_element_id;?>class="wysiwyg-editor module <?=esc_attr($dev_tools_element_class);?>">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
	
				<div class="cell small-12">
					<?=wp_kses_post($wysiwyg_editor);?>			
				</div>
						
			</div>
		</div>
	</section>
<?php endif;?>