<?php
if(!defined('ABSPATH')) {
	exit;
}

$dev_tools_element_class = sanitize_title(get_sub_field('dev_tools_element_class')) ?? null;
$dev_tools_element_id = get_sub_field('dev_tools_element_id') ?? null;
if (!empty($dev_tools_element_id)) {
	$dev_tools_element_id = 'id="' . esc_attr(sanitize_title($dev_tools_element_id)) . '"';
}

$user = wp_get_current_user();
$first_name = get_user_meta($user->ID, 'first_name', true);
$display_name = trim("$first_name");

if (empty($display_name)) {
	$display_name = $user->user_login;
}
 
$update_profile_link = get_sub_field('update_profile_link') ?? null;
?>
<section <?=$dev_tools_element_id;?>class="member-dashbaord-header module <?=esc_attr($dev_tools_element_class);?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12 medium-auto">
				<div class="grid-x grid-padding-x">
					<div class="cell shrink">
						<svg width="86" height="86" viewBox="0 0 86 86" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><circle cx="43" cy="43" r="43" fill="#fff"/><path d="M43.005 86c-11.955 0-23.431-5.04-31.5-13.804a52.488 52.488 0 0 1-2.994-3.561C-12.646 41.037 8.223-.48 43.005 0c34.744-.48 55.651 41.037 34.504 68.596-.96 1.239-1.92 2.438-2.994 3.6C66.436 80.951 54.96 86 43.015 86h-.01Zm0-80C13.097 5.605-4.893 41.276 13.299 64.996a37.953 37.953 0 0 0 2.6 3.12c13.798 15.675 40.414 15.675 54.212 0a38.607 38.607 0 0 0 2.638-3.159c18.154-23.72.164-59.4-29.706-58.997l-.038.038Z" fill="#050D57"/><path d="M75.062 68.961c-11.793-27.722-52.331-27.722-64.124 0a2.969 2.969 0 0 0 .557 3.245c16.033 18.239 46.977 18.239 63.01 0 .797-.883.998-2.16.557-3.245Z" fill="#050D57"/><path d="M43.005 12c-13.596-.404-22.03 16.481-13.635 27.117 6.352 9.081 20.946 9.081 27.27 0 8.395-10.636 0-27.521-13.635-27.118Z" fill="#050D57"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h86v86H0z"/></clipPath></defs></svg>
					</div>
					<div class="cell auto">
						<div class="h2">
							Welcome, <?php echo esc_html($display_name);?>
						</div>
						<div class="medium-copy">
							AHDAM Members Only Portal
						</div>
					</div>
				</div>
			</div>
			<?php 
			if($update_profile_link ): 
				$link_url = $update_profile_link['url'];
				$link_title = $update_profile_link['title'];
				$link_target = $update_profile_link['target'] ? $update_profile_link['target'] : '_self';
				?>
				<div class="cell small-12 medium-shrink">
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
				</div>
			<?php endif; ?>				
		</div>
	</div>
</section>
