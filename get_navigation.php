<?php // get_navigation.php
header('Content-Type: application/json');
echo json_encode([
    ['title' => 'Home', 'slug' => 'home'],
    ['title' => 'Booking', 'slug' => 'booking'],
    ['title' => 'Events', 'slug' => 'events'],
    ['title' => 'Gallery', 'slug' => 'gallery'],
    ['title' => 'FAQ', 'slug' => 'faq']
]);
?>