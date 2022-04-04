function myRegex(text, regex) {
	result = false;
	if (text.length > 0) {
		result = regex.test(text);
	}
	return result;
}

function validate_car(op) {

	//
	let form = document.formcar

	let id = form.id
	let mark = form.mark
	let model = form.model
	let cv = form.cv
	let manufacturingdate = form.manufacturingdate
	let km = form.km
	let price = form.price
	let fuel = form.fuel
	let overview = form.overview
	let numcylinders = form.numcylinders
	let doors = form.doors
	let drive = form.drive
	// let color_ext = form.color_ext
	// let color_int = form.color_int
	let framenumber = form.framenumber

	

	let check = true

	// Mark
	if (!myRegex(mark.value, /^[a-zA-Z\-\ ]{1,}$/)) {
		document.getElementById('e_mark').innerHTML = "Error en los caracteres";
		check = false
	} else {
		document.getElementById('e_mark').innerHTML = "";
	}

	// Model
	if (!myRegex(model.value, /^[a-zA-Z0-9\ ]{1,}$/)) {
		document.getElementById('e_model').innerHTML = "Error en los caracteres";
		check = false
	} else {
		document.getElementById('e_model').innerHTML = "";
	}

	// CV
	if (!myRegex(cv.value, /^[0-9]{1,3}$/)) {
		document.getElementById('e_cv').innerHTML = "Error en los caracteres";
		check = false
	} else {
		document.getElementById('e_cv').innerHTML = "";
	}

	// Manufacturing Year

	// Km
	if (!myRegex(km.value, /^[0-9]{1,}$/)) {
		document.getElementById('e_km').innerHTML = "Error en los caracteres";
		check = false
	} else {
		document.getElementById('e_km').innerHTML = "";
	}

	// Price
	if (!myRegex(price.value, /[0-9]{1,}.[0-9]{1,2}$/)) {
		document.getElementById('e_price').innerHTML = "Error en los caracteres";
		check = false
	} else {
		document.getElementById('e_price').innerHTML = "";
	}

	// Framenumber
	if (!myRegex(framenumber.value, /^[a-zA-Z0-9]{17}$/)) {
		document.getElementById('e_framenumber').innerHTML = "Error en los caracteres";
		check = false
	} else {
		document.getElementById('e_framenumber').innerHTML = "";
	}

	if(op == "up") {
		// Fuel
		if (fuel.value == "") {
			document.getElementById('e_fuel').innerHTML = "Debe seleccionar alguno";
			check = false
		} else {
			document.getElementById('e_fuel').innerHTML = "";
		}

		// Overview
		if (!myRegex(overview.value, /^[a-zA-Z0-9\ .,!?¿¡*:;]{1,}$/)) {
			if(overview.value.length >= 40) {
				document.getElementById('e_overview').innerHTML = "Error en los caracteres";
			} else {
				document.getElementById('e_overview').innerHTML = "Debe contener al menos 40 caracteres";
			}
			check = false
		} else {
			document.getElementById('e_overview').innerHTML = "";
			if(overview.value.length < 40) {
				document.getElementById('e_overview').innerHTML = "Debe contener al menos 40 caracteres";
				check = false
			}
		}

		// Numcylinders
		if (!myRegex(numcylinders.value, /^[0-9]{1,2}$/)) {
			document.getElementById('e_numcylinders').innerHTML = "Error en los caracteres";
			check = false
		} else {
			if (numcylinders.value > 12) {
				document.getElementById('e_numcylinders').innerHTML = "No puede tener mas de 12";
				check = false
			} else {
				document.getElementById('e_numcylinders').innerHTML = "";
			}
		}

		// Doors
		if (!myRegex(doors.value, /^[0-9]{1,}$/)) {
			document.getElementById('e_doors').innerHTML = "Error en los caracteres";
			check = false
		} else {
			document.getElementById('e_doors').innerHTML = "";
		}

		// Drive
		if (!myRegex(drive.value, /^[a-zA-Z0-9\ ]{1,}$/)) {
			document.getElementById('e_drive').innerHTML = "Error en los caracteres";
			check = false
		} else {
			document.getElementById('e_drive').innerHTML = "";
		}

		// Color_ext
		// if (!myRegex(color_ext.value, /^#[a-zA-Z]{1,}$/)) {
		// 	document.getElementById('e_color_ext').innerHTML = "Error en los caracteres";
		// 	check = false
		// } else {
		// 	document.getElementById('e_color_ext').innerHTML = "";
		// }

		// Color_int
		// if (!myRegex(color_int.value, /^[a-zA-Z\#]{1,}$/)) {
		// 	document.getElementById('e_color_int').innerHTML = "Error en los caracteres";
		// 	check = false
		// } else {
		// 	document.getElementById('e_color_int').innerHTML = "";
		// }

	}
	// alert(id)

	if(check) {
		if(op == 'up'){
			form.action = "index.php?module=car&op=update&id=" + id.value;
		} else if(op == 'cr') {
			form.action = "index.php?module=car&op=create";
		}
		form.submit();
	}
	
}