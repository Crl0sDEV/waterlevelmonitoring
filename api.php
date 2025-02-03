<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if the JSON payload contains the required field
if (!isset($data['water_level'])) {
    http_response_code(400);
    echo json_encode(array("message" => "Missing 'water_level' in JSON payload."));
    exit;
}

$waterLevel = $data['water_level'];

// Supabase configuration
$supabaseUrl = "https://efirubankmowqztlyuuh.supabase.co/rest/v1/water_levels"; // Replace with your Supabase table URL
$apiKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImVmaXJ1YmFua21vd3F6dGx5dXVoIiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzgzMDc5NjAsImV4cCI6MjA1Mzg4Mzk2MH0.JmTTNz5AESMKQIwQl9t0qfU33EMLc5Z2-WePRGtaCog"; // Replace with your Supabase API key

// Prepare the data to be sent to Supabase
$data = array(
    "water_level" => $waterLevel
);

// Initialize cURL session
$ch = curl_init($supabaseUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "apikey: " . $apiKey,
    "Authorization: Bearer " . $apiKey,
    "Content-Type: application/json",
    "Prefer: return=minimal"
));

// Execute the request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(array("message" => "Error sending data to Supabase: " . curl_error($ch)));
    curl_close($ch);
    exit;
}

// Close cURL session
curl_close($ch);

// Return success response
http_response_code(200);
echo json_encode(array("message" => "Data successfully sent to Supabase"));
?>