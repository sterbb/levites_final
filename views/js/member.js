// chart 4
$(function () {
var options = {
	series: [{
		name: 'Monthly Users',
		data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
	}],
	chart: {
		foreColor: '#9ba7b2',
		height: 250,
		type: 'area',
		zoom: {
			enabled: false
		},
		toolbar: {
			show: false
		},
	},
	stroke: {
		width: 3,
		curve: 'smooth'
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "30%",
			endingShape: "rounded"
		}
	},
	grid: {
		borderColor: 'rgba(255, 255, 255, 0.15)',
		strokeDashArray: 4,
		yaxis: {
			lines: {
				show: true
			}
		}
	},
	fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#01e195'],
		  inverseColors: false,
		  opacityFrom: 0.8,
		  opacityTo: 0.2,
		}
	  },
	colors: ['#0d6efd'],
	dataLabels: {
		enabled: false,
		enabledOnSeries: [0]
	},
	xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
	},
};



// Function to update the chart data
function updateChartData(newData) {
    // Update the data of the first data series
    options.series[0].data = newData;
    
    // Update the chart with the new data
    chart.updateOptions(options);
}


// Function to fetch event counts from the server and update the chart data
function fetchEventCounts() {
    $.ajax({
        url: 'ajax/get_memberReport.ajax.php',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            console.log(data); // Check the event dates in the browser console

            var memberCounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month

            data.forEach(function(event) {
                var dateParts = event.membershipDate.split('-'); // Split the date string into an array
                if (dateParts.length === 3) {
                    var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
                    memberCounts[eventMonth]++;
                }
            });

            console.log(memberCounts);

            // Update the chart with the new data
            updateChartData(memberCounts);

			
		
        },
        error: function(xhr, status, error) {
            console.error('Error fetching event counts:', error);
        }
    });
}

// Create the chart and render it
var chart = new ApexCharts(document.querySelector("#memberDate"), options);
chart.render();

// Call the function to fetch event counts and update the chart
fetchEventCounts();





	// chart 1
	var options2 = {
  
		series: [{
			 name: 'Events',
			data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] 
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 250,
			type: 'area',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: false
			},
		},
		stroke: {
			width: 3,
			curve: 'smooth'
		},
		plotOptions: {
			bar: {
				horizontal: !1,
				columnWidth: "30%",
				endingShape: "rounded"
			}
		},
		grid: {
			borderColor: 'rgba(255, 255, 255, 0.15)',
			strokeDashArray: 4,
			yaxis: {
				lines: {
					show: true
				}
			}
		},
		fill: {
			type: 'gradient',
			gradient: {
				shade: 'light',
				type: 'vertical',
				shadeIntensity: 0.5,
				gradientToColors: ['#01e195'],
				inverseColors: true,
				opacityFrom: 0.8,
				opacityTo: 0.2,
			}
		},
		colors: ['#0d6efd'],
		dataLabels: {
			enabled: false,
			enabledOnSeries: [0] // Set to [0] to target the first (and only) series
		},
		xaxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
	};
	
	// Function to update the chart data
	function updateChartData2(newData) {
		// Update the data of the first data series
		options2.series[0].data = newData;
		
		// Update the chart with the new data
		chart2.updateOptions(options2);
	}
	
	
	// Function to fetch event counts from the server and update the chart data
	function fetchEventCounts2() {
		$.ajax({
			url: 'ajax/get_churchReport.ajax.php',
			method: 'POST',
			dataType: 'json',
			success: function(data) {
		 // Check the event dates in the browser console
	
				var eventCounts = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
	
				data.forEach(function(event) {
					var dateParts = event.event_date.split('-'); // Split the date string into an array
					if (dateParts.length === 3) {
						var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
						eventCounts[eventMonth]++;
					}
				});
	
				console.log(eventCounts + "dash");
	
				// Update the chart with the new data
				updateChartData2(eventCounts);
	
		  
		
			},
			error: function(xhr, status, error) {
				console.error('Error fetching event counts:', error);
			}
		});
	}
	

  
	var chart2 = new ApexCharts(document.querySelector("#eventsChartDash"), options2);
	chart2.render();
	
	
	// Call the function to fetch event counts and update the chart
	fetchEventCounts2();

});


