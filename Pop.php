<?php
    header('Content-Type: application/json');
    include("simple_html_dom.php");

    
    $html = file_get_html("https://www.citypopulation.de/en/philippines/imus/");

    $table = $html->find("table.data", 0);
    $data = [];
    $index = 1; // Start index from 1
    if ($table) {
        foreach ($table->find("tr") as $row) {
            $cells = $row->find("td");
            if (count($cells) > 4) {
                $barangay = trim($cells[0]->plaintext);
                $pop2000 = intval(str_replace(',','',$cells[2]->plaintext));
                $pop2010 = intval(str_replace(',','',$cells[3]->plaintext));
                $pop2015 = intval(str_replace(',','',$cells[4]->plaintext));
                $pop2020 = intval(str_replace(',','',$cells[5]->plaintext));
                
                $data[] = [
                    "id" => $index,
                    "Barangay" => $barangay,
                    "Population_2000" => $pop2000,
                    "Population_2010" => $pop2010,
                    "Population_2015" => $pop2015,
                    "Population_2020" => $pop2020,
                ];
                $index++; // Increment index for next entry
            }
        }
    }

    // Debug output
  
  
    echo json_encode($data);
    
?>
