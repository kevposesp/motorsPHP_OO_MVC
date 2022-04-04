function myRegex(text, regex) {
    var result = false;
    if (text.length > 0) {
        result = regex.test(text);
    }
    return result;
}

function validate_create_mark() {
    let form = document.mark_car_form

    let mark = form.name_mark

    let check = true

    // Mark
    if (!myRegex(mark.value, /^[a-zA-Z0-9\-\ ]{1,}$/)) {
        document.getElementById('e_name_mark').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_name_mark').innerHTML = "";
    }

    if (check) {
        // form.action = "index.php?module=mark&op=create";
        // form.submit();

        var params = 'name=' + mark.value
        var url = 'module/mark/controller/controller_mark.php?op=create'
        ajaxPromise(url, 'POST', 'json', params)
            .then(function (data) {
                console.log(data);
                console.log(mark.value + " Creado correctamente");
            }).catch(function (e) {
                console.log("error:" + e);
            })
    }

}

function validate_create_model() {
    let form = document.model_car_form

    let mark = form.mark_create_model
    let model = form.model_create_model

    let check = true

    // Mark
    if (!myRegex(model.value, /^[a-zA-ZÀ-ÿ0-9\ \-]{1,}$/)) {
        document.getElementById('e_name_create_model').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_name_create_model').innerHTML = "";
    }

    // mark
    if (mark.value == "") {
        document.getElementById('e_mark_create_model').innerHTML = "Debe seleccionar alguno";
        check = false
    } else {
        document.getElementById('e_mark_create_model').innerHTML = "";
    }

    if (check) {
        // form.action = "index.php?module=mark&op=create";
        // form.submit();

        var params = 'name=' + model.value + '&mark=' + mark.value
        var url = 'module/car/controller/controller_model.php?op=create'

        ajaxPromise(url, 'POST', 'json', params)
            .then(function (data) {
                console.log(model.value + " Creado correctamente");
            }).catch(function (e) {
                console.log("error" + e);
            })
    }

}

function validate_create_category() {
    let form = document.category_car_form

    let name = form.name_create_category
    let title = form.title_create_category
    let overview = form.overview_create_category

    let check = true

    // Name
    if (!myRegex(name.value, /^[a-zA-ZÀ-ÿ0-9\ ]{1,}$/)) {
        document.getElementById('e_name_category').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_name_category').innerHTML = "";
    }

    // title
    if (!myRegex(title.value, /^[a-zA-ZÀ-ÿ0-9\ ]{1,}$/)) {
        document.getElementById('e_title_category').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_title_category').innerHTML = "";
    }

    // Overview
    if (!myRegex(overview.value, /^[a-zA-ZÀ-ÿ0-9\ .,!?¿¡*:;\'\"\/\(\)\u00f1\u00d1]{1,}$/)) {
        if (overview.value.length >= 40) {
            document.getElementById('e_overview_category').innerHTML = "Error en los caracteres";
        } else {
            document.getElementById('e_overview_category').innerHTML = "Debe contener al menos 40 caracteres";
        }
        check = false
    } else {
        document.getElementById('e_overview_category').innerHTML = "";
        if (overview.value.length < 40) {
            document.getElementById('e_overview_category').innerHTML = "Debe contener al menos 40 caracteres";
            check = false
        }
    }

    if (check) {
        // form.action = "index.php?module=mark&op=create";
        // form.submit();

        var params = 'name=' + name.value + '&title=' + title.value + '&overview=' + overview.value
        var url = 'module/category/controller/controller_category.php?op=create'

        ajaxPromise(url, 'POST', 'json', params)
            .then(function (data) {
                console.log(name.value + " Creado correctamente");
            }).catch(function (e) {
                console.log("error" + e);
            })
    }

}

function validate_create_car() {
    let form = document.create_car_form

    let mark = form.mark_create_car
    let model = form.model_create_car
    let cv = form.cv
    let category = form.category_create_car
    let km = form.km
    let price = form.price
    let fuel = form.typefuel_create_car
    let overview = form.overview
    let numcylinders = form.numberofcylinders
    let doors = form.doors
    let drive = form.drive
    let framenumber = form.framenumber
    let manufacturingdate = form.manufacturingdate_picker
    let nameimage = form.nameImage

    let check = true

    // Mark
    if (mark.value == "") {
        document.getElementById('e_mark_create_car').innerHTML = "Debe seleccionar alguno";
        check = false
    } else {
        document.getElementById('e_mark_create_car').innerHTML = "";
    }

    // Model
    if (model.value == "") {
        document.getElementById('e_model_create_car').innerHTML = "Debe seleccionar alguno";
        check = false
    } else {
        document.getElementById('e_model_create_car').innerHTML = "";
    }

    // CV
    if (!myRegex(cv.value, /^[0-9]{1,3}$/)) {
        document.getElementById('e_cv').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_cv').innerHTML = "";
    }

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

    // Fuel
    if (fuel.value == "") {
        document.getElementById('e_typefuel_create_car').innerHTML = "Debe seleccionar alguno";
        check = false
    } else {
        document.getElementById('e_typefuel_create_car').innerHTML = "";
    }

    // Overview
    if (!myRegex(overview.value, /^[a-zA-Z0-9\ .,!?¿¡*:;]{1,}$/)) {
        if (overview.value.length >= 40) {
            document.getElementById('e_overview').innerHTML = "Error en los caracteres";
        } else {
            document.getElementById('e_overview').innerHTML = "Debe contener al menos 40 caracteres";
        }
        check = false
    } else {
        document.getElementById('e_overview').innerHTML = "";
        if (overview.value.length < 40) {
            document.getElementById('e_overview').innerHTML = "Debe contener al menos 40 caracteres";
            check = false
        }
    }

    // Numcylinders
    if (!myRegex(numcylinders.value, /^[0-9]{1,2}$/)) {
        document.getElementById('e_numberofcylinders').innerHTML = "Error en los caracteres";
        check = false
    } else {
        if (numcylinders.value > 12) {
            document.getElementById('e_numberofcylinders').innerHTML = "No puede tener mas de 12";
            check = false
        } else {
            document.getElementById('e_numberofcylinders').innerHTML = "";
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

    // NameImage
    if (!myRegex(nameimage.value, /^[a-zA-Z0-9\ ]{1,}$/)) {
        document.getElementById('e_nameImage').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_nameImage').innerHTML = "";
    }

    // Category
    if (category.value == "") {
        document.getElementById('e_category_create_car').innerHTML = "Debe seleccionar alguno";
        check = false
    } else {
        document.getElementById('e_category_create_car').innerHTML = "";
    }

    if (check) {
        // form.action = "index.php?module=car&op=create";
        // form.submit();

        var attributess = document.querySelectorAll('input[type=checkbox]')
        var attributes = [];
        attributess.forEach((v) => {
            if (v.checked) {
                attributes.push(v.value)
            }
        });

        // console.log(attributes);
        var url = 'module/car/controller/controller_car.php?op=create'
        var params = "model=" + model.value + "&cv=" + cv.value + "&manufacturingdate=" + manufacturingdate.value + "&km=" + km.value + "&price=" + price.value
            + "&framenumber=" + framenumber.value + "&fuel=" + fuel.value + "&overview=" + overview.value + "&numberofcylinders=" + numberofcylinders.value
            + "&doors=" + doors.value + "&drive=" + drive.value + "&color_ext=" + color_ext.value + "&color_int=" + color_int.value + "&category=" + category.value
            + "&attributes=" + attributes + "&nameImage=" + nameimage.value

        ajaxPromise(url, 'POST', 'json', params)
            .then(function (data) {
                console.log(data);
                console.log("Coche creado correctamente");
            }).catch(function (e) {
                console.log("error" + e);
            })

    }

}

function validate_create_attribute() {
    let form = document.attribute_car_form

    let name = form.name_attribute
    let title = form.title_attribute

    let check = true

    // Attribute
    if (!myRegex(name.value, /^[a-zA-ZÀ-ÿ0-9\ ]{1,}$/)) {
        document.getElementById('e_name_attribute').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_name_attribute').innerHTML = "";
    }

    // Title
    if (!myRegex(title.value, /^[a-zA-ZÀ-ÿ0-9\ ]{1,}$/)) {
        document.getElementById('e_title_attribute').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_title_attribute').innerHTML = "";
    }

    if (check) {
        // form.action = "index.php?module=mark&op=create";
        // form.submit();

        var params = 'name=' + name.value + '&title=' + title.value
        var url = 'module/attribute/controller/controller_attribute.php?op=create'

        ajaxPromise(url, 'POST', 'json', params)
            .then(function (data) {
                console.log(name.value + " Creado correctamente");
            }).catch(function (e) {
                console.log("error" + e);
            })

    }

}

function validate_create_typefuel() {
    let form = document.typefuel_car_form

    let name = form.name_typefuel
    let title = form.title_typefuel

    let check = true

    // Name
    if (!myRegex(name.value, /^[a-zA-ZÀ-ÿ0-9\ ]{1,}$/)) {
        document.getElementById('e_name_typefuel').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_name_typefuel').innerHTML = "";
    }

    // Title
    if (!myRegex(title.value, /^[a-zA-ZÀ-ÿ0-9\ ]{1,}$/)) {
        document.getElementById('e_title_typefuel').innerHTML = "Error en los caracteres";
        check = false
    } else {
        document.getElementById('e_title_typefuel').innerHTML = "";
    }

    if (check) {
        // form.action = "index.php?module=mark&op=create";
        // form.submit();

        var params = 'name=' + name.value + '&title=' + title.value
        var url = 'module/fuel/controller/controller_fuel.php?op=create'

        ajaxPromise(url, 'POST', 'json', params)
            .then(function (data) {
                console.log(name.value + " Creado correctamente");
            }).catch(function (e) {
                console.log("error" + e);
            })
    }

}

// Create car
function loadModelsByMark(mark) {

    var url = 'module/car/controller/controller_model.php?op=list_models_by_mark&mark=' + mark
    ajaxPromise(url, 'GET', 'json')
        .then(function (data) {
            $('#model_create_car').empty();
            $('#model_create_car').html(function () {
                var content = ""
                content += '<option value="" selected disabled>Seleccione un modelo</option>';
                data.forEach(model => {
                    content += '<option value="' + model.id_model + '">' + model.name_model + '</option>';
                })
                return content;
            });
        }).catch(function (e) {
            console.log("error" + e);
        })

}
function changeSelectMark() {

    $("#mark_create_car")
        .change(function () {
            $(".selected_mark_create_car:selected").each(function () {
                loadModelsByMark(this.value)
            });
        })
        .trigger("change");
}
function loadTypeFuelSelect() {
    var url = 'module/fuel/controller/controller_fuel.php?op=list_type_fuels'
    ajaxPromise(url, 'GET', 'json')
        .then(function (data) {
            $('#typefuel_create_car').empty();
            $('#typefuel_create_car').html(function () {
                var content = ""
                content += '<option value="" selected disabled>Seleccione un tipo</option>';
                data.forEach(type_fuel => {
                    content += '<option value="' + type_fuel.id_type_fuel + '">' + type_fuel.name_type_fuel + '</option>';
                })
                return content;
            });
        }).catch(function (e) {
            console.log("error" + e);
        })
}
function loadAttributesSelect() {
    var url = 'module/attribute/controller/controller_attribute.php?op=list_attributes'
    ajaxPromise(url, 'GET', 'json')
        .then(function (data) {
            $('#attributes_create_car').empty();
            $('#attributes_create_car').html(function () {
                var content = ""
                data.forEach(attribute => {
                    content += '<li><input type="checkbox" name="attributes[]" value="' + attribute.id_attribute + '"><span>' + attribute.name_attribute + '</span></li>';
                })
                return content;
            });
        }).catch(function (e) {
            console.log("error" + e);
        })
}
function loadCategorySelect() {
    var url = 'module/category/controller/controller_category.php?op=list_categories'
    ajaxPromise(url, 'GET', 'json')
        .then(function (data) {
            $('#category_create_car').empty();
            $('#category_create_car').html(function () {
                var content = ""
                content += '<option value="" selected disabled>Seleccione una categoria</option>';
                data.forEach(category => {
                    content += '<option value="' + category.id_category + '">' + category.name_category + '</option>';
                })
                return content;
            });
        }).catch(function (e) {
            console.log("error" + e);
        })
}
// Create car
function loadMarksSelect() {
    var url = 'module/mark/controller/controller_mark.php?op=list_marks'
    ajaxPromise(url, 'GET', 'json')
        .then(function (data) {
            $('#mark_create_car').empty();
            $('#mark_create_car').html(function () {
                var content = ""
                content += '<option value="" selected disabled>Seleccione una marca</option>';
                data.forEach(mark => {
                    content += '<option value="' + mark.id_mark + '" class="selected_mark_create_car">' + mark.name_mark + '</option>';
                })
                return content;
            });

            $('#mark_create_model').empty();
            $('#mark_create_model').html(function () {
                var content = ""
                content += '<option value="" selected disabled>Seleccione una marca</option>';
                data.forEach(mark => {
                    content += '<option value="' + mark.id_mark + '">' + mark.name_mark + '</option>';
                })
                return content;
            });
        }).catch(function (e) {
            console.log("error" + e);
        })
}
$(document).ready(function () {
    loadAttributesSelect();
    loadMarksSelect();
    loadTypeFuelSelect();
    loadCategorySelect();
    changeSelectMark();
});