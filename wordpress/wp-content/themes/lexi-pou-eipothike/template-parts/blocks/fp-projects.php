<?php
$projects = get_posts( array(
    'post_type' => 'projects',
    'posts_per_page' => 3
) );
// TODO: External link to project page
?>

<div class="fp-container lpe-projects-wrapper">
    <div class="lpe-projects-gallery flex flex-wrap">
        <?php
        foreach($projects as $project) :
            get_template_part( "template-parts/elements/project-card", "", array(
                "project" => $project
            ) );
        endforeach;
        ?>
    </div>
</div>