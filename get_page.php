<?php
// ╔═════════════════════════════════╗
// ║ Set response content type        ║
// ╚═════════════════════════════════╝
header('Content-Type: application/json');

// ╔═════════════════════════════════╗
// ║ Get page parameter from URL      ║
// ╚═════════════════════════════════╝
$page = $_GET['page'];

// ╔═════════════════════════════════╗
// ║ Generate content based on page   ║
// ╚═════════════════════════════════╝
switch ($page) {
    case 'home':
        $content = '<div class="hero">
            <img src="Images/heroimage.png" alt="Stoney Homestead, Sunrise, Sun on house, Beautiful.">
            <div class="hero-content">
                <h2>Stoney Homestead</h2>
            </div>
        </div>
        <section class="services">
            <h2>Lorem ipsum dolor sit amet</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="service-grid">
                <div class="service-item">
                    <img src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=" alt="Placeholder">
                    <div class="service-content">
                        <h3>Lorem Ipsum</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                        <button>Select</button>
                    </div>
                </div>
                <div class="service-item">
                    <img src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=" alt="Placeholder">
                    <div class="service-content">
                        <h3>Dolor Sit</h3>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras mattis consectetur purus sit amet fermentum.</p>
                        <button>Select</button>
                    </div>
                </div>
                <div class="service-item">
                    <img src="https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=" alt="Placeholder">
                    <div class="service-content">
                        <h3>Amet Consectetur</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                        <button>Select</button>
                    </div>
                </div>
            </div>
        </section>
        <section id="faq" class="services">
            <h2>Frequently Asked Questions</h2>
            <p>PLACEHOLDER ALALAL LKOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOONG TEXT PLEASE WRAP FDJHASKLHSAJKLDHJASJKHKJLJKHL</p>
            <div>
                <h3>Question 1: Question whun</h3>
                <p>Answer whun</p>
                <h3>Question 2: Q2</h3>
                <p>A2</p>
                <h3>Question 3: Q3</h3>
                <p>A3</p>
            </div>
        </section>';
        break;
    case 'booking':
        $content = '<div class="booking-page">
        <h1>Booking Page</h1>
            <form id="booking-form" class="booking-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
                <button type="submit">Submit</button>
            </form>
            <div id="booking-response"></div>
        </div>';
        break;
    case 'events':
        $content = '<div class="events-page">
        <h1>Upcoming Events</h1>
        <div id="facebook-events" class="events-container">
            <div class="loading-spinner">Loading events...</div>
        </div>
        <section class="facebook-page">
            <h2>Follow Us on Facebook</h2>
            <div class="fb-page" 
                data-href="https://www.facebook.com/StoneyHomestead" 
                data-tabs="timeline" 
                data-width="500" 
                data-height="600" 
                data-small-header="false" 
                data-adapt-container-width="true" 
                data-hide-cover="false" 
                data-show-facepile="true">
            </div>
        </section>
    </div>
    <script src="events.js"></script>';
        break;
    case 'gallery':
        $content = '<h1>Gallery Page</h1>';
        break;
    default:
        $content = '<p>Page not found.</p>';
        break;
}

// ╔═════════════════════════════════╗
// ║ Return content as JSON response  ║
// ╚═════════════════════════════════╝
echo json_encode(['content' => $content]);
?>