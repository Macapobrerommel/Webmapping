<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: log_script.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role']; // Retrieve the user role from the session
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/font-awesome-4.7.0/css/font-awesome.css" />
    <script type="text/javascript"  src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="js\leaflet-search-master\dist\leaflet-search.src.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
 <link
 rel="stylesheet"
 href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"
/>
<script src="js\leaflet-search-master\dist\leaflet-search.src.js"></script>
<script src="js/main.js"></script>
<link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
<script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="dist/leaflet-measure.css" />
<link rel="stylesheet" href="dist/L.Control.MousePosition.css">
<script src="https://unpkg.com/leaflet-label/dist/leaflet.label.js"></script>
<link rel="stylesheet" href="style.css">

<link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  
   <script src="js/try_3map_1copy.js"></script>
   <script src="js/echarts.js"></script>
    <script src="js/FINAL_MAP02.js"></script>
    <script src="js\final_map01.js"></script>
    <title>Document</title>
</head>
<body>

        <div id="base"></div>

        <div class="dropdown">
          <form action="/action_page.php" class="form-container">
          <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
              <div id="main" style="width: 400px; height: 320px"></div>
          </form>
        <div id="table"></div>
        </div>
       
</div>
    </div>
    
    <div id="button-container">
    <?php if ($role === 'admin'): ?>
        <input type="text" id="propertyKey" placeholder="Property Key" >
          <input type="text" id="propertyValue" placeholder="Property Value to Delete">
            <button id="deleteProperty">Delete Property</button>
              <button id="fetchPropertiesFromDb">Insert Properties from Database</button>
             <script>
            // Event listener for the "Delete Property" button
            document.getElementById('deleteProperty').addEventListener('click', () => {
                        const propertyKey = document.getElementById('propertyKey').value.trim();
                        const propertyValue = document.getElementById('propertyValue').value.trim();
                          if (propertyKey && propertyValue) {
                            deleteProperty(propertyKey, propertyValue);
                            } else {
                              alert('Please enter both property key and value to delete.');
                          }
                        });
                        //updateGeoJsonLayer(geoJsonData);
                        // Event listener for fetching properties from the database
        document.getElementById('fetchPropertiesFromDb').addEventListener('click', () => {
            fetch('fetch_properties.php')
                .then(response => response.json()) // Assuming fetchProperties.php returns JSON data
                .then(data => {
                    console.log('Fetched properties from database:', data);
                    appendProperties(data);
                })
                .catch(error => {
                    console.error('Error fetching properties from database:', error);
                });
        });
             </script>
        <?php endif; ?>
    </div>

    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Poverty Mapping System</span>
      </div>

      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">DSWD Imus</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
          <li class="list">
              <a href="index.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Poverty Map</span>
              </a>
            </li>
            <li class="list">
              <a href="sample/about.php" class="nav-link">
                <i class="bx bx-bar-chart-alt-2 icon"></i>
                <span class="link">Poverty Information</span>
              </a>
            </li>
            <li class="list">
              <a href="sample/about1.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">Population</span>
              </a>
            </li>
            <li class="list">
              <a href="sample/educ.php" class="nav-link">
                <i class="bx bx-pie-chart-alt-2 icon"></i>
                <span class="link">About Education</span>
              </a>
            </li>
          </ul>

          <div class="bottom-cotent">
            <li class="list">
              <a href="login.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>

    
    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });


      
    </script>

   
   



    <script>
      var map = L.map("base", {
            center: [14.4064, 120.9405],
            measureControl: true,
            minZoom: 13,
            maxZoom: 19,
            zoom: 8,
            });

            //basemap definition
      
      var osm = L.tileLayer("http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png", {
          attribution:
            '&copy; <a href="http://osm.org/copyright" title="OpenStreetMap" target="_blank">OpenStreetMap</a> contributors | <a href="http://cartodb.com/attributions" title="CartoDB" target="_blank">CartoDB</a>',
                subdomains: ["a", "b", "c", "d", "e", "f"],
      }).addTo(map);


      function getColor(d) {
              if (d <= 300) {
                return "#ccffbb";
              } else if (d <= 600) {
                return "#18cd02";
              } else if (d <= 900) {
                return "#00ad00";
              } else if (d <= 1200) {
                return "#51a2ff";
              } else if (d <= 1500) {
                return "#0e6b56";
              } else if (d <= 1800) {
                return "#a0d5f5";
              } else if (d <= 2100) {
                return "#844e0e";
              } else if (d <= 2400) {
                return "#31a9b8";
              } else if (d <= 2700) {
                return "#ffff00";
              } else if (d <= 3000) {
                return "#bf360c";
              } else if (d <= 3300) {
                return "#f6d945";
              } else if (d <= 3600) {
                return "#004040";
              } else if (d <= 3900) {
                return "#1ea69a";
              } else if (d <= 4200) {
                return "#7a5f5f";
              } else if (d <= 4500) {
                return "#7d0552";
              } else {
                return "#000000";
              }
        }
          function getColor2(d) {
            return d > 10000 ? '#800026' :
                  d > 5000  ? '#FF5733' :
                  d > 2000  ? '#FFC300' :
                  d > 1000  ? '#6EE7B7' :
                  d > 500   ? '#A3CBFF' :
                  d > 200   ? '#FFB6C1' :
                  d > 100   ? '#FFA07A' :
                              '#B19CD9';
        }
        function getColor3(d) {
            return d > 10000 ? '#002693' :
                  d > 8000  ? '#0039C6' :
                  d > 5000  ? '#004CFF' :
                  d > 2000  ? '#1F66FF' :
                  d > 1000  ? '#4D85FF' :
                  d > 500   ? '#7BA4FF' :
                  d > 200   ? '#A8C4FF' :
                  d > 100   ? '#D6E4FF' :
                              '#FFFFF0';
        }
        function getColor4(d) {
            return d > 10000 ? '#8B0000' :
                  d > 5000  ? '#B22222' :
                  d > 2000  ? '#DC143C' :
                  d > 1000  ? '#FF4500' :
                  d > 500   ? '#FF6347' :
                  d > 200   ? '#FF7F50' :
                  d > 100   ? '#FFA07A' :
                              '#FFE5B4';
        }
        function getColor5(d) {
            return d > 10000 ? '#191970' :
                  d > 5000  ? '#4169E1' :
                  d > 2000  ? '#1E90FF' :
                  d > 1000  ? '#00BFFF' :
                  d > 500   ? '#4682B4' :
                  d > 200   ? '#87CEEB' :
                  d > 100   ? '#B0E0E6' :
                              '#E0FFFF';
        }
        function getColor6(d) {
            return d > 10000 ? '#D2691E' :
                  d > 5000  ? '#8B4513' :
                  d > 2000  ? '#A0522D' :
                  d > 1000  ? '#CD853F' :
                  d > 500   ? '#B8860B' :
                  d > 200   ? '#DAA520' :
                  d > 100   ? '#F5DEB3' :
                              '#FAF0E6';
        }
        function getColor7(d) {
            return d > 10000 ? '#483D8B' :
                  d > 5000  ? '#4B0082' :
                  d > 2000  ? '#800080' :
                  d > 1000  ? '#BA55D3' :
                  d > 500   ? '#DA70D6' :
                  d > 200   ? '#DDA0DD' :
                  d > 100   ? '#D8BFD8' :
                              '#FFF0F5';
        }
        function getColor8(d) {
            return d > 10000 ? '#800000' :
                  d > 5000  ? '#A52A2A' :
                  d > 2000  ? '#CD5C5C' :
                  d > 1000  ? '#BC8F8F' :
                  d > 500   ? '#D2B48C' :
                  d > 200   ? '#DEB887' :
                  d > 100   ? '#FAEBD7' :
                              '#FFF5EE';
        }
        function style1(feature) {
            return {
              fillColor: getColor2(feature.properties.Population15),
              weight: 1,
              opacity: 1,
              color: "orange",
              dashArray: "2",
              fillOpacity: 0.8,
            };
          }
        function style2(feature) {
            return {
              fillColor: getColor(feature.properties.population_00),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
                        
            };
          }
        
          function style3(feature) {
            return {
              fillColor: getColor3(feature.properties.numberrange),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
            };
          }
          function style4(feature) {
            return {
              fillColor: getColor4(feature.properties.Population15),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
            };
          }
          function style5(feature) {
            return {
              fillColor: getColor5(feature.properties.Population15),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
            };
          }
          function style6(feature) {
            return {
              fillColor: getColor6(feature.properties.Population15),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
            };
          }
          function style7(feature) {
            return {
              fillColor: getColor7(feature.properties.Population15),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
            };
          }
          function style8(feature) {
            return {
              fillColor: getColor8(feature.properties.Population15),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
            };
          }
        function style(feature) {
            return {
              fillColor: getColor3(feature.properties.property_key),
                weight: 1,
                  opacity: 1,
                    color: "orange",
                      dashArray: "2",
                        fillOpacity: 0.8,
            };
          }


              const searchLayer = L.geoJSON( final_map01,{
        onEachFeature: function (feature, layer) {
            if (feature.properties.Point) {
                layer.bindPopup(feature.properties.Barangay);
                layer.setOpacity(5); // Initially hide the marker
            } else {
                layer.bindPopup(feature.properties.Barangay);
            }
        }
      }).addTo(map);
      
      
      const searchControl2 = new L.Control.Search({
        layer: searchLayer,
        propertyName: 'Barangay', // Note the lowercase 'p' in propertyName
        textPlaceholder: 'Search For Barangay...',
        zoom: 30
      });
      
        searchControl2.on('search:locationfound', function (e) {
          if (e.layer.feature.properties.marker) {
              e.layer.setOpacity(1); // Show the marker
              e.layer.openPopup(0);
        
              // Hide the marker again after 10 seconds
              setTimeout(() => {
                  e.layer.setOpacity(0);
                  e.layer.closePopup();
              }, 10000); // 10000 milliseconds = 10 seconds
          }
        });
  
        map.addControl(searchControl2);
  



        //L.geoJSON(final_map01, {
       // onEachFeature: function(feature, layer) {
    // Create a marker with a label for each feature
    //var label = L.marker(layer.getBounds().getCenter(), {
      //icon: L.divIcon({
        //className: 'label',
        //html: feature.properties.Barangay,
        //iconSize: [100, 40],
        //iconAnchor: [50, 40]  // Adjust the iconAnchor to center the label correctly
      //})
    //});
    
    // Adjust label positioning to prevent overlap
    //label.addTo(map); // Add the label to the map
  //}
//});








       // Function to validate uploaded data
       function validateUploadedData(data) {
            const requiredHeaders = ['id', 'Barangay','Population_2000', 'Population_2010', 'Population_2015', 'Population_2020'];
            return requiredHeaders.every(header => data[0].hasOwnProperty(header));
        }

        // Function to parse CSV data
        function parseCSV(csv) {
            const lines = csv.split('\n');
            const headers = lines[0].split(',');
            return lines.slice(1).map(line => {
                const values = line.split(',');
                return headers.reduce((acc, header, index) => {
                    acc[header] = values[index];
                    return acc;
                }, {});
            });
        }
     
    

        let geoJsonLayer;
        let geoJsonData = loadGeoJsonData() || final_map01; // Load data from local storage or use initial data
        let originalGeoJsonData = JSON.parse(JSON.stringify(final_map01)); // Store original GeoJSON data

        function updateGraph(data) {
              console.log("Updating graph with data:", data); // Log the entire data object
              var myChart = echarts.init(document.getElementById('main'));
              var years = ['2000', '2010', '2015', '2020'];
              
              var seriesData = years.map(year => {
                  var key = 'Population_' + year;
                  var value = data[key];
                  console.log(`${key}:`, value); // Log each year's value
                  return value !== undefined ? value : 0; // Fallback to 0 if the value is undefined
              });

              console.log("Series data:", seriesData); // Log the series data array

              var option = {
                  title: {
                      text: 'Population Data: ' + data.Barangay,
                      subtext: 'Source: PSA',
                      left: 'center'
                  },
                  tooltip: {
                      trigger: 'axis'
                  },
                  xAxis: {
                      type: 'category',
                      data: years
                  },
                  yAxis: {
                      type: 'value'
                  },
                  series: [{
                      data: seriesData,
                      type: 'line',
                      smooth: true, // Optional: for smooth lines
                      label: {
                          show: true,
                          position: 'top'
                      }
                  }],
                  emphasis: {
                      itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                      }
                  }
              };

              myChart.setOption(option);
          }

          async function fetchAdditionalData() {
    try {
        const response = await fetch('Pop.php');
        const data = await response.json();
        console.log('Fetched additional data:', data);
        return data;
    } catch (error) {
        console.error('Error fetching additional data:', error);
    }
}

function mergeDataWithGeoJson(geoJsonData, additionalData) {
    additionalData.forEach(item => {
        const feature = geoJsonData.features.find(feature => feature.properties.id === item.id);
        if (feature) {
            Object.entries(item).forEach(([key, value]) => {
                feature.properties[key] = value;
            });
        }
    });
}



        // Function to fetch data based on ID (example)
        async function fetchDataById(id) {
            // Example API URL (replace with your actual API endpoint)
            const apiUrl = `Pop.php`;

            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                // Check if the data contains necessary properties
                if (data.Barangay && data.Population_2000 && data.Population_2010 && data.Population_2015 && data.Population_2020) {
                    updateGraph(data);
                } else {
                    console.error('Data does not contain necessary properties');
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        async function updateGeoJsonLayer(data) {
    if (typeof geoJsonLayer !== 'undefined') {
        map.removeLayer(geoJsonLayer);
    }

    geoJsonLayer = L.geoJSON(data, {
        style: style3,
        onEachFeature: function (feature, layer) {
            if (feature.properties) {
                const popupContent = Object.entries(feature.properties)
                    .map(([key, value]) => `<b>${key}:</b> ${value}`)
                    .join('<br>');
                layer.bindPopup(popupContent);


                feature.properties.center = layer.getBounds().getCenter();

                layer.on("click", async function (e) {
                    var layer = e.target;
                    var barangayName = layer.feature.properties.Barangay;
                    console.log("Barangay on click:", barangayName); // Log the Barangay name on click

                    // Fetch additional data
                    const additionalData = await fetchAdditionalData();
                    const matchedData = additionalData.find(item => item.Barangay === barangayName);

                    if (matchedData) {
                        updateGraph(matchedData);
                    } else {
                        console.error('No additional data found for this Barangay');
                    }
                });
            }
        }
    }).addTo(map);
}

        // Add GeoJSON layer to the map
        updateGeoJsonLayer(geoJsonData);
      
     // Function to fetch data based on ID
     async function fetchDataById(id) {
            // Example API URL (replace with your actual API endpoint)
            const apiUrl = `Pop.php`;

            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                // Check if the data contains necessary properties
                if (data.Barangay && data.Population_2000 && data.Population_2010 && data.Population_2015 && data.Population_2020) {
                    updateGraph(data);
                } else {
                    console.error('Data does not contain necessary properties');
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        

        // Function to load GeoJSON data from local storage
      function loadGeoJsonData() {
            const data = localStorage.getItem('geoJsonData');
            return data ? JSON.parse(data) : null;
        }

        // Function to save GeoJSON data to local storage
      function saveGeoJsonData(data) {
            localStorage.setItem('geoJsonData', JSON.stringify(data));
        }


        // Function to delete a specific property value from GeoJSON features
        function deleteProperty(propertyKey, propertyValue) {
            geoJsonData.features.forEach(feature => {
                if (feature.properties[propertyKey] == propertyValue) {
                    console.log(`Deleting property value ${propertyValue} from property key ${propertyKey} in feature ID: ${feature.properties.id}`);
                    delete feature.properties[propertyKey];
                }
            });
            updateGeoJsonLayer(geoJsonData);
            saveGeoJsonData(geoJsonData); // Save updated data to local storage
        }
        

    // Function to append properties to GeoJSON features
    function appendProperties(propertiesData) {
            console.log('Appending properties:', propertiesData);

            propertiesData.forEach(item => {
                const featureId = item.id;
                const feature = geoJsonData.features.find(feature => feature.properties.id === featureId);
                if (feature) {
                    console.log(`Appending to feature with ID: ${featureId}`);
                    Object.entries(item).forEach(([key, value]) => {
                        console.log(`Appending property - Key: ${key}, Value: ${value}`);
                        feature.properties[key] = value;
                    });
                } else {
                    console.log(`No feature found with ID: ${featureId}`);
                }
            });

            updateGeoJsonLayer(geoJsonData);
        }
        async function fetchDataAndUpdateGeoJson() {
            try {
                const response = await fetch('poverty_rate.php');
                const data = await response.json();
                console.log('Fetched Data:', data);
                console.log('GeoJSON Data Before Update:', geoJsonData);
                appendProperties(data);
                console.log('GeoJSON Data After Update:', geoJsonData);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        // Example usage of fetchDataAndUpdateGeoJson
        fetchDataAndUpdateGeoJson();
        

        // Event listener for fetching properties from Pop.php
        function fetchPropertiesFromPop() {
            fetch('Pop.php')
                .then(response => response.json()) // Assuming Pop.php returns JSON data
                .then(data => {
                    console.log('Fetched properties from Pop.php:', data);
                    appendProperties(data);
                })
                .catch(error => {
                    console.error('Error fetching properties from Pop.php:', error);
                });
              }

            
        // Example usage of fetchDataAndUpdateGeoJson
        fetchDataAndUpdateGeoJson();
          
        function fetchData() {
          // Make an AJAX request to fetch data from the PHP script
            fetch('Pop.php')
                .then(response => response.json())
                .then(data => {
                    // Process the fetched data as needed
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }




// Example usage:
// First fetch and append data


// Later fetch and append new data

        // Interval in milliseconds (e.g., 1 hour)
        const interval = 3600000;
          // Call the fetchData function initially
          fetchData();
            // Set interval to call the fetchData function repeatedly
            setInterval(fetchData, interval);
            // Initialize the map with the GeoJSON data
                updateGeoJsonLayer(geoJsonData);


                var legend = L.control({position: 'bottomleft'});

        legend.onAdd = function (map) {

            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 100, 200, 500, 1000, 2000, 5000, 8000, 10000],
                labels = ['0', '100', '200', '500', '1000', '2000', '5000', '8000', '10000'],
                textLabels = ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5', 'Label 6', 'Label 7', 'Label 8'];

            // loop through our density intervals and generate a label with a colored square for each interval
            for (var i = 0; i < grades.length; i++) {
                var color = getColor3(grades[i] + 1);
                var label = '<strong>' + labels[i] + '</strong> ' + (grades[i + 1] ? '&ndash;' + grades[i + 1] + ' ' : '+') + textLabels[i];

                div.innerHTML +=
                    '<i style="background:' + color + '"></i> ' +
                    label + '<br>';
            }

            return div;
        };

        legend.addTo(map);


   
          function getColorsFunctionFor2010() {
            return ["#FFEDA0", "#FED976", "#FEB24C", "#FD8D3C", "#FC4E2A", "#E31A1C", "#BD0026", "#800026"];
        }

        function getColorsFunctionFor2015() {
            return ["#E6F5B0", "#D9F0A3", "#ADDDA1", "#78C679", "#41AB5D", "#238443", "#006837", "#004529"];
        }

        function getColorsFunctionFor2020() {
            return ["#F1EEF6", "#D7B5D8", "#DF65B0", "#DD1C77", "#980043", "#67001F"];
        }

        function getColorsFunctionFor2025() {
            return ["#FEE0D2", "#FC9272", "#FB6A4A", "#EF3B2C", "#CB181D", "#A50F15", "#67000D"];
        }

        function getColorsFunctionFor2030() {
            return ["#F7FCFD", "#E5F5F9", "#CCECE6", "#99D8C9", "#66C2A4", "#41AE76", "#238B45", "#005824"];
        }

        function getColorsFunctionFor2035() {
            return ["#FFFFCC", "#C2E699", "#78C679", "#31A354", "#006837"];
        }

        function getColorsFunctionFor2040() {
            return ["#FFFFD4", "#FED98E", "#FE9929", "#D95F0E", "#993404"];
        }

        var getColorsFunctions = {
            "Population 2010": getColorsFunctionFor2010,
            "Population 2015": getColorsFunctionFor2015,
            "Population 2020": getColorsFunctionFor2020,
            "Population 2025": getColorsFunctionFor2025,
            "Population 2030": getColorsFunctionFor2030,
            "Population 2035": getColorsFunctionFor2035,
            "Population 2040": getColorsFunctionFor2040
        };

        // Define the legend control
        var legend = L.control({ position: 'bottomright' });

        legend.onAdd = function (map) {
            var div = L.DomUtil.create('div', 'info legend');
             // Initial placeholder content
            return div;
        };

        legend.addTo(map);

        // Function to generate legend content
        function createLegendContent(grades, colors) {
            var legendContent = '';
            for (var i = 0; i < grades.length; i++) {
                legendContent += '<i style="background:' + colors[i] + '"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
            }
            return legendContent;
        }

        // Function to update legend content and colors
        function updateLegend(grades, colors) {
            var legendContent = createLegendContent(grades, colors);
            var legendDiv = document.querySelector('.info.legend');
            if (legendDiv) {
                legendDiv.innerHTML = legendContent;
                console.log('Legend updated:', legendContent); // Debugging statement
            } else {
                console.error('Legend div not found');
            }
        }

        // Helper function to get key from value in object
        function getKeyByValue(object, value) {
            return Object.keys(object).find(key => object[key] === value);
        }

        // Example layers (replace with actual layers)
        

        var pos2 = L.geoJson(try_3map_1, {
            style: style2,
            
        });

        var pos3 = L.geoJson(try_3map_1, {
            style: style3,
            
        });

        var pos4 = L.geoJson(try_3map_1, {
            style: style4,
            
        });

        var pos5 = L.geoJson(try_3map_1, {
            style: style5,
            
        });

        var pos6 = L.geoJson(try_3map_1, {
            style: style6,
            
        });

        var pos7 = L.geoJson(try_3map_1, {
            style: style7,
            
        });

        var pos8 = L.geoJson(try_3map_1, {
            style: style8,
            
        });

        // Define overlay layers
        var overlayLayers = {
            "Population 2010": pos2,
            "Population 2015": pos3,
            "Population 2020": pos4,
            "Population 2025": pos5,
            "Population 2030": pos6,
            "Population 2035": pos7,
            "Population 2040": pos8
        };

        // Define base layers
        var baselayers = {
            "Population 2000": geoJsonLayer,
         
        };

        // Add base layers and overlay layers control
        L.control.layers(baselayers, overlayLayers).addTo(map);

        // Event listener for overlay add
        function legendAdd(event) {
            var layer = event.layer;
            var layerName = getKeyByValue(overlayLayers, layer);
            if (!layerName) {
                console.error('Layer name not found for the added layer:', layer);
                return;
            }

            var getColorsFunction = getColorsFunctions[layerName];
            if (getColorsFunction) {
                var colors = getColorsFunction();
                if (colors && colors.length >= 8) {
                    updateLegend([0, 100, 200, 500, 1000, 2000, 5000, 10000], colors);
                } else {
                    console.error('Not enough colors provided by getColorsFunction for ' + layerName);
                }
            } else {
                console.error('getColorsFunction not found for ' + layerName);
            }
        }

        // Event listener for overlay remove
        function legendRemove(event) {
            var layer = event.layer;
            var layerName = getKeyByValue(overlayLayers, layer);
            if (layerName) {
                document.querySelector('.info.legend').innerHTML = '';
                console.log('Legend cleared for layer:', layerName); // Debugging statement
            }
        }

        map.on('overlayadd', legendAdd);
        map.on('overlayremove', legendRemove);

              

// Function to add labels
function addLabels() {
  geoJsonLayer.eachLayer(function(layer) {
    var feature = layer.feature;
    var center = feature.properties.center;

    // Create label and add to map
    var label = L.marker(center, {
      icon: L.divIcon({
        className: 'label',
        html: feature.properties.Barangay,
        iconSize: [200, 80],
        iconAnchor: [30, 10] // Adjust as needed
      })
    });
    label.addTo(map);
  });
}

// Function to remove labels
function removeLabels() {
  map.eachLayer(function(layer) {
    if (layer.options.icon && layer.options.icon.options.className === 'label') {
      map.removeLayer(layer);
    }
  });
}

// Add/remove labels based on zoom level
map.on('zoomend', function() {
  var zoomLevel = map.getZoom();
  
  if (zoomLevel >= 15) {
    addLabels();
  } else {
    removeLabels();
  }
});

// Initial label display based on initial zoom level
if (map.getZoom() >= 15) {
  addLabels();
}


function generatePopupContent(feature) {
            const properties = feature.properties;
            const nonEditableProperty = 'numberrange';
            let popupContent = '<div>';
            for (const key in properties) {
                popupContent += `<div>
                    <b><span id="header-${feature.IdCenter}-${key}">${key}</span>:</b> <span id="property-${feature.IdCenter}-${key}">${properties[key]}</span>
                    ${key !== nonEditableProperty ? `<button class="edit-header-btn" data-key="${key}" data-id="${feature.IdCenter}">Edit Header</button>` : ''}
                </div>`;
            }
            popupContent += '</div>';
            return popupContent;
        }

        function handleHeaderEditing(key, id) {
            const headerElement = document.getElementById(`header-${id}-${key}`);
            const currentHeader = headerElement.textContent;
            const inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.value = currentHeader;
            headerElement.replaceWith(inputElement);
            inputElement.focus();

            inputElement.addEventListener('blur', function () {
                const newHeader = inputElement.value;
                inputElement.replaceWith(headerElement);
                headerElement.textContent = newHeader;

                const feature = geoJsonData.features.find(feature => feature.properties.IdCenter == id);
                if (feature) {
                    const oldValue = feature.properties[key];
                    delete feature.properties[key];
                    feature.properties[newHeader] = oldValue;
                    saveGeoJsonData(geoJsonData);

                    // Refresh the map layer with the updated geoJsonData
                    updateGeoJsonLayer(geoJsonData);

                    $.ajax({
                        url: 'editing_db.php',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id: id,
                            oldKey: key,
                            newKey: newHeader,
                            oldValue: oldValue,
                            newValue: oldValue
                        }),
                        success: function(response) {
                            console.log('Update successful:', response);
                        },
                        error: function(error) {
                            console.error('Error updating the database:', error);
                        }
                    });
                }
            });
        }
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('edit-header-btn')) {
                const key = event.target.getAttribute('data-key');
                const id = event.target.getAttribute('data-id');
                handleHeaderEditing(key, id);
            }
        });

        function loadGeoJsonData() {
            const data = localStorage.getItem('geoJsonData');
            return data ? JSON.parse(data) : null;
        }

        function saveGeoJsonData(data) {
            localStorage.setItem('geoJsonData', JSON.stringify(data));
        }



            
    </script>
</body>
<script src="js/echarts.js"></script>


</html>