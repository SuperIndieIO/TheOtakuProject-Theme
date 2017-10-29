<?php
    
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'post-large', 1296, 546, true );
add_image_size( 'post-medium', 960, 270, true );
add_image_size( 'post-small', 480, 270, true );
add_image_size( 'post-3x4', 518, 427, true );
add_image_size( 'post-amp', 1280, 720, true );

add_action('template_include','wp_archive');
function wp_archive( $template ){
    if( is_front_page() && is_paged() ){
        $template = locate_template(array('archive.php','index.php'));
        }
    return $template;
    }

function my_new_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twitter'] = 'Twitter';
// Add Facebook
$contactmethods['facebook'] = 'Facebook';
// Add Title
$contactmethods['title'] = 'Title';

return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

function numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></nav>' . "\n";

}

add_action('template_include','wpse57122_change_on_p2');
function wpse57122_change_on_p2( $template ){
    if( is_front_page() && is_paged() ){
        $template = locate_template(array('archive.php','index.php'));
    }
    return $template;
}

/** Standard Article Template Naming Feature **/
add_filter('default_page_template_title', function() {
    return __('Article Template', 'article');
});


// ****************************************************************************************************	//
// AMP support

//define( 'AMP_QUERY_VAR', apply_filters( 'amp_query_var', 'amp' ) );

//add_rewrite_endpoint( AMP_QUERY_VAR, EP_PERMALINK );

//add_filter( 'template_include', 'amp_page_template', 99 );

//function amp_page_template( $template ) {

//    if( get_query_var( AMP_QUERY_VAR, false ) !== false ) {

//        if ( is_single() ) {
//            $template = get_template_directory() .  '/single-amp.php';
//        } 
//    }
//    return $template;
//}

//function transform_amp()
//{
//    $content = $this->original_content;
//    $content = apply_filters('the_content', $content);
//    // We run kses before AMP conversion due to a kses bug which doesn't allow hyphens (#34105-core).
//    // Our custom kses handler strips out all not-allowed stuff and leaves in stuff that will be converted (like iframe, img, audio, video).
//    // Technically, conversion should catch the tags so we shouldn't need to run it after anyway.
//    $content = AMP_KSES::strip($content);
//    // Convert HTML to AMP
//    // see <a href="https://github.com/ampproject/amphtml/blob/master/spec/amp-html-format.md#html-tags">https://github.com/ampproject/amphtml/blob/master/spec/amp-html-format.md#html-tags</a>)
//    $scripts = array();
//    $converter = new AMP_Img_Converter($content);
//    $content = $converter->convert(array('layout' => 'responsive'));
//    $this->add_scripts($converter->get_scripts());
//    $converter = new AMP_Iframe_Converter($content);
//    $content = $converter->convert(array('layout' => 'responsive'));
//    $this->add_scripts($converter->get_scripts());
//    return $content;
//}

?>