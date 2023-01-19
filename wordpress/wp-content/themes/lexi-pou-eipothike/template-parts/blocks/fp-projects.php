<?php
$projects = get_posts( array(
    'post_type' => 'projects',
    'posts_per_page' => 3
) );
// TODO: External link to project page
?>

<div class="fp-container lpe-fp-projects-wrapper">
    <div class="lpe-fp-projects-gallery flex flex-wrap">
        <?php
        foreach($projects as $project) :
            if ( has_post_thumbnail( $project->ID ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $project->ID ), 'medium_large' );
            } else {
                $image = false;
            }
        ?>
            <div class="lpe-fp-project">
                <?php
                if ($image) :
                ?>
                    <div class="lpe-fp-project-image">
                        <img src="<?php echo $image[0]; ?>" alt="<?php echo $project->post_title; ?>">
                    </div>
                <?php
                endif
                ?>
                <div class="lpe-fp-project-content text-secondary bg-primary p-6">
                    <h3 class="lpe-fp-project-title nobg mb-2"><?php echo $project->post_title; ?></h3>
                    <div class="lpe-fp-project-excerpt">
                        <?php echo get_the_excerpt($project->ID) ?>
                    </div>
                    <a href="<?php echo get_permalink($project->ID); ?>" class="lpe-fp-project-link block w-fit mt-3">Mehr erfahren</a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>