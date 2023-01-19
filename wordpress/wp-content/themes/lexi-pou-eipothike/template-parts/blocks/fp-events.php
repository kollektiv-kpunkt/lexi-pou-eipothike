<?php
$now = date('Y-m-d', time());
// TODO: GET ALL Events that aren't in the past
// TODO: Multiday events
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
        'featured'       => false,
        'posts_per_page' => 3 - count($events)
    ));
    $events = array_merge($events, $events_bydate);
}
?>
<div class="lpe-fp-events-wrapper">
    <div class="lpe-fp-events-outer fp-container flex flex-col gap-5">
        <?php
        foreach($events as $event) :
            if (get_field("external", $event->ID) != "" && in_array("external", get_field("external", $event->ID))) {
                $event_link = get_field("external_link", $event->ID);
            } else {
                $event_link = get_permalink($event->ID);
            }
        ?>
        <div class="lpe-fp-event-wrapper text-center p-4 pb-1 bg-primary rounded-sm shadow-md border-b-2 border-b-secondary text-secondary">
            <p class="lpe-event-details"><?= tribe_get_start_date($event->ID, $display_time = false, $date_format = "d.m.") ?><?= (tribe_get_venue($event->ID) != "" && tribe_get_venue($event->ID) != NULL) ? " | " . tribe_get_venue( $event->ID) : "" ?></p>
            <h3 class="lpe-event-title text-6xl nobg mb-0"><a class="lpe-noline" href="<?= $event_link ?>"><?= $event->post_title ?></a></h3>
            <div class="lpe-event-description-wrapper max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
                <p class="lpe-event-description max-w-lg mx-auto pt-4"><?= get_the_excerpt($event->ID) ?></p>
                <a href="<?= $event_link ?>" class="block mt-2 w-fit mx-auto">Mehr erfahren</a>
            </div>
            <div class="lpe-event-more-button flex w-fit mx-auto transition-transform duration-500 ease-in-out">
                <i class="inline w-14 h-14 cursor-pointer" data-feather="chevrons-down"></i>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>