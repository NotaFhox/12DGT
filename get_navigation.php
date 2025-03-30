<?php
header('Content-Type: application/json');

$currentPage = $_GET['page'] ?? 'home';

$navigation = [
    ['title' => 'Home', 'slug' => 'home'],
    ['title' => 'Booking', 'slug' => 'booking'],
    ['title' => 'Events', 'slug' => 'events'],
    ['title' => 'Gallery', 'slug' => 'gallery']
];

// Correct the FAQ slug to link to the FAQ section on the homepage
if ($currentPage === 'home') {
    $navigation[] = ['title' => 'FAQ', 'slug' => 'home#faq'];
}

echo json_encode($navigation);
?>