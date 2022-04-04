function loadModalShow() {
    $(".btn-show").on("click", function () {
        var id = this.getAttribute('data-id');
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'module/car/controller/controller_car.php?op=read_modal&id=' + id,
            //////
        }).done(function (data) {

                $('#modalShow').empty();
                $('#modalShow').addClass('car-modal');
                $('<div></div>').attr('id', 'modal-content-show').addClass('modal-content').appendTo('#modalShow');
                $('<div></div>').attr('id', 'modal-header-show').addClass('modal-header success').appendTo('#modal-content-show');
                $('<h2>Vista del coche</h2>').appendTo('#modal-header-show');
                $('<span>&times;</span>').attr('id', 'modalClose').addClass('close').appendTo('#modal-header-show');
                $('<div></div>').addClass('linebr').appendTo('#modal-content-show');
                $('<div></div>').attr('id', 'rowk').addClass('rowk').appendTo('#modal-content-show');
                $('<div></div>').attr('id', 'img').addClass('img').appendTo('#rowk');
                $('<img>').attr('src', 'https://picsum.photos/200').appendTo('#img');
                $('<div></div>').attr('id', 'modalshowbody').addClass('modal-body').appendTo('#rowk');
                $('<div></div>').attr('id', 'modal-footer').addClass('modal-footer success').appendTo('#modal-content-show');
                var overview;
            $('#modalshowbody').html(function () {
                var content = "";


                for (row in data) {
                    if (row != "id" && row != "overview" && row != "created_at" && row != "updated_at") {
                        // content += '<br><span>' + row + ': <span id =' + row + '>' + data[row] + '</span></span>';
                        content += '<div class="el">' + row + ': <span>' + data[row] + '</span></div>';
                    } else if(row == "overview") {
                        overview = '<div class="ov">' + data[row] + '</div>';
                    }
                }

                return content;
            });
            $('#modal-footer').html(overview)
            $("#modalShow").addClass("active");
            closeModalShow();
        })
    });


}
function closeModalShow() {
    $("#modalClose").on("click", function () {
        $("#modalShow").removeClass("active");
    })
}
$(document).ready(function () {
    loadModalShow();
});