<?php
if (is_post_type_archive()) {
	$post_type = get_query_var('post_type'); // Get the post type
	echo 'Archive Slug: ' . esc_html($post_type);
} else {
	$post_type = get_post_type();
}

$news_banner_img = get_field('news_banner_image', 'option');
$knowledge_center_img = get_field('knowledge_center_banner_image', 'option');

var_dump($post_type )
;?>

<div class="bg" style="background-image: url( 

<?php
	
if($post_type == 'news'): 
	
	echo $news_banner_img;
	
elseif( $post_type == 'knowledge-center' ):
	
	echo $knowledge_center_img;
	
elseif($post_type == 'webinar'): 
	
	the_field('webinar_banner_image', 'option');

elseif($post_type == 'interview'): 

	the_field('interview_banner_image', 'option'); 

elseif($post_type == 'expert'): 

	the_field('expert_banner_image', 'option');

elseif($post_type == 'event'): 

	the_field('event_banner_image', 'option');

endif;?> );"></div>


