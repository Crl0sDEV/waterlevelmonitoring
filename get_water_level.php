<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include ('connection.php');

// Fetch the latest water level data
$sql = "SELECT water_level, last_updated FROM water_level_data ORDER BY last_updated DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'water_level' => $row['water_level'],
        'last_updated' => $row['last_updated']
    ]);
} else {
    echo json_encode(['error' => 'No data found']);
}

$conn->close();
?>