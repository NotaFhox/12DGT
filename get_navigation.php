<!-- ╔═════════════════════════════════╗
║ Navigation stuff   ║
╚═════════════════════════════════╝  -->


<?php
header('Content-Type: application/json');

$currentPage = $_GET['page'] ?? 'home';

$navigation = [
    ['title' => 'Home', 'slug' => 'home'],
    ['title' => 'Booking', 'slug' => 'booking'],
    ['title' => 'Events', 'slug' => 'events'],
    ['title' => 'Gallery', 'slug' => 'gallery']
];


if ($currentPage === 'home') {
    $navigation[] = ['title' => 'FAQ', 'slug' => 'faq'];
}

echo json_encode($navigation);
?>