<form action="<?php echo base_url("assets/add");?>" method="post">
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="asset_name">Asset Name</label>
			<input type="text" class="form-control" id="asset_name" name="asset_name" placeholder="Asset Name">
		</div>
		<div class="form-group col-md-6">
			<label for="asset_description">Asset Description</label>
			<input type="text" class="form-control" id="asset_description" name="asset_description" placeholder="Asset Description">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="asset_manufacture_date">Manufacture Date</label>
			<input type="date" class="form-control" id="asset_manufacture_date" name="asset_manufacture_date" placeholder="Date of Manufacture">
		</div>
		<div class="form-group col-md-6">
			<label for="asset_manufacturer">Manufacturer</label>
			<input type="text" class="form-control" id="asset_manufacturer" name="asset_manufacturer" placeholder="Manufacturer">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="asset_model">Model</label>
			<input type="text" class="form-control" id="asset_model" name="asset_model" placeholder="Model">
		</div>
		<div class="form-group col-md-6">
			<label for="asset_serial">Serial</label>
			<input type="text" class="form-control" id="asset_serial" name="asset_serial" placeholder="Serial">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="asset_parent_id">Parent Asset</label>
			<select id="asset_parent_id" name="asset_parent_id" class="form-control">
				<option selected id="0">None</option>
			</select>
		</div>
		<div class="form-group col-md-6">
			<label for="asset_group_id">Asset Group</label>
			<select id="asset_group_id" name="asset_group_id" class="form-control">
				<?php foreach ($asset_groups as $asset_group){ ?>
				<option selected value="<?php echo $asset_group["id"] ;?>"><?php echo $asset_group["name"] ;?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Add Asset</button>
</form>