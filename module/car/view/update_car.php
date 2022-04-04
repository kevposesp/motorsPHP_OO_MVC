<div class="update_car">
	<h1>Update car</h1>
	<form method="post" name="formcar" id="formcar">
		<input type="hidden" name="id" value="<?=$_GET['id']?>">
		<p>
			<label for="mark">mark</label>
			<input name="mark" id="mark" type="text" placeholder="mark" value="<?php echo $_POST ? $_POST['mark'] : $car->mark; ?>" required />
			<span id="e_mark" class="styerror"></span>
			<?php
			if (isset($errors['mark'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['mark'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="model">model</label>
			<input name="model" id="model" type="text" placeholder="model" value="<?php echo $_POST ? $_POST['model'] : $car->model; ?>" />
			<span id="e_model" class="styerror"></span>
			<?php
			if (isset($errors['model'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['model'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="cv">cv</label>
			<input name="cv" id="cv" type="text" placeholder="cv" value="<?php echo $_POST ? $_POST['cv'] : $car->cv; ?>" />
			<span id="e_cv" class="styerror"></span>
			<?php
			if (isset($errors['cv'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['cv'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="manufacturingdate">manufacturingdate</label>
			<input name="manufacturingdate" id="manufacturingdate" type="text" placeholder="manufacturingdate" value="<?php echo $_POST ? $_POST['manufacturingdate'] : $car->manufacturingdate; ?>" />
			<span id="e_manufacturingdate" class="styerror"></span>
			<?php
			if (isset($errors['manufacturingdate'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['manufacturingdate'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="km">km</label>
			<input name="km" id="km" type="text" placeholder="km" value="<?php echo $_POST ? $_POST['km'] : $car->km; ?>" />
			<span id="e_km" class="styerror"></span>
			<?php
			if (isset($errors['km'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['km'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="price">price</label>
			<input name="price" id="price" type="text" placeholder="price" value="<?php echo $_POST ? $_POST['price'] : $car->price; ?>" />
			<span id="e_price" class="styerror"></span>
			<?php
			if (isset($errors['price'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['price'] . "</span><br/>");
			} ?>
		</p>
		<p>
			<label for="fuel">FuelType</label><br>

			<input type="radio" id="gasolina" name="fuel" value="gasolina" <?= $_POST && $_POST['fuel'] == "gasolina" || !$_POST && $car->fuel == "gasolina" ? "checked" : "" ?>>
			<label for="gasolina">Gasolina</label><br>
			<input type="radio" id="diesel" name="fuel" value="diesel" <?= $_POST && $_POST['fuel'] == "diesel" || !$_POST && $car->fuel == "diesel" ? "checked" : "" ?>>
			<label for="diesel">Diesel</label><br>
			<input type="radio" id="electrico" name="fuel" value="electrico" <?= $_POST && $_POST['fuel'] == "electrico" || !$_POST && $car->fuel == "electrico" ? "checked" : "" ?>>
			<label for="electrico">Electrico</label>

			<span id="e_fuel" class="styerror"></span>
		</p>
		<p>
			<label for="overview">Overview</label>
			<textarea name="overview" id="" cols="50" rows="10" placeholder="min 40 chars"><?php echo $_POST ? $_POST['overview'] : $car->overview; ?></textarea>
			<span id="e_overview" class="styerror"></span>
		</p>
		<p>
			<label for="numcylinders">Number of cylinders</label>
			<input type="number" name="numcylinders" min="0" max="12" value="<?php echo $_POST ? $_POST['numcylinders'] : $car->numberofcylinders; ?>">
			<span id="e_numcylinders" class="styerror"></span>
		</p>
		<p>
			<label for="doors">Number of doors</label>
			<input type="number" name="doors" min="1" max="8" value="<?php echo $_POST ? $_POST['doors'] : $car->doors; ?>">
			<span id="e_doors" class="styerror"></span>
		</p>
		<p>
			<label for="drive">Drive traction</label>
			<input type="text" name="drive" placeholder="typedrive" value="<?php echo $_POST ? $_POST['drive'] : $car->drive; ?>">
			<span id="e_drive" class="styerror"></span>
		</p>
		<p>
			<label for="color_ext">Exterior color</label>
			<input type="color" name="color_ext" value="<?php echo $_POST ? $_POST['color_ext'] : $car->color_ext; ?>">
			<span id="e_color_ext" class="styerror"></span>
		</p>
		<p>
			<label for="color_int">Inside color</label>
			<input type="color" name="color_int" value="<?php echo $_POST ? $_POST['color_int'] : $car->color_int; ?>">
			<span id="e_color_int" class="styerror"></span>
		</p>
		<p>
			<label for="framenumber">Frame number</label>
			<input type="text" name="framenumber" placeholder="framenumber" value="<?php echo $_POST ? $_POST['framenumber'] : $car->framenumber; ?>">
			<span id="e_framenumber" class="styerror"></span>
			<?php
			if (isset($errors['framenumber'])) {
				print("<BR><span CLASS='styerror'>" . "* " . $errors['framenumber'] . "</span><br/>");
			} ?>
		</p>
		<input type="button" value="Guardar" onclick="validate_car('up')"/>
	</form>
</div>