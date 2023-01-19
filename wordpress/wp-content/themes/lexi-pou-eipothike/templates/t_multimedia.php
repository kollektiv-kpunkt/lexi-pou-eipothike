<?php
/*
Template Name: Multimedia Layout
Template Post Type: page
TODO: Twitter und TikTok Temapltes und Facebook bugs
*/
get_header();
$medias = get_posts(
    array(
        "post_type" => "mutlimedia",
        "posts_per_page" => -1,
        "status" => "publish"
    )
)
?>
<div class="lpe-multimedia-loader fixed top-0 left-0 h-screen w-screen bg-secondary flex justify-center items-center z-50 transition-opacity duration-200">
    <p><em>Medien werden geladen...</em></p>
</div>

<div class="lpe-heroine-container pt-36 pb-12 mb-12 bg-primary">
    <div class="lpe-heroine-inner md-container">
        <h1 class="bg-secondary"><span class="text-primary"><?= the_title() ?></span></h1>
    </div>
</div>

<main class="md-container" id="lpe-main-page-content">
    <div class="lpe-content-container">
        <?php
        the_content( );
        ?>
    </div>
    <div class="lpe-multimedia-grid mt-12">
        <div class="lpe-multimedia-gutter-sizer"></div>
        <?php foreach($medias as $media) : ?>
            <div class="lpe-multimedia-element">
                <?php get_template_part( "template-parts/elements/multimedia/" . get_field("type", $media->ID), "", array("ID" => get_field("id", $media->ID))); ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php
get_footer( );
?>