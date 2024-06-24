<?php
header('Content-Type: application/json');

$json_file = 'sample_data01.json';

if (file_exists($json_file)) {
    $json_data = file_get_contents($json_file);
    $data = json_decode($json_data, true);

    $filtered_data = array_map(function($item) {
        return [
            'id' => $item['id'],
            'numberrange' => $item['numberrange'],
            
        ];
    }, $data);

    echo json_encode($filtered_data);
} else {
    echo json_encode(['error' => 'File not found.']);
}
?>
