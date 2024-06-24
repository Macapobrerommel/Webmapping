const counters = document.querySelectorAll('.stat h2');
const speed = 100; // Decreased speed value to make the counting faster

counters.forEach(counter => {
    const updateCount = () => {
        const target = parseFloat(counter.getAttribute('data-target').replace(/,/g, ''));
        let count = parseFloat(counter.innerText.replace(/,/g, '').replace('%', ''));
        
        const increment = target / speed;

        if (count < target) {
            count += increment;
            counter.innerText = target % 1 === 0 
                ? Math.ceil(count).toLocaleString() 
                : count.toFixed(2) + '%';
            setTimeout(updateCount, 20); // Decreased timeout to 20ms for faster counting
        } else {
            counter.innerText = target % 1 === 0 
                ? target.toLocaleString() 
                : target.toFixed(2) + '%';
        }
    };

    updateCount();
});

// Chart.js setup
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Poverty Incidence', 'Subsistence Incidence'],
        datasets: [{
            label: '2021',
            data: [23.7, 9.9],
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        },
        {
            label: '2023',
            data: [22.4, 8.7],
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return value + "%";
                    }
                },
                title: {
                    display: true,
                    text: 'Percentage (%)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Incidence Type'
                }
            }
        },
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});










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