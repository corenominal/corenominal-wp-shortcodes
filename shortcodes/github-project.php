<?php
/**
 * Github Project
 * Usage: [corenominal-github-project repo="foo"]
 */
function corenominal_shortcode_github_project( $atts, $content = null )
{
	$atts = shortcode_atts(
				array(
						'repo' => 'rocket-menu'
				), $atts
			);

	$data = '<h3>GitHub</h3>';

	$data .= '<div class="btn-group-github">';

	/**
	 * Clone button
	 */
	$data .= '<a class="btn btn-github-clone" href="https://github.com/corenominal/' . $atts['repo'] . '">';
	$data .= 'Clone Repo';
	$data .= '</a>';

	 /**
 	 * Download button
 	 */
	$data .= '<a class="btn btn-github-download" href="https://github.com/corenominal/' . $atts['repo'] . '/archive/master.zip">';
 	$data .= 'Download Zip';
 	$data .= '</a>';

	$data .= '</div>';

	 /**
 	 * Latest Commits
 	 */
	include_once( ABSPATH . WPINC . '/feed.php' );
	$rss = 'https://github.com/corenominal/' . $atts['repo'] . '/commits/master.atom';
	$rss = fetch_feed( $rss );
	$maxitems = 0;

	if ( ! is_wp_error( $rss ) ):
    	$maxitems = $rss->get_item_quantity( 20 );
		$rss_items = $rss->get_items( 0, $maxitems );
	endif;

	if ( $maxitems > 0 ):
		$data .= '<h4 class="latest-guthub-commits">Latest Commits</h4>';
		$data .= '<ul class="latest-github-commits">';
		foreach ( $rss_items as $item ):
			$data .= '<li>';
			$data .= '<span>' . $item->get_date('Y-m-d') . '</span>';
			$data .= '<a href="' . $item->get_permalink() . '">';
			$data .= $item->get_title();
			$data .= '</a>';
			$data .= '</li>';
		endforeach;
		$data .= '</ul>';
	endif;

	return $data;

}
add_shortcode( 'corenominal-github-project', 'corenominal_shortcode_github_project' );
