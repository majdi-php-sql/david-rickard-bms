<?php
function dr_display_booking_requests() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'dr_bookings';
    
    // Retrieve bookings
    $bookings = $wpdb->get_results("SELECT * FROM $table_name ORDER BY wedding_date DESC");
    
    if ($bookings) {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Name</th><th>Phone</th><th>Location</th><th>Wedding Date</th><th>Status</th><th>Actions</th></tr></thead>';
        echo '<tbody>';
        
        foreach ($bookings as $booking) {
            echo '<tr>';
            echo '<td>' . esc_html($booking->name) . '</td>';
            echo '<td>' . esc_html($booking->phone) . '</td>';
            echo '<td>' . esc_html($booking->location) . '</td>';
            echo '<td>' . esc_html($booking->wedding_date) . '</td>';
            echo '<td>' . esc_html($booking->status) . '</td>';
            echo '<td>';
            echo '<a href="?page=dr_manage_booking&action=approve&id=' . intval($booking->id) . '">Approve</a> | ';
            echo '<a href="?page=dr_manage_booking&action=reject&id=' . intval($booking->id) . '">Reject</a>';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</tbody></table>';
    } else {
        echo '<p>No booking requests found.</p>';
    }
}

?>
