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

$images = [
    'People/download.jpg',
    'People/bangladesh-rangpur-june-24-2022-260nw-2279474879.jpg',
    'People/e7e74d1a25c3c95ea648f5b01a2d66e8.jpg',
    'People/scan0005 - Copy.jpg',
    'People/bb88d27dc9a113b5aacdada3297e3af1.jpg',
    'People/99547160965b8b7edef2cb81632ed2a9.jpg',
    'People/6b66ad421e92fddce0e755814a1b9215.jpg',
    'People/portrait-of-a-young-man-with-a-serious-expression-photo.jpg',
    'People/bangladeshi-people-portrait-in-dhaka-bangladesh-2NXJAY4.jpg',
    'People/hardworking-newspaper-seller-bangladesh-2AA6XGR.jpg'
];

foreach ($tables as $table => $image_column) {
    // Get all records from the table
    $query = "SELECT id FROM $table";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Randomly select an image
            $random_image = $images[array_rand($images)];
            
            // Update the image for this record using the correct column name
            $update_query = "UPDATE $table SET $image_column = '$random_image' WHERE id = {$row['id']}";
            mysqli_query($conn, $update_query);
        }
        echo "Updated images for $table<br>";
    } else {
        echo "Error updating $table: " . mysqli_error($conn) . "<br>";
    }
}

echo "All profile images have been updated successfully!";
?> 