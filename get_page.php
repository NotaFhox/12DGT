<?php
header('Content-Type: application/json');

$page = $_GET['page'];

switch ($page) {
    case 'home':
        $content = '<div class="hero">
            <img src="Images/heroimage.png" alt="Stoney Homestead, Sunrise, Sun on house, Beautiful.">
            <div class="hero-content">
                <h2>Stoney Homestead</h2>
            </div>
        </div>
        <section class="services">
            <div class="service-grid">
                <!-- ╔═════════════════════════════════╗
                     ║ Booking Service Card            ║
                     ╚═════════════════════════════════╝ -->
                <div class="service-item" data-page="booking">
                    <img src="gallery-images/interior-room.jpg" alt="Booking Services">
                    <div class="service-content">
                        <h3>Book Now</h3>
                        <p>Schedule your event and make a reservation at Stoney Homestead.</p>
                        <button onclick="navigateToPage(\'booking\')">Book a Room</button>
                    </div>
                </div>
                <!-- ╔═════════════════════════════════╗
                     ║ Events Service Card             ║
                     ╚═════════════════════════════════╝ -->
                <div class="service-item" data-page="events">
                    <img src="gallery-images/homestead-with-people.jpg" alt="Events">
                    <div class="service-content">
                        <h3>Upcoming Events</h3>
                        <p>Check out our latest events and our community gatherings.</p>
                        <button onclick="navigateToPage(\'events\')">View Events</button>
                    </div>
                </div>
                <!-- ╔═════════════════════════════════╗
                     ║ Gallery Service Card            ║
                     ╚═════════════════════════════════╝ -->
                <div class="service-item" data-page="gallery">
                    <img src="gallery-images/golden-hour-homestead.jpg" alt="Gallery">
                    <div class="service-content">
                        <h3>Photo Gallery</h3>
                        <p>Browse through our beautiful collection of images.</p>
                        <button onclick="navigateToPage(\'gallery\')">View Gallery</button>
                    </div>
                </div>
            </div>
        </section>
        <section id="faq" class="services">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <h3>How do I book a stay?</h3>
                    <p>You can book a stay through our booking page. Simply fill out the form with your details and preferred date.</p>
                </div>
                <div class="faq-item">
                    <h3>What amenities do you offer?</h3>
                    <p>We offer various amenities including comfortable accommodations, beautiful surroundings, and personalized service.</p>
                </div>
                <div class="faq-item">
                    <h3>Are pets allowed?</h3>
                    <p>Please contact us directly to discuss pet accommodation options.</p>
                </div>
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
        $content = '<div class="gallery-page">
            <h1>Stoney Homestead Gallery</h1>
            <div class="gallery-container">
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/historic-homestead.jpg" alt="Historic Homestead">
                    <div class="gallery-item-caption">Historic Homestead (Early Days)</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/homestead-exterior.jpg" alt="Homestead Exterior">
                    <div class="gallery-item-caption">Homestead Exterior</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/sunny-homestead.jpg" alt="Sunny Homestead">
                    <div class="gallery-item-caption">Sunny Day at Stoney Homestead</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/homestead-with-people.jpg" alt="Homestead with People">
                    <div class="gallery-item-caption">Community at Stoney Homestead</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/homestead-detail.jpg" alt="Homestead Architectural Detail">
                    <div class="gallery-item-caption">Architectural Details</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/stoney-homestead-sign.jpg" alt="Stoney Homestead Sign">
                    <div class="gallery-item-caption">Stoney Homestead Entrance</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/interior-room.jpg" alt="Interior Room">
                    <div class="gallery-item-caption">Historic Interior</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/vintage-homestead.jpg" alt="Vintage Homestead">
                    <div class="gallery-item-caption">Vintage View</div>
                </div>
                <div class="gallery-item" onclick="openLightbox(this)">
                    <img src="gallery-images/golden-hour-homestead.jpg" alt="Golden Hour Homestead">
                    <div class="gallery-item-caption">Golden Hour</div>
                </div>
            </div>

            <!-- Lightbox -->
            <div id="lightbox" class="lightbox">
                <span class="close">&times;</span>
                <img class="lightbox-content" id="lightbox-img">
                <div id="lightbox-caption"></div>
            </div>
        </div>
        <script>
        function openLightbox(element) {
            const lightbox = document.getElementById("lightbox");
            const lightboxImg = document.getElementById("lightbox-img");
            const lightboxCaption = document.getElementById("lightbox-caption");
            
            lightboxImg.src = element.querySelector("img").src;
            lightboxCaption.innerHTML = element.querySelector(".gallery-item-caption").innerHTML;
            
            lightbox.style.display = "block";
        }

        document.querySelector(".lightbox .close").addEventListener("click", function() {
            document.getElementById("lightbox").style.display = "none";
        });

        // Close lightbox when clicking outside the image
        document.getElementById("lightbox").addEventListener("click", function(e) {
            if (e.target === this) {
                this.style.display = "none";
            }
        });
        </script>';
        break;
    default:
        $content = '<p>Page not found.</p>';
        break;
}

echo json_encode(['content' => $content]);
?>