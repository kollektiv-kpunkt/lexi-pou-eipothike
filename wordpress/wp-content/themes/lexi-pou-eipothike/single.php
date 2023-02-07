<?php
get_header();
get_template_part( "template-parts/elements/page-header", "", array(
    "title" => get_the_title(),
    "subtitle" => get_field("subtitle"),
    "featured_image" => get_field("different_heroine_image")["url"] ?? get_the_post_thumbnail_url()
) );
?>

<main class="md-container" id="lpe-main-page-content">
    <div class="lpe-content-container">
        <?php
        the_content( );
        ?>
    </div>
</main>

<?php
get_footer();
?>