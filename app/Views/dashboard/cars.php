<div class="table-responsive-sm">
	<table class="table table-sm">
		<thead>
			<tr>
				<th scope="col">VIN</th>
				<th scope="col">Year</th>
				<th scope="col">Make</th>
				<th scope="col">Model</th>
				<th scope="col">Trim</th>
				<th scope="col">Engine</th>
				<th scope="col">RockAuto</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($cars as $car){ ?>

			<tr>
				<td><?php echo $car["vin"];?></td>
				<td><?php echo $car["year"];?></td>
				<td><?php echo $car["make"];?></td>
				<td><?php echo $car["model"];?></td>
				<td><?php echo $car["trim"];?></td>
				<td><?php echo $car["engine"];?></td>
				<td><a target="_blank" href="<?php echo $car["link"];?>">link</a></td>
			</tr>

			<? } ?>
		</tbody>
	</table>
</div>

