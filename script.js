document.addEventListener('DOMContentLoaded', function() {
    loadNavigation();
    loadPage('home');

    // ╔═════════════════════════════════╗
    // ║ Handle link click events        ║
    // ╚═════════════════════════════════╝
    function handleLinkClick(event) {
        event.preventDefault();
        const pageSlug = this.dataset.page;
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('nav');

        if (pageSlug === "faq") {
            const faqSection = document.getElementById('faq');
            faqSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else if (pageSlug === "home") {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            loadPage(pageSlug);
        } else {
            const contentContainer = document.getElementById('content-container');
            contentContainer.classList.remove('fade-in');
            contentContainer.classList.add('fade-out');
            setTimeout(() => {
                loadPage(pageSlug);
            }, 300);
        }

        // Close dropdown menu after navigation
        if (menuToggle.classList.contains('active')) {
            menuToggle.classList.remove('active');
            nav.classList.remove('mobile-dropdown');
        }
    }

    // ╔═════════════════════════════════╗
    // ║ Load navigation links           ║
    // ╚═════════════════════════════════╝
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

    // ╔═════════════════════════════════╗
    // ║ Load page content               ║
    // ╚═════════════════════════════════╝
    function loadPage(pageSlug) {
        fetch(`get_page.php?page=${pageSlug}`)
            .then(response => response.json())
            .then(data => {
                const contentContainer = document.getElementById('content-container');
                if (data.content) {
                    contentContainer.innerHTML = data.content;
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

    // ╔═════════════════════════════════╗
    // ║ Setup booking form              ║
    // ╚═════════════════════════════════╝
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
                    form.reset();
                } else {
                    responseDiv.textContent = data.message || 'Booking failed. Please try again.';
                }
            })
            .catch(error => {
                const responseDiv = document.getElementById('booking-response');
                responseDiv.textContent = 'An error occurred. Please try again later.';
                console.error("Fetch error:", error);
            });
        });
    }

    // ╔═════════════════════════════════╗
    // ║ Update active navigation link   ║
    // ╚═════════════════════════════════╝
    function updateActiveLink(pageSlug) {
        const links = document.querySelectorAll('#nav-links a');
        const navLinks = document.getElementById('nav-links');
        let activeLink = null;

        links.forEach(link => {
            if (link.dataset.page === pageSlug) {
                link.classList.add('active');
                activeLink = link;
            } else {
                link.classList.remove('active');
            }
        });

        if (activeLink) {
            //const left = activeLink.offsetLeft + (activeLink.offsetWidth / 2);  
            navLinks.style.setProperty('--indicator-left', `${left}px`);
            navLinks.style.setProperty('--indicator-width', `60%`);
            navLinks.style.setProperty('--indicator-opacity', `1`);
        }
    }

    // ╔═════════════════════════════════╗
    // ║ Dropdown menu functionality     ║
    // ╚═════════════════════════════════╝
    const menuToggle = document.createElement('button');
    menuToggle.className = 'menu-toggle';
    menuToggle.setAttribute('aria-label', 'Toggle navigation menu');
    menuToggle.innerHTML = `
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    `;

    const header = document.querySelector('header');
    header.appendChild(menuToggle);

    const nav = document.querySelector('nav');
    const navUl = nav.querySelector('ul');

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('mobile-dropdown');
        menuToggle.classList.toggle('active');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!header.contains(event.target) && nav.classList.contains('mobile-dropdown')) {
            nav.classList.remove('mobile-dropdown');
            menuToggle.classList.remove('active');
        }
    });

    // Prevent dropdown from closing when clicking inside nav
    nav.addEventListener('click', function(event) {
        event.stopPropagation();
    });
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('nav');
    
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            nav.classList.toggle('mobile-dropdown');
        });
    
        // Close dropdown when clicking outside
        document.addEventListener('click', (event) => {
            if (!nav.contains(event.target) && !menuToggle.contains(event.target)) {
                menuToggle.classList.remove('active');
                nav.classList.remove('mobile-dropdown');
            }
        });
    });
});