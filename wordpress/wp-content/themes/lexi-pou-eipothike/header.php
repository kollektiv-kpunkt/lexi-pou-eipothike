<?php
get_template_part( "template-parts/elements/credits");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<?php
    if (!isset($args["navbar"])) {
        get_template_part( "template-parts/elements/navbar", "", array("isFrontpage" => is_front_page()));
    }
?>
<body <?php body_class(); ?>>
    <div id="main-content">
        <div id="main-content-menu-filter" class="fixed h-full w-full top-0 left-0 bg-black bg-opacity-40" style="visibility: hidden"></div>