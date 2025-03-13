// dashboard.js

document.addEventListener('DOMContentLoaded', function () {
  // Revenue chart
  var revenueCtx = document.getElementById('revenue-chart-canvas').getContext('2d');
  new Chart(revenueCtx, {
      type: 'line', // You can use 'bar', 'pie', etc. based on your needs
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          datasets: [{
              label: 'Revenue',
              backgroundColor: 'rgba(60,141,188,0.9)',
              borderColor: 'rgba(60,141,188,0.8)',
              pointRadius: false,
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data: [28, 48, 40, 19, 86, 27, 90]
          }]
      },
      options: {
          maintainAspectRatio: false,
          responsive: true,
          legend: {
              display: false
          },
          scales: {
              xAxes: [{
                  gridLines: {
                      display: false,
                  }
              }],
              yAxes: [{
                  gridLines: {
                      display: false,
                  }
              }]
          }
      }
  });

  // Sales chart
  var salesCtx = document.getElementById('sales-chart-canvas').getContext('2d');
  new Chart(salesCtx, {
      type: 'doughnut',
      data: {
          labels: ['Download Sales', 'In-Store Sales', 'Mail-Order Sales'],
          datasets: [{
              data: [30, 50, 20],
              backgroundColor: ['#f56954', '#00a65a', '#f39c12']
          }]
      },
      options: {
          maintainAspectRatio: false,
          responsive: true,
      }
  });
});
