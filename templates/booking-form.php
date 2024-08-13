<?php
/**
 * Booking Form Template
 */

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dr_booking_date'])) {
    $date = sanitize_text_field($_POST['dr_booking_date']);

    // Check if the date is already booked
    if (dr_is_date_booked($date)) {
        echo '<p>Sorry, David Rickard is already booked on this date.</p>';
    } else {
        // Show the rest of the form to request booking
        if (isset($_POST['dr_name'], $_POST['dr_phone'], $_POST['dr_location'])) {
            $name = sanitize_text_field($_POST['dr_name']);
            $phone = sanitize_text_field($_POST['dr_phone']);
            $location = sanitize_text_field($_POST['dr_location']);

            dr_save_booking_request($name, $phone, $location, $date);
            echo '<p>Your request has been submitted. David Rickard will get back to you soon.</p>';
        } else {
            ?>
            <form method="post">
                <input type="hidden" name="dr_booking_date" value="<?php echo esc_attr($date); ?>">
                <p>
                    <label for="dr_name">Name:</label>
                    <input type="text" name="dr_name" required>
                </p>
                <p>
                    <label for="dr_phone">Phone:</label>
                    <input type="text" name="dr_phone" required>
                </p>
                <p>
                    <label for="dr_location">Location:</label>
                    <input type="text" name="dr_location" required>
                </p>
                <p>
                    <input type="submit" value="Request Booking">
                </p>
            </form>
            <?php
        }
    }
} else {
    ?>
    <form method="post">
        <p>
            <label for="dr_booking_date">Wedding Date:</label>
            <input type="date" name="dr_booking_date" required>
        </p>
        <p>
            <input type="submit" value="Check Availability">
        </p>
    </form>
    <?php
}
