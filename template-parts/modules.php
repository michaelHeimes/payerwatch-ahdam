<?php 
if(!defined('ABSPATH')) {
	exit;
}
	if ( have_rows('modules') ) : ?>
<?php while ( have_rows('modules') ) : ?> 
	<?php the_row(); ?>

	<?php if ( get_row_layout() == 'home_banner' ) : 
	
		get_template_part('template-parts/modules/home_banner');

	elseif ( get_row_layout() == 'page_banner' ) : 
	
		get_template_part('template-parts/modules/page_banner');

	elseif ( get_row_layout() == 'appeal_letter_template' ) : 
	
		get_template_part('template-parts/modules/appeal_letter_template');

	elseif ( get_row_layout() == 'blue_background_cta' ) : 
	
		get_template_part('template-parts/modules/blue_background_cta');

	elseif ( get_row_layout() == 'book_a_demo' ) : 
	
		get_template_part('template-parts/modules/book_a_demo');

	elseif ( get_row_layout() == 'contact_form' ) : 
	
		get_template_part('template-parts/modules/contact_form');

	elseif ( get_row_layout() == 'copy_and_arrow_checklist' ) : 
	
		get_template_part('template-parts/modules/copy_and_arrow_checklist');
		
	elseif ( get_row_layout() == 'copy_and_image' ) : 
	
		get_template_part('template-parts/modules/copy_and_image');

	elseif ( get_row_layout() == 'graphic_and_stats' ) : 
	
		get_template_part('template-parts/modules/graphic_and_stats');

	elseif ( get_row_layout() == 'blue_bg_copy_and_image_copy_button_link_card' ) : 
	
		get_template_part('template-parts/modules/blue_bg_copy_and_image_copy_button_link_card');

	elseif ( get_row_layout() == 'image_copy_button_cards' ) : 
	
		get_template_part('template-parts/modules/image_copy_button_cards');

	elseif ( get_row_layout() == 'expanding_card_slider' ) : 
	
		get_template_part('template-parts/modules/expanding_card_slider');
		
	elseif ( get_row_layout() == 'events' ) : 
	
		get_template_part('template-parts/modules/events');

	elseif ( get_row_layout() == 'partner_quotes_slider' ) : 
	
		get_template_part('template-parts/modules/partner_quotes_slider');
		
	elseif ( get_row_layout() == 'sticky_heading_nav_paragraphs' ) : 
		
		get_template_part('template-parts/modules/sticky_heading_nav_paragraphs');

	elseif ( get_row_layout() == 'team_preview' ) : 
	
		get_template_part('template-parts/modules/team_preview');

	elseif ( get_row_layout() == 'trusted_partners' ) : 
	
		get_template_part('template-parts/modules/trusted_partners');
		
	elseif ( get_row_layout() == 'two_news_posts' ) : 
	
		get_template_part('template-parts/modules/two_news_posts');

	elseif ( get_row_layout() == 'webinar_cta' ) : 
	
		get_template_part('template-parts/modules/webinar_cta');

	elseif ( get_row_layout() == 'webinars_slider' ) : 
	
		get_template_part('template-parts/modules/webinars_slider');
	
	elseif ( get_row_layout() == 'wysiwyg_editor' ) : 
	
		get_template_part('template-parts/modules/wysiwyg_editor');
	
	elseif ( get_row_layout() == 'dual_wysiwyg_editors' ) : 
	
	get_template_part('template-parts/modules/dual_wysiwyg_editors');

	elseif ( get_row_layout() == 'icons_labels' ) : 
	
	get_template_part('template-parts/modules/icons_labels');
	
	elseif ( get_row_layout() == 'membership_cta' ) : 
	
	get_template_part('template-parts/modules/membership_cta');
	
	elseif ( get_row_layout() == 'upcoming_webinars' ) : 
	
	get_template_part('template-parts/modules/upcoming_webinars');
	
	elseif ( get_row_layout() == 'latest_industry_news_knowledge_center' ) : 
	
	get_template_part('template-parts/modules/latest_industry_news_knowledge_center');
	
	elseif ( get_row_layout() == 'latest_posts' ) : 
	
	get_template_part('template-parts/modules/latest_posts');
	
	elseif ( get_row_layout() == 'member_dashboard_header' ) : 
	
	get_template_part('template-parts/modules/member_dashboard_header');
	
	elseif ( get_row_layout() == 'anchor_links' ) : 
	
	get_template_part('template-parts/modules/anchor_links');
	
	elseif ( get_row_layout() == 'copy_download_buttons_and_image' ) : 
	
	get_template_part('template-parts/modules/copy_download_buttons_and_image');
	
	endif;?>
	
<?php endwhile;?>
<?php endif;?>