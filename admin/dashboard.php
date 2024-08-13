<?php
/**
 * Admin Dashboard for David Rickard BMS Plugin
 */

// Add a menu item for the plugin
function dr_add_admin_menu() {
    add_menu_page('David Rickard BMS', 'BMS Dashboard', 'manage_options', 'dr_bms_dashboard', 'dr_render_dashboard', 'dashicons-calendar-alt');
}
add_action('admin_menu', 'dr_add_admin_menu');

// Render the dashboard
function dr_render_dashboard() {
    $requests = dr_get_all_requests();
    ?>
    <div class="wrap">
        <h1>Booking Requests</h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request) : ?>
                <tr>
                    <td><?php echo esc_html($request->name); ?></td>
                    <td><?php echo esc_html($request->phone); ?></td>
                    <td><?php echo esc_html($request->location); ?></td>
                    <td><?php echo esc_html($request->date); ?></td>
                    <td><?php echo esc_html($request->status); ?></td>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=dr_bms_dashboard&action=accept&id=' . $request->id); ?>">Accept</a> |
                        <a href="<?php echo admin_url('admin.php?page=dr_bms_dashboard&action=reject&id=' . $request->id); ?>">Reject</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}

// Handle accept/reject actions
function dr_handle_admin_actions() {
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = intval($_GET['id']);

        if ($action == 'accept') {
            dr_update_booking_status($id, 'accepted');
        } elseif ($action == 'reject') {
            dr_update_booking_status($id, 'rejected');
        }

        wp_redirect(admin_url('admin.php?page=dr_bms_dashboard'));
        exit;
    }
}
add_action('admin_init', 'dr_handle_admin_actions');
