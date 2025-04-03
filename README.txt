* HTML (`index.html`): Contains the basic structure of the website, including placeholders for the navigation and dynamic content. It links to the external CSS and JavaScript files.
* CSS (`Style.css`): Contains all the styling for the website, including layout, colors, fonts, and animations. It is linked in the HTML file.
* JavaScript (`script.js`): Contains all the client-side JavaScript code, including functions to load navigation, handle page content, and manage the booking form. It is linked in the HTML file.
* JavaScript (`events.js`): Handles fetching and displaying Facebook events on the events page.
* PHP (`get_navigation.php`): A PHP script that retrieves the navigation data (in this case, a hardcoded array) and returns it as JSON. This is fetched by the JavaScript code.
*PHP (`get_page.php`): A PHP scrit that retrieves the content for a specific page based on the `page` parameter in the URL. It returns the content as JSON, which is then inserted into the HTML by the JavaScript code.
* PHP (`process_booking.php`): A PHP script that handles the submission of the booking form. It retrieves the form data, validates it, and then simulates processing the booking (in a real application, it would save the data to a database and send an email). It returns a JSON response indicating the success or failure of the operation.
* PHP (`fetch_facebook_events.php`): A PHP script that simulates fetching Facebook events. In a real implementation, it would use the Facebook Graph API to retrieve events.

This code is geniunely a fever dream of redundant lines and other things that wouldnt really be called "code" per say. have fun ^-^