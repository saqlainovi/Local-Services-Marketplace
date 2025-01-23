<?php
include('includes/db_connect.php');

$tables = [
    'painters' => 'image',
    'electricians' => 'profile_image',
    'plumbers' => 'image',
    'car_mechanics' => 'image',
    'locksmiths' => 'image',
    'battery_services' => 'image',
    'packers_movers' => 'image',
    'tv_repair' => 'profile_image'
];

foreach ($tables as $table => $image_column) {
    // Get all records from the table
    $query = "SELECT id, $image_column FROM $table";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $current_image = $row[$image_column];
            
            // If the image path starts with 'People/', update it to include the full relative path
            if (strpos($current_image, 'People/') === 0) {
                $new_image = '../' . $current_image;
                
                // Update the image path in the database
                $update_query = "UPDATE $table SET $image_column = '$new_image' WHERE id = {$row['id']}";
                mysqli_query($conn, $update_query);
            }
        }
        echo "Updated image paths for $table<br>";
    } else {
        echo "Error updating $table: " . mysqli_error($conn) . "<br>";
    }
}

echo "All image paths have been updated successfully!";
?> 