/*=========================================================================================
    File Name: advance-cards.js
    Description: intialize advance cards
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Version: 3.0
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
  
(function(window, document, $) {
	
    'use strict';
 


    /***********************************************************
    *               New User - Page Visist Stats               *
    ***********************************************************/
    //Get the context of the Chart canvas element we want to select
    var ctx2 = document.getElementById("line-stacked-area").getContext("2d");

    // Chart Options
    var userPageVisitOptions = {
        responsive: true,
        maintainAspectRatio: false,
        pointDotStrokeWidth : 4,
        legend: {
            display: false,
            labels: {
                fontColor: '#FFF',
                boxWidth: 10,
            },
            position: 'top',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "rgba(255,255,255, 0.3)",
                    drawTicks: true,
                    drawBorder: false,
                    zeroLineColor:'#FFF'
                },
                ticks: {
                    display: true,
                },
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "rgba(0,0,0, 0.07)",
                    drawTicks: false,
                    drawBorder: false,
                    drawOnChartArea: true
                },
                ticks: {
                    display: false,
                    maxTicksLimit: 5
                },
            }]
        },
        color: [ '#bd7c08', '#613f0f' ],
        title: {
            display: false,
            text: 'Chart.js Line Chart - Legend'
        },
    };

    // Chart Data
	 
	
    var userPageVisitData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "iOS",
            data: [0, 5, 100, 14, 28, 12, 24, 4, 5,5, 22, 14,],
            backgroundColor: "#23d4",
            borderColor: "transparent",
            pointBorderColor: "transparent",
            pointBackgroundColor: "transparent",
            pointRadius: 2,
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
        },{
            label: "Windows",
            data: [0, 8, 30, 15, 12, 21, 14, 4,100, 21, 14, 0],
            backgroundColor: "#f8c3a7",
            borderColor: "transparent",
            pointBorderColor: "transparent",
            pointBackgroundColor: "transparent",
            pointRadius: 2,
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
        }, {
            label: "Android",
            data: [0, 20, 10, 45, 20, 100, 21, 4, 20, 36, 21, 0],
            backgroundColor: "#f2a4ac",
            borderColor: "transparent",
            pointBorderColor: "transparent",
            pointBackgroundColor: "transparent",
            pointRadius: 2,
            pointBorderWidth: 2,
            pointHoverBorderWidth: 2,
        }]
    };
	

    var userPageVisitConfig = {
        type: 'line',

        // Chart Options
        options : userPageVisitOptions,

        // Chart Data
        data : userPageVisitData
    };
		
	
    // Create the chart
    var stackedAreaChart = new Chart(ctx2, userPageVisitConfig); 

})(window, document, jQuery);