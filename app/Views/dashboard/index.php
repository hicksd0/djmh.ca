<div class="row">
	<div class="col-6">
		<h3 class="text-center">Asset Maintenance</h3>
		<canvas id="myChart1"></canvas>
	</div>
	<div class="col-6">
		<h3 class="text-center">Asset Breakdown</h3>
		<canvas id="myChart2"></canvas>
	</div>
</div>

<script>
	
	$(function() {
		const data1 = {
			  labels: [
				'Outstanding Maintenance',
				'On Schedule'
			  ],
			  datasets: [{
				label: 'Asset Maintenance',
				data: [3, 20],
				backgroundColor: [
				
				  '#08415C',
				  '#B5FFE1'
				],
				hoverOffset: 4
			  }]
			};
		
		const data2 = {
			  labels: [
				'Houses',
				'Vehicles',
				'Fixed Equipment',
				'Appliances',
				'Small Engines'
			  ],
			  datasets: [{
				label: 'Asset Breakdown',
				data: [1, 2, 7, 11, 2],
				backgroundColor: [
				  '#08415C',
				  '#B5FFE1',
				  '#EBBAB9',
				  '#388697',
				  '#CC2936'
				],
				hoverOffset: 4
			  }]
			};
		
		

		const config1 = {
			  type: 'doughnut',
			  data: data1,
			};
		
		const config2 = {
			  type: 'doughnut',
			  data: data2,
			};
		
		const ctx1 = document.getElementById('myChart1');
		const ctx2 = document.getElementById('myChart2');

		new Chart(ctx1, config1);
		new Chart(ctx2, config2);
	});

</script>