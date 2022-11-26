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
        get_template_part( "template-parts/elements/navbar");
    }
?>
<body <?php body_class(); ?>>
    <div id="main-content">