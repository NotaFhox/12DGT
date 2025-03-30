<?php
header('Content-Type: application/json');

// Note: In a real implementation, this would use Facebook Graph API
// This is a placeholder implementation
$mockEvents = [
    [
        'id' => '1',
        'message' => 'Exciting news! Our summer event planning is in full swing. Stay tuned for details!',
        'created_time' => date('Y-m-d H:i:s'),
        'link' => '#'
    ],
    [
        'id' => '2', 
        'message' => 'We are updating our facilities to better serve our community. Improvements coming soon!',
        'created_time' => date('Y-m-d H:i:s', strtotime('-1 day')),
        'link' => '#'
    ]
];

echo json_encode($mockEvents);
?>
```
<!-- this whole page was a test and ive just left it in -->