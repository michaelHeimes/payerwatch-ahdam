<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$links = get_sub_field('links') ?? null;
?>
<?php if( $links ):?>
	<section <?=$dev_tools_element_id;?>class="anchor-links module <?=esc_attr($dev_tools_element_class);?>">
		<div class="grid-container">
			<nav>
				<ul class="no-bullets grid-x grid-padding-x align-middle uppercase">
					<?php foreach($links as $link):
						$link_title = $link['link_title'] ?? null;	
						$element_id = $link['element_id'] ?? null;	
						$element_id = sanitize_title($element_id);
						if($link):
					?>
						<li class="cell shrink">
							<a href="#<?=esc_attr($element_id);?>">
								<?=esc_html( $link_title );?>
							</a>
						</li>
					<?php endif; endforeach;?>
				</ul>
			</nav>
		</div>
	</section>
<?php endif;?>