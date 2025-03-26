<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL) && $date) {
        // Simulating booking success
        $to = 'Placeholder@email.com'; //none of this works its just here for show 
        $subject = 'New Booking Received';
        $message = "A new booking has been made:\n\nName: $name\nEmail: $email\nDate: $date";
        $headers = "From: no-reply@stoneyhomestead.com\r\n";

     
        echo json_encode(['success' => true, 'message' => 'Booking successful!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid data. Please check the form.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>