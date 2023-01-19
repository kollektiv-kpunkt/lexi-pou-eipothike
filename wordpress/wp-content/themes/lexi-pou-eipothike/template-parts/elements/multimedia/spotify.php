<?php
$id = $args["ID"];
$type = explode(":", $id)[1];
$uri = explode(":", $id)[2];
?>
<iframe style="border-radius:12px" src="https://open.spotify.com/embed/<?= $type ?>/<?= $uri ?>" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>