document.addEventListener('DOMContentLoaded', function() {
    // ╔════════════════════════════════════════╗
    // ║ Initialize website on page load        ║
    // ╚════════════════════════════════════════╝
    loadNavigation();
    loadPage('home');

    // ╔════════════════════════════════════════╗
    // ║ Navigation function for page switching ║
    // ╚════════════════════════════════════════╝
    function navigateToPage(pageSlug) {
        // Check if link is for FAQ section
        if (pageSlug === "faq") {
            // Load home page if not already there
            loadPage('home');
            // Scroll to FAQ with delay to ensure content is loaded
            setTimeout(() => {
                const faqSection = document.getElementById('faq');
                if (faqSection) {
                    faqSection.scrollIntoView({ behavior: 'smooth', block: 'end' });
                }
            }, 300);
            return;
        }
        
        // Get current page to check if we're already on the target page
        const currentActiveLink = document.querySelector('#nav-links a.active');
        const currentPage = currentActiveLink ? currentActiveLink.dataset.page : '';
        
        // If clicking the current page, add bounce animation without fade effects
        if (currentPage === pageSlug) {
            const contentContainer = document.getElementById('content-container');
            // Remove any fade classes to prevent flashing
            contentContainer.classList.remove('fade-in', 'fade-out');
            // Add only the bounce animation
            contentContainer.classList.add('bounce-animation');
            setTimeout(() => {
                contentContainer.classList.remove('bounce-animation');
                // Don't add fade-in class after animation to prevent flashing
            }, 500);
            return;
        }
        
        // Otherwise load the requested page
        loadPage(pageSlug);
    }

    // Make navigation function available globally
    window.navigateToPage = navigateToPage;

    // ╔════════════════════════════════════════╗
    // ║ Handle navigation link clicks          ║
    // ╚════════════════════════════════════════╝
    function handleLinkClick(event) {
        event.preventDefault();
        const pageSlug = this.dataset.page;

        // Handle FAQ link special case
        if (pageSlug === "home#faq" || pageSlug === "faq") {
            loadPage('home');
            setTimeout(() => {
                const faqSection = document.getElementById('faq');
                if (faqSection) {
                    faqSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }, 300);
            return;
        }

        // Get current page to check if we're already on the target page
        const currentActiveLink = document.querySelector('#nav-links a.active');
        const currentPage = currentActiveLink ? currentActiveLink.dataset.page : '';
        
        // If clicking the current page, add bounce animation without fade effects
        if (currentPage === pageSlug) {
            const contentContainer = document.getElementById('content-container');
            // Remove any fade classes to prevent flashing
            contentContainer.classList.remove('fade-in', 'fade-out');
            // Add only the bounce animation
            contentContainer.classList.add('bounce-animation');
            setTimeout(() => {
                contentContainer.classList.remove('bounce-animation');
                // Don't add fade-in class after animation to prevent flashing
            }, 500);
            return;
        }

        // Fade out current content before loading new page
        const contentContainer = document.getElementById('content-container');
        contentContainer.classList.remove('fade-in');
        contentContainer.classList.add('fade-out');
        setTimeout(() => {
            loadPage(pageSlug);
        }, 300);

        // Close mobile menu if open
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('nav');
        if (menuToggle && menuToggle.classList.contains('active')) {
            menuToggle.classList.remove('active');
            nav.classList.remove('mobile-dropdown');
        }
    }

    // ╔════════════════════════════════════════╗
    // ║ Load navigation menu from server       ║
    // ╚════════════════════════════════════════╝
    function loadNavigation() {
        fetch('get_navigation.php')
            .then(response => response.json())
            .then(data => {
                const navLinks = document.getElementById('nav-links');
                navLinks.innerHTML = '';
                data.forEach(page => {
                    const li = document.createElement('li');
                    const a = document.createElement('a');
                    a.href = '#';
                    a.textContent = page.title;
                    a.dataset.page = page.slug;
                    a.addEventListener('click', handleLinkClick);
                    li.appendChild(a);
                    navLinks.appendChild(li);
                });
                updateActiveLink('home');
            });
    }

    // ╔════════════════════════════════════════╗
    // ║ Load page content from server          ║
    // ╚════════════════════════════════════════╝
    function loadPage(pageSlug) {
        fetch(`get_page.php?page=${pageSlug}`)
            .then(response => response.json())
            .then(data => {
                const contentContainer = document.getElementById('content-container');
                if (data.content) {
                    contentContainer.innerHTML = data.content;
                    
                    // Setup specific page features
                    if (pageSlug === 'booking') {
                        setupBookingForm();
                    }
                } else {
                    contentContainer.innerHTML = '<p>Page not found.</p>';
                }
                updateActiveLink(pageSlug);
                contentContainer.classList.remove('fade-out');
                contentContainer.classList.add('fade-in');
            });
    }

    // ╔════════════════════════════════════════╗
    // ║ Setup booking form submission handler  ║
    // ╚════════════════════════════════════════╝
    function setupBookingForm() {
        const form = document.getElementById('booking-form');
        if (!form) return;
        
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(form);
            
            fetch('process_booking.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const responseDiv = document.getElementById('booking-response');
                if (data.success) {
                    responseDiv.textContent = 'Booking successful!';
                    responseDiv.style.color = 'green';
                    form.reset();
                } else {
                    responseDiv.textContent = data.message || 'Booking failed. Please try again.';
                    responseDiv.style.color = 'red';
                }
            })
            .catch(error => {
                const responseDiv = document.getElementById('booking-response');
                responseDiv.textContent = 'An error occurred. Please try again later.';
                responseDiv.style.color = 'red';
                console.error("Fetch error:", error);
            });
        });
    }

    // ╔════════════════════════════════════════╗
    // ║ Update active navigation link          ║
    // ╚════════════════════════════════════════╝
    function updateActiveLink(pageSlug) {
        const links = document.querySelectorAll('#nav-links a');
        links.forEach(link => {
            if (link.dataset.page === pageSlug) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    // ╔════════════════════════════════════════╗
    // ║ Mobile menu toggle functionality       ║
    // ╚════════════════════════════════════════╝
    const header = document.querySelector('header');
    const nav = document.querySelector('nav');
    const menuToggle = document.createElement('button');
    
    menuToggle.setAttribute('aria-label', 'Toggle navigation menu');
    menuToggle.setAttribute('aria-expanded', 'false');
    
    menuToggle.className = 'menu-toggle';
    menuToggle.innerHTML = `
        <span class="sr-only">Menu</span>
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    `;

    header.appendChild(menuToggle);

    menuToggle.addEventListener('click', function() {
        const isOpen = nav.classList.toggle('mobile-dropdown');
        menuToggle.classList.toggle('active');
        menuToggle.setAttribute('aria-expanded', isOpen);
        
        if (isOpen) {
            const focusableElements = nav.querySelectorAll('a');
            if (focusableElements.length) {
                focusableElements[0].focus();
            }
        }
    });

    // ╔════════════════════════════════════════╗
    // ║ Keyboard navigation for dropdown menu  ║
    // ╚════════════════════════════════════════╝
    nav.addEventListener('keydown', function(e) {
        const navLinks = nav.querySelectorAll('a');
        const currentIndex = Array.from(navLinks).indexOf(document.activeElement);

        switch(e.key) {
            case 'ArrowDown':
            case 'ArrowRight':
                e.preventDefault();
                const nextIndex = (currentIndex + 1) % navLinks.length;
                navLinks[nextIndex].focus();
                break;
            case 'ArrowUp':
            case 'ArrowLeft':
                e.preventDefault();
                const prevIndex = (currentIndex - 1 + navLinks.length) % navLinks.length;
                navLinks[prevIndex].focus();
                break;
        }
    });

    // ╔════════════════════════════════════════╗
    // ║ Close dropdown when clicking outside   ║
    // ╚════════════════════════════════════════╝
    document.addEventListener('click', function(event) {
        if (!header.contains(event.target) && nav.classList.contains('mobile-dropdown')) {
            nav.classList.remove('mobile-dropdown');
            menuToggle.classList.remove('active');
        }
    });

    // ╔════════════════════════════════════════╗
    // ║ Prevent dropdown from closing when     ║
    // ║ clicking inside navigation             ║
    // ╚════════════════════════════════════════╝
    nav.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // ╔════════════════════════════════════════╗
    // ║ Lightbox functionality                 ║
    // ╚════════════════════════════════════════╝
    function openLightbox(element) {
        const lightbox = document.getElementById("lightbox");
        const lightboxImg = document.getElementById("lightbox-img");
        const lightboxCaption = document.getElementById("lightbox-caption");

        lightboxImg.src = element.querySelector("img").src;
        lightboxCaption.innerHTML = element.querySelector(".gallery-item-caption").innerHTML;

        lightbox.style.display = "block";
    }

    document.querySelector(".lightbox .close").addEventListener("click", function () {
        document.getElementById("lightbox").style.display = "none";
    });

    // Close lightbox when clicking outside the image
    document.getElementById("lightbox").addEventListener("click", function (e) {
        if (e.target === this) {
            this.style.display = "none";
        }
    });
    
    // ╔════════════════════════════════════════╗
    // ║ Header scroll effect                   ║
    // ╚════════════════════════════════════════╝
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});