document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('populationChart').getContext('2d');
  
    var barangays = [
      "Alapan I-A", "Alapan I-B", "Alapan I-C", "Alapan II-A", "Alapan II-B",
      "Anabu I-A", "Anabu I-B", "Anabu I-C", "Anabu I-D", "Anabu I-E",
      "Anabu I-F", "Anabu I-G", "Anabu II-A", "Anabu II-B", "Anabu II-C",
      "Anabu II-D", "Anabu II-E", "Anabu II-F",
      "Bagong Silang (Bahayang Pag-Asa)", "Bayan Luma I", "Bayan Luma II",
      "Bayan Luma III", "Bayan Luma IV", "Bayan Luma V", "Bayan Luma VI",
      "Bayan Luma VII", "Bayan Luma VIII", "Bayan Luma IX", "Bucandala I",
      "Bucandala II", "Bucandala III", "Bucandala IV", "Bucandala V",
      "Buhay na Tubig", "Carsadang Bago I", "Carsadang Bago II"
    ];
  
    var populations_2000 = [3692, 5035, 2975, 860, 611, 4716, 1676, 4183, 973, 1321, 1686, 960, 1240, 4662, 2558, 1959, 2330, 8965,
      1385, 2289, 1437, 2781, 1775, 2590, 2009, 2960, 1846, 1538, 1257, 1659, 6157, 2454, 1950, 6287, 2265, 2394
    ];
    var populations_2010 = [12817, 6266, 5308, 2878, 1626, 5274, 1870, 4645, 2290, 1072, 1496, 1318, 1888, 6365, 4759, 1915, 3354, 7706,
      922, 3383, 1667, 4173, 2280, 3795, 2539, 2877, 2562, 2036, 3243, 1927, 10131, 2636, 3816, 23118, 2738, 11135
    ];
    var populations_2015 = [13639, 7352, 8422, 8805, 3061, 7206, 2338, 6062, 3425, 2641, 2432, 5092, 2991, 6656, 5390, 4440, 4623, 11112,
      960, 3731, 1770, 4726, 2976, 4884, 2738, 3580, 2500, 1977, 5602, 2191, 8456, 3372, 5153, 32513, 3350, 16835
    ];
    var populations_2020 = [14097, 8314, 12507, 14071, 4654, 6264, 2566, 7362, 3828, 2731, 2675, 2417, 3382, 7650, 6562, 5273, 5542, 9562,
      788, 4141, 1631, 3672, 2708, 4659, 2715, 4132, 2737, 2932, 9935, 2157, 8394, 5352, 5855, 39010, 17844, 27716
    ];
  
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: barangays,
        datasets: [
          {
            label: '2000',
            data: populations_2000,
            backgroundColor: 'rgba(54, 162, 235, 0.5)'
          },
          {
            label: '2010',
            data: populations_2010,
            backgroundColor: 'rgba(255, 206, 86, 0.5)'
          },
          {
            label: '2015',
            data: populations_2015,
            backgroundColor: 'rgba(75, 192, 192, 0.5)'
          },
          {
            label: '2020',
            data: populations_2020,
            backgroundColor: 'rgba(255, 99, 132, 0.5)'
          }
        ]
      },
      options: {
        scales: {
          x: {
            stacked: true,
            title: {
              display: true,
              text: 'Population'
            }
          },
          y: {
            stacked: true,
            title: {
              display: true,
              text: 'Barangay'
            }
          }
        }
      }
    });
  });
  