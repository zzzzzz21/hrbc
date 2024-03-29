<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage HRBC株式会社

 */
remove_action('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links_extra', 3);
add_filter('show_admin_bar', '__return_false');

function head_attr() {
    $prefix = ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# %s: http://ogp.me/ns/%s#"';
    $str = '';
    if(preg_match('/^(\/)$/', $_SERVER['REQUEST_URI'])) {
        $str = sprintf($prefix, 'website', 'website');
    } else {
        $str = sprintf($prefix, 'article', 'article');
    }

    echo $str;
}


function cat_list($query = null) {
    $cat_list = get_the_category($query);
    $str = '';
    foreach($cat_list as $cat) {
        $str .= '<a class="entry__meta--author" href="'.esc_url( get_category_link($cat->cat_ID) ).'">'.$cat->name.'</a>';
    }

    echo $str;
}

function custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function disable_rel_nextprev() {
    if(is_home() || is_front_page()) {
        return false;
    }
}
add_filter('wpseo_next_rel_link', 'disable_rel_nextprev');


function body($args) {
    if(!is_home() && !is_front_page()) {
        $args[] = 'xPages';
    }
    if(is_page(array('contact', 'contact_form', 'contact_check', 'contact_send', 'error'))) {
        $args[] = 'xContact';
    }
    if( is_page('dolphin') ) {
        $args[] = 'xExtra';
    }
    if(is_singular('post') || is_page(array('good-new')) || is_archive() || is_category()) {
        $args[] = 'xBlog';
    }

    return $args;
}
add_filter('body_class', 'body');

function bcn_filter($obj) {
    $trails = array();
    if(is_archive() || is_category() || is_single()) {
        if(count($obj->trail) > 0) {
            $trails[] = new bcn_breadcrumb( 'GOOD &amp; NEW', '<span itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" title="%ftitle%." href="%link%"><span itemprop="title">%htitle%</span></a></span>', array(''), esc_url(home_url('/good-new/')));

            if(is_category()) {
                array_splice($obj->trail, 1, 0, $trails);
            } elseif(is_archive() || is_single()) {
                array_splice($obj->trail, 2, 0, $trails);
            }
        }
    }
    return $obj;
}
add_action('bcn_after_fill', 'bcn_filter');

function meta_desc($str) {
    $new_desc = $str;
    if(is_archive()) {
        $date = get_query_var('year'). '年' . get_query_var('monthnum'). '月';
        $new_desc = str_replace('%customdate%', $date, $new_desc);
    }
    if(is_single()) {
        global $post;
        $tmp = $new_desc;
        $lang = mb_language();
        $o = mb_internal_encoding();
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');
        $tmp = trim( strip_tags($post->post_content) );
        $tmp = preg_replace('/\s{1,}/u', '', $tmp);
        if(mb_strlen($tmp) > 77) {
            $tmp = mb_substr($tmp, 0, 77);
            $tmp .= '...';
        }
        mb_language($lang);
        mb_internal_encoding($o);
        $new_desc = $tmp;
    }
    return $new_desc;
}
add_filter('wpseo_metadesc', 'meta_desc', 100, 1);

/*
function meta_description($str) {
    $lang = mb_language();
    $o = mb_internal_encoding();
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    if(mb_strlen($str) > 77) {
        $str = mb_substr($str, 0, 77);
        $str .= '...';
    }
#   $description = mb_strimwidth($description, 0, 80, '...', 'UTF-8');
    mb_language($lang);
    mb_internal_encoding($o);
    return $str;
}
function meta_ogp_description($str, $t, $k) {
    if($k === 'description') {
        if($t === 'facebook' || $t === 'twitter') {
            $lang = mb_language();
            $o = mb_internal_encoding();
            mb_language('Japanese');
            mb_internal_encoding('UTF-8');
            if(mb_strlen($str) > 77) {
                $str = mb_substr($str, 0, 77);
                $str .= '...';
            }
    #       $description = mb_strimwidth($description, 0, 80, '...', 'UTF-8');
            mb_language($lang);
            mb_internal_encoding($o);
        }
    }
    return $str;
}
add_filter('aioseop_description', 'meta_description');
add_filter('aiosp_opengraph_meta', 'meta_ogp_description', 10, 3);
*/
#add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
 return is_array($var) ? array_intersect($var, array('goodandnew')) : '';
}




class GlobalNavi_Nav_Menu extends Walker_Nav_Menu {
   function start_el(&$output, $item, $depth, $args) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

#        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
        $output .= $indent . '<li '.$class_names.'>';

        $attr_title = ! empty( $item->attr_title ) ? ''  . esc_attr( $item->attr_title ) .'' : '';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


        $item_output = $args->before;
        $item_output .= '<a'. $attributes .$class_names.'>';
        $item_output .= $attr_title;
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}




// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
    $content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 *  custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *

 */
function twentytwelve_setup() {
    /*
     * Makes Twenty Twelve available for translation.
     *
     * Translations can be added to the /languages/ directory.
     * If you're building a theme based on Twenty Twelve, use a find and replace
     * to change 'twentytwelve' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

    /*
     * This theme supports custom background color and image,
     * and here we also set up the default background color.
     */
    add_theme_support( 'custom-background', array(
        'default-color' => 'e6e6e6',
    ) );

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
    $font_url = '';

    /* translators: If there are characters in your language that are not supported
     * by Open Sans, translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
        $subsets = 'latin,latin-ext';

        /* translators: To add an additional Open Sans character subset specific to your language,
         * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

        if ( 'cyrillic' == $subset )
            $subsets .= ',cyrillic,cyrillic-ext';
        elseif ( 'greek' == $subset )
            $subsets .= ',greek,greek-ext';
        elseif ( 'vietnamese' == $subset )
            $subsets .= ',vietnamese';

        $protocol = is_ssl() ? 'https' : 'http';
        $query_args = array(
            'family' => 'Open+Sans:400italic,700italic,400,700',
            'subset' => $subsets,
        );
        $font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
    }

    return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *

 *
 * @return void
 */
function twentytwelve_scripts_styles() {
    global $wp_styles;

    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    // Adds JavaScript for handling the navigation menu hide-and-show behavior.
    wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

    $font_url = twentytwelve_get_font_url();
    if ( ! empty( $font_url ) )
        wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

    // Loads our main stylesheet.
    wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

    // Loads the Internet Explorer specific stylesheet.
    wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
    $wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
#add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
    $font_url = twentytwelve_get_font_url();

    if ( empty( $font_url ) )
        return $mce_css;

    if ( ! empty( $mce_css ) )
        $mce_css .= ',';

    $mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

    return $mce_css;
}
#add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *

 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *

 */
function twentytwelve_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *

 */
function twentytwelve_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'twentytwelve' ),
        'id' => 'sidebar-1',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
        'id' => 'sidebar-2',
        'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
        'id' => 'sidebar-3',
        'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *

 */
function twentytwelve_content_nav( $html_id ) {
    global $wp_query;

    $html_id = esc_attr( $html_id );

    if ( $wp_query->max_num_pages > 1 ) : ?>

<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
  <h3 class="assistive-text">
    <?php _e( 'Post navigation', 'twentytwelve' ); ?>
  </h3>
  <div class="pagination mb24">
    <div class="alignleft fl">
      <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?>
    </div>
    <div class="alignright fr">
      <?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
    </div>
  </div>
</nav>
<!-- #<?php echo $html_id; ?> .navigation -->
<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *

 *
 * @return void
 */
function twentytwelve_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments.
    ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p>
    <?php _e( 'Pingback:', 'twentytwelve' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
  <?php
            break;
        default :
        // Proceed with normal comments.
        global $post;
    ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <article id="comment-<?php comment_ID(); ?>" class="comment">
    <header class="comment-meta comment-author vcard">
      <?php
                    echo get_avatar( $comment, 44 );
                    printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
                        get_comment_author_link(),
                        // If current post author is also comment author, make it known visually.
                        ( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
                    );
                    printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                        esc_url( get_comment_link( $comment->comment_ID ) ),
                        get_comment_time( 'c' ),
                        /* translators: 1: date, 2: time */
                        sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
                    );
                ?>
    </header>
    <!-- .comment-meta -->

    <?php if ( '0' == $comment->comment_approved ) : ?>
    <p class="comment-awaiting-moderation">
      <?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?>
    </p>
    <?php endif; ?>
    <section class="comment-content comment">
      <?php comment_text(); ?>
      <?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
    </section>
    <!-- .comment-content -->

    <div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <!-- .reply -->
  </article>
  <!-- #comment-## -->
  <?php
        break;
    endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *

 *
 * @return void
 */
function twentytwelve_entry_meta() {
    // Translators: used between list items, there is a space after the comma.
    $categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

    $date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );

    $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
        get_the_author()
    );

    // Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
    if ( $tag_list ) {
        $utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
    } elseif ( $categories_list ) {
        $utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
    } else {
        $utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
    }

    printf(
        $utility_text,
        $categories_list,
        $tag_list,
        $date,
        $author
    );
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *

 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
    $background_color = get_background_color();
    $background_image = get_background_image();

    if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
        $classes[] = 'full-width';

    if ( is_page_template( 'page-templates/front-page.php' ) ) {
        $classes[] = 'template-front-page';
        if ( has_post_thumbnail() )
            $classes[] = 'has-post-thumbnail';
        if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
            $classes[] = 'two-sidebars';
    }

    if ( empty( $background_image ) ) {
        if ( empty( $background_color ) )
            $classes[] = 'custom-background-empty';
        elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
            $classes[] = 'custom-background-white';
    }

    // Enable custom font class only if the font CSS is queued to load.
    if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
        $classes[] = 'custom-font-enabled';

    if ( ! is_multi_author() )
        $classes[] = 'single-author';

    return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *

 *
 * @return void
 */
function twentytwelve_content_width() {
    if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
        global $content_width;
        $content_width = 960;
    }
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *

 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *

 *
 * @return void
 */

function wpbeginner_numeric_posts_nav() {
    //if( is_singular() )
    //  return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}


function WS_adjacent_post_link($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '', $previous = true) {

    if ( $previous && is_attachment() ) {
        $post = & get_post($GLOBALS['post']->post_parent);
    } else {
        $post = get_adjacent_post($in_same_cat, $excluded_categories, $previous);
    }

    if ( !$post ) return;


    $tCnt = mb_strlen( $post->post_title, get_bloginfo('charset') );
    if(($maxlen > 0)&&($tCnt > $maxlen)) {
        $title = mb_substr( $post->post_title, 0, $maxlen, get_bloginfo('charset') ) . '…';
    } else {
        $title = $post->post_title;
    }

    if ( empty($post->post_title) ) $title = $previous ? __('Previous Post') : __('Next Post');

    $title = apply_filters('the_title', $title, $post->ID);
    $date = mysql2date(get_option('date_format'), $post->post_date);
    $rel = $previous ? 'pager__prev' : 'pager__next';

    $string = '<a href="'.get_permalink($post).'" rel="'.$rel.'" class="'.$rel.'">';
    $link = str_replace('%title', $title, $link);
#   $link = str_replace('%title', '', $link);
    $link = str_replace('%date', $date, $link);
    $tmpl = get_template_directory_uri();
/*
    if($rel === 'prev') {
        $string .= '<img src="/common/img/btn-prev.png" alt="'.$rel.'">';
    } else {
        $string .= '<img src="/common/img/btn-next.png" alt="'.$rel.'">';
    }
*/
    $link = $string . $link . '</a>';

    $format = str_replace('%link', $link, $format);
    echo $format;
}

function previous_post_link_t($maxlen = -1, $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '') {
    WS_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, true, $maxlen);
}
function next_post_link_t($maxlen = -1, $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '') {
    WS_adjacent_post_link($maxlen, $format, $link, $in_same_cat, $excluded_categories, false);
}
