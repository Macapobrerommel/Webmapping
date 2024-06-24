<?php
header('Content-Type: application/json');

$json_file = 'barangays_with_id.json';

if (file_exists($json_file)) {
    $json_data = file_get_contents($json_file);
    $data = json_decode($json_data, true);

    $filtered_data = array_map(function($item) {
        return [
            'id' => $item['id'],
            'Population_25' => $item['population_25'],
            'Population_30' => $item['population_30'],
            'Population_35' => $item['population_35']
        ];
    }, $data);

    echo json_encode($filtered_data);
} else {
    echo json_encode(['error' => 'File not found.']);
}
?>
