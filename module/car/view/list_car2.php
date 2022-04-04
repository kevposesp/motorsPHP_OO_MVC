<div class="list_car">
    <!-- <div class="title">
        <h3>LISTA DE COCHES</h3>
    </div> -->
    <p><a href="index.php?module=car&op=create" data-tr="Create"></a></p>
    <p><a href="index.php?module=car&op=create_dummies" data-tr="Create Dummies"></a></p>
    <p><a href="index.php?module=car&op=delete_all" data-tr="Delete Cars"></a></p>
    <div class="list">
        <?php
        if ($rdo->num_rows === 0) :
            echo "<div class='msg' data-tr='There is no available cars.'>No hay coches en este momento</div>";
        else :
            foreach ($rdo as $row) :

        ?>
                <div class="col-xs-1 col-sm-3 col-md-4 ccc">
                    <img class="btn-show" src="view/icons/eye.svg" data-id="<?= $row['id'] ?>" alt="">
                    <a class="link-card" href="index.php?module=car&op=read&id=<?= $row['id'] ?>">
                        <div class="card">
                            <div class="img">
                                <img src="https://picsum.photos/200" alt="">
                            </div>
                            <div class="content-card">
                                <div class="text">
                                    <!-- <p><?= $row['mark'] ?> <?= $row['model'] ?></p> -->
                                    <?= $row['mark'] ?> <?= $row['model'] ?>
                                </div>
                                <div class="precio">
                                    <div class="actual">
                                        10000 €
                                    </div>
                                </div>
                            </div>
                            <div class="linebr"></div>
                            <div class="footer-card">
                                <div class="element">
                                    <div class="dat">
                                        <?= $row['km'] ?>
                                    </div>
                                    <div class="icon">
                                        <img class="" src="view/icons/road.svg" alt="" />
                                    </div>
                                </div>
                                <div class="element">
                                    <div class="dat">
                                        <?= $row['cv'] ?>
                                    </div>
                                    <div class="icon">
                                        <img class="" src="view/icons/cv.svg" alt="" />
                                    </div>
                                </div>
                                <div class="element">
                                    <div class="dat">
                                        <!-- <?= $row['manufacturingdate'] ?> -->
                                        <?php
                                        $date = explode("/", $row['manufacturingdate']);
                                        echo $date[2];
                                        ?>
                                    </div>
                                    <div class="icon">
                                        <img class="" src="view/icons/calendar.svg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</div>

<!-- The Modal -->
<div id="modalShow" class="modal"></div>
    <!-- Modal content -->
    <!-- <div id="modal-content-show" class="modal-content">
        <div id="modal-header-show" class="modal-header success">
            <h2>Vista del coche</h2>
            <span id="modalClose" class="close">&times;</span>
        </div>

        <div class="modal-body" id="modalshowbody">
        </div>

        <div class="modal-footer success">
        </div>
    </div> -->

<!-- </div> -->

<script src="module/car/view/modal_car.js"></script>

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    let params = new URLSearchParams(location.search);
    var createact = params.get('act_c');
    var deleteact = params.get('act_d');
    var updateact = params.get('act_u');
    var dummiesact = params.get('act_dum');
    var daact = params.get('act_da');
    if (createact == "correct") {
        toastr.success("Creado correctamente!")
    }
    if (deleteact == "correct") {
        toastr.success("Eliminado correctamente!")
    }
    if (updateact == "correct") {
        toastr.success("Actualizado correctamente!")
    }
    if (dummiesact == "correct") {
        toastr.success("Dummies creadas correctamente!")
    } else if (dummiesact == "error") {
        toastr.error("Fallo al crear la dummies!")
    }
    if (daact == "correct") {
        toastr.success("Eliminados correctamente!")
    } else if (daact == "error") {
        toastr.error("Fallo al eliminar!")
    }
</script>