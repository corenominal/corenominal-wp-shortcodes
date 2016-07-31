<?php
/**
 * Add custom metabox for entering the link
 */
function corenominal_add_metabox_shortcodes()
{
	add_meta_box(
		'corenominal_metabox_shortcodes', // id
		'Available Custom Shortcodes', // title
		'corenominal_metabox_shortcode_callback', //callback function
		array('page','post'), // post type
		'normal', // context - placement i.e. 'side', 'normal', 'advanced'
		'default' // priority - i.e. 'high', 'core', 'default', 'low'
		);
}
add_action( 'add_meta_boxes', 'corenominal_add_metabox_shortcodes' );

/**
 * The metabox callback
 */
function corenominal_metabox_shortcode_callback( $post )
{
    ?>

	<div>
		<div class="meta-row">
            <strong>Github Gists</strong><br>
            Usage: <code>[gist url="https://gist.github.com/corenominal/0efedf14eca28453a58e"]</code>
            <br><br>
            <strong>Loop Tag</strong> (<em>shows related posts by tag</em>)<br>
            Usage: <code>[corenominal-loop-tag tag=foo per_page=30]</code>
			<br><br>
            <strong>GitHub Project</strong> (<em>clone and download buttons, plus recent commit history</em>)<br>
            Usage: <code>[corenominal-github-project repo=foo]</code>
		</div>
	</div>

	<?php
}
