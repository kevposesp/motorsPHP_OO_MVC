function loadAuth() {
    // const signUpButton = document.getElementById('signUp');
    // const signInButton = document.getElementById('signIn');
    // const container = document.getElementById('container-auth');

    // signUpButton.addEventListener('click', () => {
    //     container.classList.add("right-panel-active");
    // });

    // signInButton.addEventListener('click', () => {
    //     container.classList.remove("right-panel-active");
    // });

    const signUpButton = $('#signUp');
    const signInButton = $('#signIn');
    const container = $('#container-auth');

    signUpButton.on('click', () => {
        container.addClass("right-panel-active");
    });

    signInButton.on('click', () => {
        container.removeClass("right-panel-active");
    });
}

// {
function myRegex(text, regex) {
    var result = false;
    if (text.length > 0) {
        result = regex.test(text);
    }
    return result;
}

function validate_register() {

    let username = $("#username").val()
    let email = $("#email").val()
    let password = $("#password").val()
    let check = true

    // username
    if (!myRegex(username, /^[a-zA-Z0-9\_]{1,}$/)) {
        if (username.length == 0) {
            document.getElementById('error_username').innerHTML = "Tienes que escribir el usuario";
        } else {
            document.getElementById('error_username').innerHTML = "Error en los carácteres";
        }
        check = false
    } else {
        document.getElementById('error_username').innerHTML = "";
    }

    // email
    if (!myRegex(email, /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/)) {
        if (email.length == 0) {
            document.getElementById('error_email').innerHTML = "Tienes que escribir el email";
        } else {
            document.getElementById('error_email').innerHTML = "Error en los carácteres";
        }
        check = false
    } else {
        document.getElementById('error_email').innerHTML = "";
    }

    // password
    if (!myRegex(password, /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)) {
        if (password.length == 0) {
            document.getElementById('error_password').innerHTML = "Tienes que escribir el password";
        } else {
            document.getElementById('error_password').innerHTML = "Error en los carácteres";
        }
        check = false
    } else {
        document.getElementById('error_password').innerHTML = "";
    }

    return check
}

function validate_login() {

    let usr = $("#usr").val()
    let password = $("#pssw").val()
    let check = true

    // usr
    let usernameVar = myRegex(usr, /^[a-zA-Z0-9\_]{1,}$/)
    let emailVar = myRegex(usr, /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/)

    if (!usernameVar && !emailVar) {
        if (usr.length == 0) {
            document.getElementById('error_usr').innerHTML = "Tienes que escribir el usuario";
        } else {
            document.getElementById('error_usr').innerHTML = "Error en los carácteres";
        }
        check = false
    } else {
        document.getElementById('error_usr').innerHTML = "";
    }

    // // user
    // if (!myRegex(usr, /^[a-zA-Z0-9\_]{1,}$/)) {
    //     if (usr.length == 0) {
    //         document.getElementById('error_usr').innerHTML = "Tienes que escribir el usuario";
    //     } else {
    //         document.getElementById('error_usr').innerHTML = "Error en los carácteres";
    //     }
    //     check = false
    // } else {
    //     document.getElementById('error_usr').innerHTML = "";
    // }

    // // email
    // if (!myRegex(email, /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/)) {
    //     if (email.length == 0) {
    //         document.getElementById('error_email').innerHTML = "Tienes que escribir el email";
    //     } else {
    //         document.getElementById('error_email').innerHTML = "Error en los carácteres";
    //     }
    //     check = false
    // } else {
    //     document.getElementById('error_email').innerHTML = "";
    // }

    // password
    if (!myRegex(password, /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)) {
        if (password.length == 0) {
            document.getElementById('error_pssw').innerHTML = "Tienes que escribir el password";
        } else {
            document.getElementById('error_pssw').innerHTML = "Error en los carácteres";
        }
        check = false
    } else {
        document.getElementById('error_pssw').innerHTML = "";
    }

    return check
}
// }

function register() {
    if (validate_register()) {
        var data = $('#register_form').serialize();
        var conf = {}
        conf.url = "module/auth/controller/controller_auth.php?op=register"
        conf.params = data
        ajaxPromise(conf.url, 'POST', 'json', conf.params)
            .then(function (data) {
                console.log(data);
                if (data['check']) {
                    $('#container-auth').removeClass('right-panel-active')
                    $('#usr').val($("#username").val())
                    $("#username").val('')
                    $("#email").val('')
                    $('#pssw').val($("#password").val())
                    $("#password").val('')
                    alertify.success('Registrado correctamente', 3)
                } else {
                    if (data['username']) {
                        $("#error_username").append(data['username'])
                    } else {
                        $("#error_username").empty()
                    }
                    if (data['email']) {
                        $("#error_email").append(data['email'])
                    } else {
                        $("#error_email").empty()
                    }
                    if (data['password']) {
                        $("#error_password").append(data['password'])
                    } else {
                        $("#error_password").empty()
                    }
                    alertify.error('Error al registrar', 3)
                }
            }).catch(function (e) {
                console.log("error" + e);
            })
    }
}

function key_register() {
    $("#register_form").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            e.preventDefault();
            register();
        }
    });
}

function button_register() {
    $('#registro').on('click', function (e) {
        e.preventDefault()
        register()
    });
}

function login() {
    if (validate_login()) {
        var data = $('#login_form').serialize();
        var conf = {}
        conf.url = "module/auth/controller/controller_auth.php?op=login"
        conf.params = data
        ajaxPromise(conf.url, 'POST', 'json', conf.params)
            .then(function (data) {
                alertify.success('Has iniciado session', 3)
                localStorage.setItem('token', data)
                setTimeout(() => {
                    window.location.href = '?module=home';
                }, 3000);
            }).catch(function (e) {
                console.log("error" + e);
            })
    }
}

function key_login() {
    $("#login_form").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            e.preventDefault();
            login();
        }
    });
}

function button_login() {
    $('#login').on('click', function (e) {
        e.preventDefault()
        login()
    });
}

function protecturl() {
    var conf = {}
    conf.url = "module/auth/controller/controller_auth.php?op=controluser"
    ajaxPromise(conf.url, 'POST', 'json')
        .then(function (data) {
            console.log(data)
        }).catch(function (e) {
            console.log("error" + e);
        })
}

function actividad() {
    var conf = {}
    conf.url = "module/auth/controller/controller_auth.php?op=actividad"
    ajaxPromise(conf.url, 'POST', 'json')
        .then(function (data) {
            if(!data) {
                if(localStorage.getItem('token')) {
                    logout()
                }
            } else {
                console.log(data)
            }
        }).catch(function (e) {
            console.log("error" + e);
        })
}

function refreshid() {
    var conf = {}
    conf.url = "module/auth/controller/controller_auth.php?op=refreshsesion"
    ajaxPromise(conf.url, 'POST', 'json')
        .then(function (data) {
            console.log(data)
        }).catch(function (e) {
            console.log("error" + e);
        })
}

function refreshtoken() {
    var conf = {}
    conf.url = "module/auth/controller/controller_auth.php?op=refreshtoken"
    ajaxPromise(conf.url, 'POST', 'json', conf.params)
        .then(function (data) {
            if(!data) {
                logout()
            } else {
                console.log(data);
                localStorage.setItem('token', data)
            }
        }).catch(function (e) {
            console.log("error" + e);
        })
}

function showUploadWidget() {
    var myWidget = cloudinary.createUploadWidget({
        cloudName: 'kevposesp', 
        uploadPreset: 'jwahxckx'}, (error, result) => { 
          if (!error && result && result.event === "success") { 
              $("#img_input").val(result.info.url)
          }
        }
      )
      $("#upload_widget").on("click", () => {
        myWidget.open();
      })
}

$(document).ready(function () {
    loadAuth()
    key_register()
    button_register()
    key_login()
    button_login()
    protecturl()

    actividad()
        refreshid()
        refreshtoken()

    setInterval(() => {
        actividad()
        refreshid()
        refreshtoken()
    }, 600000);
    ajaxPromise("module/auth/controller/controller_auth.php?op=pruebaheaders", 'POST', 'json')
        .then(function (data) {
            console.log(data);
        }).catch(function (e) {
            console.log("error" + e);
        })
        showUploadWidget()
});