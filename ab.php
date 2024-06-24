<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imus Cavite</title>
    <link rel="stylesheet" href="styles.css">
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
</head>
<body>
    <div class="slider" id="slide">
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
                  <a href="index.html" class="nav-link">
                    <i class="bx bx-pie-chart-alt-2 icon"></i>
                    <span class="link">Poverty Map</span>
                  </a>
                </li>
                <li class="list">
                  <a href="dashboard/index.html" class="nav-link">
                    <i class="bx bx-bar-chart-alt-2 icon"></i>
                    <span class="link">Population 1</span>
                  </a>
                </li>
                <li class="list">
                  <a href="dashboard/next/index.html" class="nav-link">
                    <i class="bx bx-bar-chart-alt-2 icon"></i>
                    <span class="link">Population 2</span>
                  </a>
                </li>
                <li class="list">
                  <a href="ab.html" class="nav-link">
                    <i class="bx bx-bar-chart-alt-2 icon"></i>
                    <span class="link">About</span>
                  </a>
                </li>
                <li class="list">
                  <a href="example.pdf" download class="nav-link">
                      <i class="bx bx-download icon"></i>
                      <span class="link">Download File</span>
                  </a>
              </li>
              
              </ul>
        
              <div class="bottom-content">
                <li class="list">
                  <a href="login.html" class="nav-link">
                    <i class="bx bx-log-out icon"></i>
                    <span class="link">Logout</span>
                  </a>
                </li>
              </div>
            </div>
          </div>
        </nav>
        
        <section class="overlay"></section>

        <!-- Download file button -->
        <!-- <a href="path/to/your/file.pdf" download class="download-button">Download File</a> -->

    <div class="container">
        <div class="about">
            <div class="about-content">
                <h1>Imus Cavite</h1>
                <p>Imus, officially the City of Imus, is a 1st class component city and de jure capital of the province of Cavite, Philippines. According to the 2020 census, it has a population of 496,794 people.</p>
                <p>The first semester 2023 poverty incidence among population or the proportion of poor Filipinos whose per capita income is not sufficient to meet their basic food and non-food needs was estimated at 22.4 percent or 25.24 million Filipinos. On the average, a family of five members will need at least PhP13,797 per month to meet their minimum basic food and non-food needs in the first semester of 2023. On the other hand, subsistence incidence among Filipinos or the proportion of Filipinos whose income is not enough to buy even the basic food needs was registered at 8.7 percent or about 9.79 million Filipinos in the first semester of 2023. On the average, the monthly food threshold for a family of five in the same period was estimated at PhP 9,550. (Figure 1, and Tables 2, 4, 6, and 8)</p>
                <p>Among families, the First Semester 2023 poverty incidence was estimated at 16.4 percent, which was equivalent to 4.51 million poor families. Meanwhile, the subsistence incidence among families was recorded at 5.9 percent or about 1.62 million food poor families in the first semester of 2023. (Tables 1, 3, 5, and 7)</p>
              
            </div>
            <div class="chart-container">
                <div class="chart-title">Poverty and Subsistence Incidence Among Population, Philippines: First Semester 2021 and 2023</div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="additional-info">
            <p>Subsistence Incidence is the proportion of families/individuals with per capita income/expenditure less than the per capita food threshold to the total number of families/individuals.</p>
            <p>Poverty incidence is the number of individuals with income below the per capita poverty thresholds divided by the total number of individuals.</p>
        </div>
        <p class="source">Source: PSA</p>
        <div class="stats">
            <div class="stat">
                <h2 data-target="539743">0</h2>
                <p>Population</p>
            </div>
            <div class="stat">
                <h2 data-target="130814">0</h2>
                <p>Estimated number of households</p>
            </div>
            <div class="stat">
                <h2 data-target="97">0</h2>
                <p>Barangay</p>
            </div>
            <div class="stat">
                <h2 data-target="4.24">0</h2>
                <p>Population growth (%)</p>
            </div>
        </div>
        <div class="attachments">
            <table>
                <thead>
                    <tr>
                        <th>Attachment</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="psa/press_release.pdf.pdf" download>Press Release of the 2023 1st sem Official Poverty Statistics</a></td>
                        <td>238.49 KB</td>
                    </tr>
                    <tr>
                        <td><a href="psa/statistical_tables.xlsx.xlsx" download>Statistical Tables</a></td>
                        <td>9.56 MB</td>
                    </tr>
                    <tr>
                        <td><a href="psa/highlights.pdf.pdf" download>Highlights of the 2023 1st sem Official Poverty Statistics</a></td>
                        <td>503.63 KB</td>
                    </tr>
                    <tr>
                        <td><a href="psa/report.pdf.pdf" download>2023 1st Sem Official Poverty Statistics Report.pdf</a></td>
                        <td>4.35 MB</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="source">Source: PSA</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
    <script src="script.js"></script>
</body>
</html>
