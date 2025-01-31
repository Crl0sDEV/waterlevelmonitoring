<?php
include('connection.php');

// Get the water_level from the Arduino (via GET or POST request)
if (isset($_GET['water_level'])) {
    $water_level = floatval($_GET['water_level']); // Ensure it's a float
} else {
    die("Error: No water_level data received.");
}

// Determine status and action required based on water_level
if ($water_level > 3.0) {
    $status = "Critical";
    $action_required = "Evacuate immediately";
} elseif ($water_level >= 2.0 && $water_level <= 3.0) {
    $status = "High";
    $action_required = "Prepare for possible evacuation";
} else {
    $status = "Moderate";
    $action_required = "Monitor closely";
}

// Insert data into the table
$last_updated = date('Y-m-d H:i:s'); // Current timestamp
$sql = "INSERT INTO water_level_data (water_level, last_updated, status, action_required)
        VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dsss", $water_level, $last_updated, $status, $action_required);

if ($stmt->execute()) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>