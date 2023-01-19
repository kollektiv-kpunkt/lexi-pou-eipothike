<div class="lpe-navbar-wrapper fixed z-50 top-0 left-0 flex w-full<?= ($args["isFrontpage"]) ? "" : " bg-ocean" ?>">
    <div class="md-container lpe-navbar-inner flex justify-between w-full py-2 items-center">
        <div class="lpe-navbar-logo flex justify-center">
            <a class="lpe-logo lpe-noline lpe-bigshoulders py-3 px-4 bg-primary text-secondary leading-none text-4xl text-center border-2 border-secondary" href="/">Fatima Moumouni</a>
        </div>
        <div class="lpe-navbar-menu flex justify-end">
            <div class="lpe-navbar-menubutton border-2 border-secondary bg-secondary">
                <button class="lpe-navbar-tofuburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="lpe-main-menu-container fixed top-0 right-0 z-30 w-full sm:w-fit sm:max-w-full text-white bg-secondary px-6 sm:px-16 py-24 h-full flex flex-col overflow-y-auto" style="transform: translateX(100%)">
    <div class="lpe-main-nav-content my-auto">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'lpe-main-nav',
            'container' => false,
            'menu_class' => 'lpe-main-menu flex flex-col gap-12',
            'menu_id' => 'lpe-main-menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s text-4xl font-bold">%3$s</ul>'
        ) );
        ?>
    </div>
</div>