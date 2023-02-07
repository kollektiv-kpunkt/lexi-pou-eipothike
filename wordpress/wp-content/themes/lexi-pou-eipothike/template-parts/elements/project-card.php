<?php
$project = $args["project"];
if ( has_post_thumbnail( $project->ID ) ) {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $project->ID ), 'medium_large' );
} else {
    $image = false;
}
if (get_field("external", $project->ID) != "" && in_array("external", get_field("external", $project->ID))) {
    $project_link = get_field("external_link", $project->ID);
    $target="target='_blank' rel='noopener noreferrer'";
} else {
    $project_link = get_permalink($project->ID);
    $target="target='_self'";
}
?>
<div class="lpe-project">
    <?php
    if ($image) :
    ?>
        <div class="lpe-project-image">
            <img src="<?php echo $image[0]; ?>" alt="<?php echo $project->post_title; ?>">
        </div>
    <?php
    endif
    ?>
    <div class="lpe-project-content text-secondary bg-primary p-6">
        <h3 class="lpe-project-title nobg mb-2"><?php echo $project->post_title; ?></h3>
        <div class="lpe-project-excerpt">
            <?php echo get_the_excerpt($project->ID) ?>
        </div>
        <a href="<?= $project_link ?>" class="lpe-project-link block w-fit mt-3" <?= $target ?>>Mehr erfahren</a>
    </div>
</div>