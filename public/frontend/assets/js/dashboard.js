let menu = document.querySelector('.menu')
let sidebar = document.querySelector('.sidebar')
let mainContent = document.querySelector('.main--content')
let chart = document.querySelector('.charts')
let tabel = document.querySelector('.table')

menu.onclick = function(){
    sidebar.classList.toggle('active')
    mainContent.classList.toggle('active')
    chart.classList.toggle('active')
    tabel.classList.toggle('active')
}
var barChartOptions = {
    series: [{
      data: [10, 8, 6, 4, 2, 7, 9, 8, 8, 9, 1,9]
    }],
    chart: {
      type: 'bar',
      height: 250,
      width: 950,
      toolbar: {
        show: false
      },
    },
    colors: [
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",
      "#C4E2E5",

    ],
    plotOptions: {
      bar: {
        distributed: true,
        borderRadius: 4,
        horizontal: false,
        columnWidth: '80%',
      }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    xaxis: {
      Month: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
    },
    yaxis: {
      title: {
        text: "Total"
      }
    }
  };
  
  var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  barChart.render();

  
  

