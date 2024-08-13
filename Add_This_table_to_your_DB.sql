// Function to save a booking request
function dr_save_booking_request($name, $phone, $location, $date) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dr_bookings';
    $wpdb->insert($table_name, array(
        'name' => $name,
        'phone' => $phone,
        'location' => $location,
        'date' => $date,
        'status' => 'pending',
    ));
}
