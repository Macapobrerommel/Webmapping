<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbfinal_map";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Set the content type to application/json
header('Content-Type: application/json');

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit;
}

$sql = "SELECT id, property_key, property_value, additional_column1, additional_column2 FROM geojson_properties";
$result = $conn->query($sql);

$properties = array();
if ($result) {
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Sanitize data before adding to the array
            $sanitized_row = array_map('htmlspecialchars', $row);
            $properties[] = $sanitized_row;
        }
        echo json_encode($properties, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(["error" => "0 results"]);
    }
} else {
    echo json_encode(["error" => "Error: " . $conn->error]);
}

$conn->close();
?>
