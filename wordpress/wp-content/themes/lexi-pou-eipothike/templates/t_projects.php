<?php
/*
Template Name: Projekt Layout
Template Post Type: page
*/
get_header();
$the_query = new WP_Query( array(
        "post_type" => "projects",
        "posts_per_page" => 6,
        "status" => "publish",
        "order" => "DESC",
        "paged" => get_query_var("paged") ? get_query_var("paged") : 1
) );
$projects = $the_query->posts;
get_template_part( "template-parts/elements/page-header", "", array(
    "title" => get_the_title(),
    "subtitle" => get_field("subtitle"),
    "featured_image" => get_the_post_thumbnail_url()
) );
?>


<main class="md-container" id="lpe-main-page-content">
    <div class="lpe-content-container">
        <?php
        the_content( );
        ?>
    </div>
    <div class="lpe-projects-gallery flex flex-wrap mt-12">
        <?php
        foreach($projects as $project) :
            get_template_part( "template-parts/elements/project-card", "", array(
                "project" => $project
            ) );
        endforeach;
        ?>
    </div>
    <div class="lpe-projects-pagination mt-8">
        <?php
            echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $the_query->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => true,
                'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
                'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
                'add_args'     => false,
                'add_fragment' => '',
            ) );
        ?>
    </div>
</main>

<?php
get_footer( );
?>