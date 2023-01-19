<?php
$id = explode("=", $args["ID"])[1];
?>
<div class="lpe-multimedia-yt">
    <iframe src="https://www.youtube.com/embed/<?= $id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>