<div class="lpe-fp-heroine-wrapper min-h-screen flex items-center py-20">
    <div class="md-container lpe-fp-heroine flex flex-wrap justify-between">
        <div class="lpe-fp-heroine-content text-primary w-2/5">
            <h1 class="lpe-bigshoulders text-8xl lg:text-9xl nobg">Fatima<br>Moumouni</h1>
            <p class="text-3xl"><?= the_field("content") ?></p>
            <a href="#" class="lpe-button lpe-fp-more-button lpe-button-more text-secondary block text-5xl w-fit mt-8"
                onclick="
                    let e = window.event || event;
                    e.preventDefault();
                    let a = e.target.closest('a');
                    let heroine = a.closest('.lpe-fp-heroine-wrapper');
                    heroine.nextElementSibling.scrollIntoView({behavior: 'smooth'});
                "
            >Mehr zu mir</a>
        </div>
        <div class="lpe-fp-heroine-image w-1/2 pl-12">
            <div class="lpe-fp-heroine-image-container h-full relative">
                <img src="<?= wp_get_attachment_url( get_field("heroine_image")["ID"] ) ?>" alt="Fatima Moumouni - Spoken Word Poet" class="absolute top-0 left-0 w-full h-full object-cover">
            </div>
        </div>
    </div>
</div>