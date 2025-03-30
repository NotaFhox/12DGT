document.addEventListener('DOMContentLoaded', function() {
    const facebookEventsContainer = document.getElementById('facebook-events');

    async function fetchFacebookEvents() {
        try {
            const response = await fetch('fetch_facebook_events.php');
            const events = await response.json();

            // Clear loading spinner
            facebookEventsContainer.innerHTML = '';

            if (events.length === 0) {
                facebookEventsContainer.innerHTML = '<p>No recent events found.</p>';
                return;
            }

            const eventsHTML = events.map(event => `
                <div class="facebook-event-card">
                    <p class="event-message">${event.message}</p>
                    <div class="event-meta">
                        <span class="event-date">${new Date(event.created_time).toLocaleDateString()}</span>
                        ${event.link ? `<a href="${event.link}" target="_blank" class="event-link">View Details</a>` : ''}
                    </div>
                </div>
            `).join('');

            facebookEventsContainer.innerHTML = `
                <h2>Recent Facebook Updates</h2>
                ${eventsHTML}
            `;
        } catch (error) {
            facebookEventsContainer.innerHTML = '<p>Error loading events. Please try again later.</p>';
            console.error('Events fetch error:', error);
        }
    }

    function initializeFacebookSDK() {
        if (typeof FB !== 'undefined') {
            FB.XFBML.parse(); // Parse the Facebook embed
        } else {
            console.error('Facebook SDK not loaded.');
        }
    }

    fetchFacebookEvents();
    initializeFacebookSDK();
});