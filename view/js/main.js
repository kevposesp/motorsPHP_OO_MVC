function loadButtonProfile() {
    var conf = {}
    conf.url = "module/auth/controller/controller_auth.php?op=infBut"
    ajaxPromise(conf.url, 'POST', 'json')
        .then(function (data) {
            console.log(data);
            if(data) {
                $('#username_butt_menu').append(data.username)
                $('#img_butt_menu').attr("src", data.img_user)
            } else {
                $('#username_butt_menu').append("Iniciar / Registrar")
                $('#img_butt_menu').attr("src", "view/icons/images/user.png")
            }
            
        }).catch(function (e) {
            console.log("error" + e);
        })
}

function loadLogoutButtonProfile() {
    $("#option-logout").on("click", () => {
        logout()
    })
}

$(document).ready(function () {
    loadButtonProfile()
    loadLogoutButtonProfile()
});