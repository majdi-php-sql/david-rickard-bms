<?php
/**
 * Handle database interactions
 */

// Function to check if a date is already booked
function dr_is_date_booked($date) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dr_bookings';
    $result = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table_name WHERE date = %s AND status = 'accepted'", $date));
    return $result > 0;
}

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

// Function to get all booking requests
function dr_get_all_requests() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dr_bookings';
    return $wpdb->get_results("SELECT * FROM $table_name ORDER BY date ASC");
}

// Function to update booking status
function dr_update_booking_status($id, $status) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dr_bookings';
    $wpdb->update($table_name, array('status' => $status), array('id' => $id));
}
