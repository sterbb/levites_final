// $(function () {
// 	// chart 1
// 	var options = {
// 		series: [{
// 			name: 'Affiliated Member',
// 			data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
// 		}],
// 		chart: {
// 			foreColor: '#9ba7b2',
// 			height: 290,
// 			type: 'area',
// 			zoom: {
// 				enabled: false
// 			},
// 			toolbar: {
// 				show: false
// 			},
// 		},
// 		stroke: {
// 			width: 3,
// 			curve: 'smooth'
// 		},
// 		plotOptions: {
// 			bar: {
// 				horizontal: !1,
// 				columnWidth: "30%",
// 				endingShape: "rounded"
// 			}
// 		},
// 		grid: {
// 			borderColor: 'rgba(255, 255, 255, 0.15)',
// 			strokeDashArray: 4,
// 			yaxis: {
// 				lines: {
// 					show: true
// 				}
// 			}
// 		},
// 		fill: {
// 			type: 'gradient',
// 			gradient: {
// 			  shade: 'light',
// 			  type: 'vertical',
// 			  shadeIntensity: 0.5,
// 			  gradientToColors: ['#01e195'],
// 			  inverseColors: false,
// 			  opacityFrom: 0.8,
// 			  opacityTo: 0.2,
// 			}
// 		  },
// 		colors: ['#0d6efd'],
// 		dataLabels: {
// 			enabled: false,
// 			enabledOnSeries: [0]
// 		},
// 		xaxis: {
// 			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

// 		},
// 	};
	
// 	function updateChartData(newData) {
// 		// Update the data of the first data series
// 		options.series[0].data = newData;
		
// 		// Update the chart with the new data
// 		chart.updateOptions(options);
// 	}
	
	
// 	// Function to fetch event counts from the server and update the chart data
// 	function fetchEventCounts() {
// 		$.ajax({
// 			url: 'ajax/get_affiliatedMember.ajax.php',
// 			method: 'POST',
// 			dataType: 'json',
// 			success: function(data) {
// 				console.log(data); // Check the event dates in the browser console
	
// 				var affiliadted = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Initialize with 0 for each month
	
// 				data.forEach(function(event) {
// 					var dateParts = event.collabdate.split('-'); // Split the date string into an array
// 					if (dateParts.length === 3) {
// 						var eventMonth = parseInt(dateParts[1]) - 1; // Month is 0-indexed in JavaScript Date object
// 						affiliadted[eventMonth]++;
// 					}
// 				});
	
// 				console.log(affiliadted);
	
// 				// Update the chart with the new data
// 				updateChartData(affiliadted);
	
				
			
// 			},
// 			error: function(xhr, status, error) {
// 				console.error('Error fetching event counts:', error);
// 			}
// 		});
// 	}
	
// 	// Create the chart and render it
// 	var chart = new ApexCharts(document.querySelector("#AffMem"), options);
// 	chart.render();
	
// 	// Call the function to fetch event counts and update the chart
// 	fetchEventCounts();



// });