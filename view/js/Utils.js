function ajaxPromise(sUrl, sType, sTData, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            type: sType,
            dataType: sTData,
            data: sData,
            headers: {
                token: localStorage.getItem('token') || false
            }
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        });
    });
}

function ajaxPromiseSH(sUrl, sType, sTData, sData = undefined) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: sUrl,
            type: sType,
            dataType: sTData,
            data: sData
        }).done((data) => {
            resolve(data);
        }).fail((jqXHR, textStatus, errorThrow) => {
            reject(errorThrow);
        });
    });
}

function logout() {
    var conf = {}
    conf.url = "module/auth/controller/controller_auth.php?op=logout"
    ajaxPromise(conf.url, 'POST', 'json')
        .then(function (data) {
            alertify.success('Se ha cerrado sesion', 3)
            setTimeout(() => {
                window.location.href = '?module=auth';
            }, 3000);
            localStorage.removeItem('token')
        }).catch(function (e) {
            console.log("error" + e);
        })
}