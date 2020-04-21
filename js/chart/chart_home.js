 $(function () {

  var jan = $('#jan').val();
  var feb = $('#feb').val();
  var mar = $('#mar').val();
  var apr = $('#apr').val();
  var mei = $('#mei').val();
  var jun = $('#jun').val();
  var jul = $('#jul').val();
  var agu = $('#agu').val();
  var sep = $('#sep').val();
  var okt = $('#okt').val();
  var nov = $('#nov').val();
  var des = $('#des').val();


  'use strict' 
  // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels  : ['Jan 20','Feb 20','Mar 20','Apr 20','Mey 20','Jun 20','Jul 20','Agu 20','Sep 20','Okt 20','Nov 20','Des 20'],
    datasets: [
      {
        label               : 'Penjualan',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#efefef',
        pointRadius         : 3,
        pointHoverRadius    : 7,
        pointColor          : '#efefef',
        pointBackgroundColor: '#efefef',
        data                : [jan, feb, mar, apr, mei, jun, jul, agu, sep, okt, nov, des]
        // data                : [0, 50, 50, 100, 100, 150, 150, 200, 150, 150, 100, 100, 50, 50,0]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#efefef',
        },
        gridLines : {
          display : false,
          color: '#efefef',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 50,
          fontColor: '#efefef',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesGraphChart = new Chart(salesGraphChartCanvas, { 
      type: 'line', 
      data: salesGraphChartData, 
      options: salesGraphChartOptions
    }
  )
})