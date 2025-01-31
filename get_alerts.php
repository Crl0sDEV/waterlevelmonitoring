<?php
header('Content-Type: application/json');

include('connection.php');

// Fetch the latest alerts
$sql = "SELECT id AS alert_id, last_updated, water_level, status, action_required 
        FROM water_level_data 
        ORDER BY last_updated DESC";
$result = $conn->query($sql);

$alerts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alerts[] = $row;
    }
}

echo json_encode($alerts);

$conn->close();
?>