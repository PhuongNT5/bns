<?php
/**
 * Table of Contents
 *
 * @package    Powerkit
 * @subpackage Modules/Helper
 */

/**
 * TOC process.
 *
 * @param string $content The content.
 * @param array  $params The params.
 */
function powerkit_toc_process( $content, $params = array() ) {

	$cache_key = sprintf( 'toc-%s-%s', md5( maybe_serialize( $params ) ), md5( $content ) );

	$data = wp_cache_get( $cache_key );

	if ( ! $data ) {
		$toc = new Powerkit_Table_Of_Contents_Parser();

		// Parsing for toc list.
		$find    = array();
		$replace = array();

		$items = $toc->extract_headings( $find, $replace, $content, $params );

		$find    = array();
		$replace = array();

		// Parsing for toc content.
		$buffer  = $toc->extract_headings( $find, $replace, $content, array(
			'depth'      => 6,
			'count'      => 0,
			'characters' => 0,
		) );
		$content = $toc->mb_find_replace( $find, $replace, $content );

		if ( $items ) {
			$items = sprintf( '<ol>%s</ol>', $items );
		}

		$data = array(
			'list'    => $items,
			'content' => $content,
		);

		wp_cache_set( $cache_key, $data, 'powerkit', 1 );
	}

	return $data;
}

/**
 * Get TOC list.
 *
 * @param array $params The params.
 * @param array $content Optional content.
 */
function powerkit_toc_list( $params, $content = null ) {
	// get content from the post.
	if ( null === $content ) {
		if ( ! is_singular() ) {
			return;
		}

		global $post;
		$content = $post->post_content;
	}

	// Global used in Gutenberg Block output.
	global $powerkit_toc_parse;

	$powerkit_toc_parse = true;

	remove_shortcode( 'powerkit_toc' );

		$content = apply_filters( 'the_content', $content );

	add_shortcode( 'powerkit_toc', 'powerkit_toc_shortcode' );

	// TOC process.
	$toc = powerkit_toc_process( $content, $params );

	if ( isset( $toc['list'] ) && $toc['list'] ) {
		$tag = apply_filters( 'powerkit_section_title_tag', 'h5' );
		?>
			<div class="pk-toc">
				<?php if ( isset( $params['title'] ) && $params['title'] ) { ?>
					<<?php echo esc_html( $tag ); ?> class="pk-title pk-toc-title pk-font-block">
						<?php echo esc_html( $params['title'] ); ?>

						<?php if ( isset( $params['btn_hide'] ) && $params['btn_hide'] ) { ?>
							<span class="pk-toc-btn-hide"><?php esc_html_e( 'Hide', 'powerkit' ); ?></span>
						<?php } ?>
					</<?php echo esc_html( $tag ); ?>>
				<?php } ?>

				<?php echo wp_kses( $toc['list'], 'post' ); ?>
			</div>
		<?php
	}

	$powerkit_toc_parse = false;
}
