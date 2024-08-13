# David Rickard BMS

**Version:** 1.0  
**Author:** Majdi M. S. Awad  
**Author URI:** [https://github.com/majdi-php-sql](https://github.com/majdi-php-sql)  
**License:** MIT  
**Plugin URI:** [https://github.com/majdi-php-sql](https://github.com/majdi-php-sql)  

## Description

David Rickard BMS is a WordPress plugin designed to manage booking requests for David Rickard, a professional wedding DJ. This plugin allows couples to check availability, submit booking requests, and enables David Rickard to manage these requests via an admin dashboard.

## Features

- **Booking Form:** Display a form on the website where couples can select their wedding date and check availability.
- **Request Submission:** If the date is available, users can submit their booking request with their name, phone number, and location.
- **Admin Dashboard:** David Rickard can view and manage booking requests from the WordPress admin dashboard. Requests can be accepted or rejected.
- **Availability Update:** Accepted requests are marked as booked and are reflected in the availability calendar, while rejected dates remain available for other users.

## Installation

1. **Download the Plugin:**
   Clone or download the plugin files from the [David Rickard BMS GitHub Repository](https://github.com/majdi-php-sql).

2. **Upload to WordPress:**
   Upload the `david-rickard-bms` folder to your `/wp-content/plugins/` directory.

3. **Activate the Plugin:**
   Go to the WordPress dashboard, navigate to Plugins, and activate "David Rickard BMS".

4. **Place the Booking Form:**
   Use the shortcode `[dr_booking_form]` on any page or post where you want the booking form to appear.

## Usage

- **Frontend:**
  - Navigate to the page where you have added the `[dr_booking_form]` shortcode to view the booking form.
  - Select the desired wedding date and submit the form if the date is available.

- **Backend (Admin Dashboard):**
  - Go to the WordPress admin area.
  - Navigate to **David Rickard BMS** under the dashboard menu.
  - View, accept, or reject booking requests in the booking requests table.

## Administration

David Rickard can manage booking requests via the WordPress admin dashboard. Requests can be accepted or rejected, and the availability calendar is updated accordingly.

## Screenshots

1. **Booking Form:** The frontend form where users select the date and submit their request.
2. **Admin Dashboard:** The backend interface for managing booking requests.

## Frequently Asked Questions (FAQ)

**Q: How do I change the email notifications for booking requests?**  
A: This plugin does not include email notifications by default. You may need to customize the code to include email notifications based on your requirements.

**Q: Can I customize the appearance of the booking form?**  
A: Yes, you can customize the appearance by modifying the CSS styles in the plugin’s `assets/css/style.css` file.

**Q: What should I do if the booking requests are not showing up on the admin dashboard?**  
A: Ensure that the database table `wp_dr_bookings` exists and is correctly populated. Also, verify that the `dr_get_all_requests` function is working as expected.

## Changelog

**1.0**  
- Initial release with basic booking form functionality and admin dashboard for managing requests.

## License

This plugin is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Support

For support and inquiries, please visit the [GitHub Repository](https://github.com/majdi-php-sql) and open an issue or contact the author.

---

This README provides a comprehensive overview of the plugin, including installation instructions, usage guidelines, and troubleshooting tips. Adjust the content as needed based on additional features or changes made to the plugin.
