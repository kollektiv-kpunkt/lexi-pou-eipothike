<?php
$now = date('Y-m-d', time());
$events = tribe_get_events(array(
    "start_date" => date('Y-m-d', time()),
    'orderby'        => 'date',
    'order'          => 'ASC',
    'featured'       => true,
    'posts_per_page' => 3));

if (count($events) < 3) {
    $events_bydate = tribe_get_events(array(
        "start_date" => date('Y-m-d', time()),
        'orderby'        => 'date',
        'order'          => 'ASC',
        'posts_per_page' => 3 - count($events)
    ));
    $events = array_merge($events, $events_bydate);
}
?>
<div class="lpe-fp-events-wrapper">
    <div class="lpe-fp-events-outer fp-container flex flex-col gap-5">
        <?php
        foreach($events as $event) :
        ?>
        <div class="lpe-fp-event-wrapper text-center p-4 pb-1 bg-apple-110 rounded-sm shadow-md border-b-2 border-b-white">
            <p class="lpe-event-details"><?= tribe_get_start_date($event->ID, $display_time = false, $date_format = "m.d.") ?><?= (tribe_get_venue( $event->ID) != "") ? " | " . tribe_get_venue( $event->ID) : "" ?></p>
            <h3 class="lpe-event-title text-6xl nobg text-ocean mb-0"><a class="lpe-noline" href="<?= get_permalink($event->ID) ?>"><?= $event->post_title ?></a></h3>
            <div class="lpe-event-description-wrapper max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                <p class="lpe-event-description max-w-lg mx-auto pt-4"><?= get_the_excerpt($event->ID) ?></p>
            </div>
            <div class="lpe-event-more-button flex w-fit mx-auto transition-transform duration-500 ease-in-out">
                <i class="inline w-14 h-14 text-white" data-feather="chevrons-down"></i>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>