<?php
get_header();
?>
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
</main>

<?php
get_footer();
?>