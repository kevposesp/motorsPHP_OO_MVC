<div class="create_car">
	<form method="post" name="formcar" id="formcar">
		<p>
			<label for="mark" data-tr="Mark"></label>
			<input name="mark" id="mark" type="text" placeholder="mark" value="<?php echo $_POST ? $_POST['mark'] : ""; ?>" required />
			<span id="e_mark" class="styerror"></span>
			<?php
			if (isset($errors['mark'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['mark'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="model" data-tr="Model">model</label>
			<input name="model" id="model" type="text" placeholder="model" value="<?php echo $_POST ? $_POST['model'] : ""; ?>" />
			<span id="e_model" class="styerror"></span>
			<?php
			if (isset($errors['model'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['model'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="cv">cv</label>
			<input name="cv" id="cv" type="text" placeholder="cv" value="<?php echo $_POST ? $_POST['cv'] : ""; ?>" />
			<span id="e_cv" class="styerror"></span>
			<?php
			if (isset($errors['cv'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['cv'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="manufacturingdate" data-tr="Manufacturing date"></label>
			<input name="manufacturingdate" id="manufacturingdate_picker" type="text" placeholder="manufacturingdate" value="<?php echo $_POST ? $_POST['manufacturingdate'] : ""; ?>" />
			<span id="e_manufacturingdate" class="styerror"></span>
			<?php
			if (isset($errors['manufacturingdate'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['manufacturingdate'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="km">km</label>
			<input name="km" id="km" type="text" placeholder="km" value="<?php echo $_POST ? $_POST['km'] : ""; ?>" />
			<span id="e_km" class="styerror"></span>
			<?php
			if (isset($errors['km'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['km'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="price" data-tr="Price"></label>
			<input name="price" id="price" type="text" placeholder="price" value="<?php echo $_POST ? $_POST['price'] : ""; ?>" />
			<span id="e_price" class="styerror"></span>
			<?php
			if (isset($errors['price'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['price'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="framenumber" data-tr="Frame number"></label>
			<input type="text" name="framenumber" placeholder="framenumber" value="<?php echo $_POST ? $_POST['framenumber'] : ""; ?>">
			<span id="e_framenumber" class="styerror"></span>
			<?php
			if (isset($errors['framenumber'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['framenumber'] . "</span><br/>");
			} ?>
		</p>
		<input type="button" value="Guardar" onclick="validate_car('cr')" />
	</form>
</div>
<script>
	$( function() {
		$( "#manufacturingdate_picker" ).datepicker({ maxDate: "+0M -1D" });
	} );
</script>