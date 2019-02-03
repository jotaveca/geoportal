$(function () {


    "use strict";
  
    var randomScalingFactor = function() {
        return Math.random().toFixed(2);
    };

    var random_color = function() {
        return "#" + (Math.round(Math.random() * 0XFFFFFF)).toString(16);
    };

   
      
       var chartData = {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            datasets: [{
                type: 'line',
                label: 'Promedio PDVSA',
                yAxisID: 'A',
                borderColor: window.chartColors.green,
                borderWidth: 2,
                fill: false,
                data: [
                    100,
                    0.5,
                    0.6,
                    0.5,
                    0.3,
                    0.7,
                    0.5,
                    0.6,                    
                    0.3,
                    0.7,
                    0.5,                    
                    0.3
                ]
            },{
                type: 'bar',
                label: 'Bolívares',
                backgroundColor: random_color(),
                data: [
                    4545,
                    5415,
                    154151,
                    5145),
                    1212,
                    454,
                    15415,
                    516541,
                    454,
                    444,
                    7878,                    
                    15145415
                                         
                    
                ]
            }]

        };

         window.onload = function() {
            
                   
        
            var ctx = document.getElementById("bolivares_reembolso").getContext("2d");
            
            window.myMixedChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Bolívares en reembolsos'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                  yAxes: [{
                    id: 'B',
                    type: 'linear',
                    position: 'left',
                  }, {
                    id: 'A',
                    type: 'linear',
                    position: 'right',
                    ticks: {
                      max: 1,
                      min: 0
                    }
                  }]
                }
                }
            });
        };

        
    
});