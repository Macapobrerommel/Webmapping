document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('populationChart').getContext('2d');
  
    var barangays = [
      "Magdalo", "Maharlika", "Malagasang I-A", "Malagasang I-B",
      "Malagasang I-C", "Malagasang I-D", "Malagasang I-E", "Malagasang I-F",
      "Malagasang I-G", "Malagasang II-A", "Malagasang II-B", "Malagasang II-C",
      "Malagasang II-D", "Malagasang II-E", "Malagasang II-F", "Malagasang II-G",
      "Mariano Espeleta I", "Mariano Espeleta II", "Mariano Espeleta III",
      "Mariano Espeleta IV", "Mariano Espeleta V",
      "Tanzang Luma I", "Tanzang Luma II", "Tanzang Luma III", "Tanzang Luma IV (Southern City)",
      "Tanzang Luma V", "Tanzang Luma VI", "Toclong I-A", "Toclong I-B",
      "Toclong I-C", "Toclong II-A", "Toclong II-B"
    ];
  
    var populations_2000 = [6027, 2816, 1149, 1401, 1422, 1814, 1552, 1096, 536, 2714, 2235, 1675, 1538, 1085, 1196, 747, 877, 1513, 1367, 1349, 1200,
      717, 2084, 1590, 2397, 1605, 1507, 1231, 1423, 1411, 1059, 1316];
    var populations_2010 = [9488, 3398, 2963, 3443, 1949, 2009, 2274, 2971, 3191, 9581, 10072, 2232, 2177, 1207, 1068, 2492, 1349, 1335, 2043, 1500, 1300,
      815, 1326, 1717, 2518, 1769, 2359, 1142, 1545, 1106, 873, 2246];
    var populations_2015 = [4195, 3941, 3091, 4986, 2299, 2129, 2255, 8483, 12629, 13780, 18028, 4716, 3771, 1715, 1551, 4301, 1613, 1364, 2206, 1600, 1400,
      1103, 1653, 1859, 2303, 2287, 2269, 1240, 1575, 1763, 1049, 2476];
    var populations_2020 = [4479, 5786, 5766, 6113, 4457, 4678, 1816, 10544, 25847, 16146, 17572, 6320, 3841, 2375, 1461, 4739, 1400, 1300, 1423, 1600, 1500,
      1490, 1413, 1993, 2344, 2173, 2169, 1189, 1730, 1569, 1244, 2387];
  
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
  