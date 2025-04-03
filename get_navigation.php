<?php
// ╔════════════════════════════════════════╗
// ║ Set response content type              ║
// ╚════════════════════════════════════════╝
header('Content-Type: application/json');

$currentPage = $_GET['page'] ?? 'home';

// ╔════════════════════════════════════════╗
// ║ Define navigation structure            ║
// ╚════════════════════════════════════════╝
$navigation = [
    ['title' => 'Home', 'slug' => 'home'],
    ['title' => 'Booking', 'slug' => 'booking'],
    ['title' => 'Events', 'slug' => 'events'],
    ['title' => 'Gallery', 'slug' => 'gallery']
];

// ╔════════════════════════════════════════╗
// ║ Add FAQ link for all pages             ║
// ╚════════════════════════════════════════╝
$navigation[] = ['title' => 'FAQ', 'slug' => 'faq'];

echo json_encode($navigation);
?>