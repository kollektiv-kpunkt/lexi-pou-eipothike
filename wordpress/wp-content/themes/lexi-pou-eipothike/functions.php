<?php
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

function lpe_scripts() {
    if ($_ENV["production"] == "true") {
        $version = wp_get_theme()->get( 'Version' );
    } else {
        $version = time();
    }
    wp_enqueue_style( 'bundle', get_template_directory_uri() . '/dist/bundle.min.css', [], $version );
    wp_enqueue_script( 'bundle', get_template_directory_uri() . '/dist/app.min.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'lpe_scripts' );

function lpe_theme_support() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
    add_editor_style('dist/bundle.min.css' );
    add_editor_style('gutenberg/fixes.css' );
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Primary', 'themeLangDomain' ),
            'slug' => 'primary',
            'color' => '#FFE700',
        ),
        array(
            'name' => __( 'Secondary', 'themeLangDomain' ),
            'slug' => 'secondary',
            'color' => '#B5003A',
        ),
        array(
            'name' => __( 'Black', 'themeLangDomain' ),
            'slug' => 'black',
            'color' => "#000000",
        ),
        array(
            'name' => __( 'White', 'themeLangDomain' ),
            'slug' => 'white',
            'color' => "#ffffff",
        ),
    ) );
}
add_action( 'after_setup_theme', 'lpe_theme_support' );

function lpe_menus() {
  register_nav_menu('lpe-main-nav',__( 'Main Navigation' ));
  register_nav_menu('lpe-footer-nav',__( 'Footer Navigation' ));
}
add_action( 'init', 'lpe_menus' );


// Shortcodes
function lpe_cookie_shortcode($atts, $content = null) {
    ob_start();
    echo('<a><button data-cc="c-settings">' . $content . '</button></a>');
    return ob_get_clean();
}

add_shortcode('lpe-cookie-settings', 'lpe_cookie_shortcode');

// ACF

function lpe_acf() {
    define( 'MY_ACF_PATH', get_stylesheet_directory() . '/lib/acf/' );
    define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/lib/acf/' );
    include_once( MY_ACF_PATH . 'acf.php' );
    add_filter('acf/settings/url', 'my_acf_settings_url');
    function my_acf_settings_url( $url ) {
        return MY_ACF_URL;
    }

    add_filter('acf/settings/save_json', 'set_acf_json_save_folder');
    function set_acf_json_save_folder( $path ) {
        $path = MY_ACF_PATH . '/acf-json';
        return $path;
    }
    add_filter('acf/settings/load_json', 'add_acf_json_load_folder');
    function add_acf_json_load_folder( $paths ) {
        unset($paths[0]);
        $paths[] = MY_ACF_PATH . '/acf-json';;
        return $paths;
    }

    // (Optional) Hide the ACF admin menu item.
    // add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
    // function my_acf_settings_show_admin( $show_admin ) {
    //     return false;
    // }
}
lpe_acf();

add_filter( 'render_block', 'lpe_wrap_blocks', 10, 2 );

function lpe_wrap_blocks( $block_content, $block ) {
    $skip = [
        "core/column"
    ];
    if ( strpos($block["blockName"], "core/") !== false && !in_array($block["blockName"], $skip) ) {
        if (is_front_page(  )) {
            $block_content = "<div class='fp-container mx-auto' data-block-name='{$block["blockName"]}'>" . $block_content . "</div>";
        } else {
            $block_content = "<div class='sm-container mx-auto' data-block-name='{$block["blockName"]}'>" . $block_content . "</div>";
        }
    }
    return $block_content;
}


add_action('acf/init', 'lpe_blocktypes');
function lpe_blocktypes() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        acf_register_block_type(array(
            'name'              => 'fp-heroine',
            'title'             => __('Frontpage Heroine'),
            'description'       => __('Heroine to be positioned on the frontpage'),
            'render_template'   => 'template-parts/blocks/fp-heroine.php',
            'category'          => 'lpe',
            'icon'              => '',
            'keywords'          => array( 'heroine', 'frontpage' ),
            "supports"          => array(
                "anchor" => true
            )
        ));

        acf_register_block_type(array(
            'name'              => 'fp-events',
            'title'             => __('Frontpage Eventlist'),
            'description'       => __('Eventlist to be positioned on the frontpage'),
            'render_template'   => 'template-parts/blocks/fp-events.php',
            'category'          => 'lpe',
            'icon'              => '',
            'keywords'          => array( 'events', 'frontpage' ),
        ));

        acf_register_block_type(array(
            'name'              => 'fp-projects',
            'title'             => __('Frontpage Projectlist'),
            'description'       => __('List of Projects to be positioned on the frontpage'),
            'render_template'   => 'template-parts/blocks/fp-projects.php',
            'category'          => 'lpe',
            'icon'              => '',
            'keywords'          => array( 'projects', 'frontpage' ),
        ));
    }
}

/*=============================================
                BREADCRUMBS
=============================================*/
//  to include in functions.php
function the_breadcrumb($args = array())
{
    $args = wp_parse_args($args, array(
        "text-color" => "text-spred",
        "opacity" => "opacity-100"
    ));

    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '<i data-feather="arrow-right" class="inline h-4 w-4"></i>'; // delimiter between crumbs
    $home = get_bloginfo("name"); // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo(
                <<<EOD
                <div id='crumbs' class='lpe-breadcrumbs {$args["text-color"]} {$args["opacity"]} text-sm'><a href='{$homeLink}'>{$home}</a></div>
                EOD);
        }
    } else {
        echo(
            <<<EOD
            <div id='crumbs' class='lpe-breadcrumbs {$args["text-color"]} {$args["opacity"]} text-sm'><a href='{$homeLink}'>{$home}</a> {$delimiter}
            EOD);
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo(
                    <<<EOD
                    <a href="{$homeLink}/{$slug['slug']}/">{$post_type->labels->singular_name}</a>
                    EOD);
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $permalink = get_permalink($page->ID);
                $title = get_the_title($page->ID);
                $breadcrumbs[] = <<<EOD
                <a href="{$permalink}">{$title}</a>
                EOD;
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
}

// Widgets

add_action( 'widgets_init', 'lpe_register_widgets' );

function lpe_register_widgets() {
	register_sidebar( array(
		'name'          => 'Footer Widget',
		'id'            => 'footer_widget',
		'before_widget' => '<div class="lpe-footer-widget">',
		'after_widget'  => '</div>'
	) );
}

function my_plugin_body_class($classes) {
    $classes[] = 'lexi-pou-epithoke';
    return $classes;
}

add_filter('body_class', 'my_plugin_body_class');