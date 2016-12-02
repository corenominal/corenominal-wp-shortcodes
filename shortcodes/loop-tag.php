<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Loop tag
 * Shows posts for a given tag
 * Usage: [corenominal-loop-tag tag=foo per_page=30]
 */
function corenominal_shortcode_loop_tag( $atts, $content = null )
{
	$atts = shortcode_atts(
				array(
						'tag' => 'foo',
						'per_page' => 30
				), $atts
	);

	// WP_Query arguments
	$args = array (
		'post_type'              => array( 'post' ),
		'post_status'            => array( 'publish' ),
		'tag'                    => $atts['tag'],
		'posts_per_page'         => $atts['per_page'],
		'order'                  => 'DESC',
	);

	// The Query
	$query = new WP_Query( $args );

	$data = '';

	if ( $query->have_posts() ) :
		$data .= '<h3>Related Posts</h3>';
		$data .= '<ul class="date-list related-posts">';
		while ( $query->have_posts() ):
			$query->the_post();
			$data .= '<li>';
			$data .= '<span>' . get_the_date( 'Y-m-d' ) . '</span> ';
			$data .= '<a href="' . get_the_permalink() . '">';
			$data .= get_the_title();
			$data .= '</a>';
			$data .= '</li>';
		endwhile;
		$data .= '</ul>';
	endif;

	wp_reset_postdata();

	return $data;
}
add_shortcode( 'corenominal-loop-tag', 'corenominal_shortcode_loop_tag' );
