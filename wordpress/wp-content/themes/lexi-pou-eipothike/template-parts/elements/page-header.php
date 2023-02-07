<div class="lpe-heroine-container pt-36 pb-12 mb-12 bg-primary<?= ($args['featured_image']) ? ' has-thumbnail' : '' ?>">
    <div class="lpe-heroine-inner md-container">
        <h1 class="bg-secondary"><span class="text-primary"><?= $args["title"] ?></span></h1>
    </div>
    <?php if ($args["featured_image"]) : ?>
        <div class="lpe-pageheader-thumbnail">
            <img src="<?= $args["featured_image"] ?>" alt="<?= $args["title"] ?>">
        </div>
    <?php endif; ?>
</div>