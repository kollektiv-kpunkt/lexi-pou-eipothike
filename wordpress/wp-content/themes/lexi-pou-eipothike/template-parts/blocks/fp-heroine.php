<div class="lpe-fp-heroine-wrapper relative">
    <div class="lpe-fp-heroine-bg absolute z-10 top-0 left-0 w-full h-full">
        <div class="lpe-fp-heroine-bg-desk">
        <?php
        $image = get_field('bg_image');
        echo(wp_get_attachment_image($image["ID"], 'full'));
        ?>
        </div>
        <div class="lpe-fp-heroine-bg-mobile">
        <?php
        $image = get_field('bg_image_mobile');
        echo(wp_get_attachment_image($image["ID"], 'full'));
        ?>
        </div>
        <div class="lpe-fp-heroine-bg-overlay"></div>
        <div class="lpe-fp-heroine-bg-overlay lpe-fp-heroine-bg-darken"></div>
    </div>
    <div class="lpe-fp-heroine-outer absolute z-10 top-0 left-0 w-full h-full flex items-end">
        <div class="lpe-fp-heroine-inner fp-container-lg">
            <div class="lpe-fp-heroine-content pb-16 text-5xl text-white max-w-xl lpe-bigshoulders leading-none">
                <p class="mb-6"><?= the_field("content") ?></p>
                <a href="??more" class="lpe-noline">Erfahre mehr <i class="inline w-10 h-10 text-white" data-feather="chevrons-down"></i></a>
            </div>
        </div>
    </div>
</div>