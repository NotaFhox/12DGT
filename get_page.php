<?php

/**
 * get_page.php
 *
 * This script retrieves page content based on the 'page' parameter and returns it as JSON.
 */

// Set the content type to JSON
header('Content-Type: application/json');

// Get the page parameter from the query string
$page = $_GET['page'];

// Determine the content based on the page parameter
switch ($page) {
    case 'home':
        $content = '<div class="hero">
            <img src="Images/heroimage.png" alt="Stoney Homestead, Sunrise, Sun on house, Beautiful.">
            <div class="hero-content">
                <h2>LOREM IPSUM DOLOR</h2>
                <button>Lorem</button>
                <button>Ipsum</button>
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
        $content = '<h1>Booking Page</h1>';
        break;
    case 'events':
        $content = '<h1>Events Page</h1>';
        break;
    case 'gallery':
        $content = '<h1>Gallery Page</h1>';
        break;
    default:
        $content = '<p>Page not found.</p>';
        break;
}

// Return the content of this file as a JSON file
echo json_encode(['content' => $content]);

?>