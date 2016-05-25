<?php register_nav_menu('primary', 'Head Menu'); ?>
<?php register_nav_menu('secondary', 'Footer Menu'); ?>
<?php register_nav_menu('legal', 'Rechtlicherbreich'); ?>
<?php add_theme_support('post-thumbnails'); ?>
<?php
/**
 * Rergister Sidebar for Recept of the Week
 */
 register_sidebar( array(
	'name'          => __( 'Rezept der Woche', 'onlyveggy' ),
	'id'            => 'rotw',
	'description'   => __( 'Rezept der Woche Widget Area', 'onlyveggy' ),
	'before_widget' => '<div id="%1$s" class="widgets %2$s rotw">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );
/**
 * Rergister Sidebar for Recept of the Week
 */
 register_sidebar( array(
	'name'          => __( 'Sidebar', 'dailygreen' ),
	'id'            => 'side-1',
	'description'   => __( 'Blog Widget Area', 'dailygreen' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
) );
?>

<?php
/**
 *   Child page conditional
 *   @ Accept's page ID, page slug or page title as parameters
 */
function is_child( $parent = '' ) {
    global $post;

    $parent_obj = get_page( $post->post_parent, ARRAY_A );
    $parent = (string) $parent;
    $parent_array = (array) $parent;

    if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
        return true;
    } else {
        return false;
    }
}?>

<?php
/**
 * Declare WooCommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support(){
    add_theme_support( 'woocommerce' );
}
?>

<?php
/*
 * Load Scripts
 */
function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'customdrink', get_template_directory_uri() . '/js/customdrink.js', array( 'jquery','jquery-ui-slider' ) );
  wp_register_script( 'jquery-ui-1.10.4.custom.min', get_template_directory_uri() . '/js/jquery-ui-1.10.4.custom.min.js', array( 'jquery' ) );
  wp_register_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
  wp_register_script( 'awesome-landing-page', get_template_directory_uri() . '/js/awesome-landing-page.js', array( 'jquery' ) );
  wp_register_script( 'spincards', get_template_directory_uri() . '/js/spinCards.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'customdrink' );
  wp_enqueue_script( 'jquery-ui-1.10.4.custom.min' );
  wp_enqueue_script( 'bootstrap' );
  wp_enqueue_script( 'awesome-landing-page' );
  wp_enqueue_script( 'spincards' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );
?>


<?php
add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}
?>


<?php
if ( ! function_exists( 'unite_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'unite' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			     <div class="nav-previous"> <?php next_posts_link( __( '<i class="pe-7s-angle-left"></i> Older posts') ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			     <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <i class="pe-7s-angle-right"></i>' ) ); ?> </div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
?>

<?php
if ( ! function_exists( 'unite_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function unite_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( '<span class="posted-on"><i class="pe-7s-date"></i> %1$s</span><span class="byline"> <i class="pe-7s-user"></i> %2$s</span>',
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;
?>

<?php
/**
 * Returns true if a blog has more than 1 category.
 */
function unite_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so unite_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so unite_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in unite_categorized_blog.
 */
function unite_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'unite_category_transient_flusher' );
add_action( 'save_post',     'unite_category_transient_flusher' );
 ?>
