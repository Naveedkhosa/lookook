<?php
include "../config.php";
/**
 * CSV Export functionality using PHP.
 **/

if (isset($_GET['u'])) {
    $user_id = $_GET['u'];
    $user_query = "SELECT * FROM users WHERE user_id = {$user_id};";
    if ($user_q_result = mysqli_query($conn, $user_query)) {
        if (mysqli_num_rows($user_q_result) > 0) {
            $user_row = mysqli_fetch_assoc($user_q_result);
            $user_name = $user_row['user_name'];
            $user_original_number = $user_row['user_original_number'];
            $joined_on = $user_row['joined_on'];

            $last_booking_date = "";

            $getBooking = "SELECT booking_for_date FROM booking WHERE booking_user_id = {$user_id} AND (booking_status='current' OR booking_status='completed' OR booking_status='confirmed') AND booking_for_date < NOW() ORDER BY primary_id DESC LIMIT 1;";

            if ($booking_result = mysqli_query($conn, $getBooking)) {
                if (mysqli_num_rows($booking_result) > 0) {
                    $last_booking_date = mysqli_fetch_assoc($booking_result)['booking_for_date'];
                    if (empty($last_booking_date)) {
                        $last_booking_date = "NA";
                    }
                } else {
                    $last_booking_date = "NA";

                }
            }

            // Start the output buffer.
            ob_start();


            // Set PHP headers for CSV output.

            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=' . $user_original_number . '.csv');

            // Create the headers.
            $header_args = array('Name', 'Mobile No', 'Joining Date', 'Last Booking Date');

            // Prepare the content to write it to CSV file.

            $data = array();
            $user_data = array();
            array_push($user_data, $user_name);
            array_push($user_data, $user_original_number);
            array_push($user_data, $joined_on);
            array_push($user_data, $last_booking_date);

            array_push($data, $user_data);



            // Clean up output buffer before writing anything to CSV file.
            ob_end_clean();

            // Create a file pointer with PHP.
            $output = fopen('php://output', 'w');

            // Write headers to CSV file.
            fputcsv($output, $header_args);

            // Loop through the prepared data to output it to CSV file.
            foreach ($data as $data_item) {
                fputcsv($output, $data_item);
            }

            // Close the file pointer with PHP with the updated output.
            fclose($output);
            exit;
        }
    }

}