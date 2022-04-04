<div class="">
    <h1>Informacion del Coche</h1>
    <table border="2">
        <tr>
            <td data-tr="Mark"> </td>
            <td>
                <?php
                    echo $car->mark;
                ?>
            </td>
        </tr>
        <tr>
            <td data-tr="Model"></td>
            <td>
                <?php
                    echo $car->model;
                ?>
            </td>
        </tr>
        <tr>
            <td>CV: </td>
            <td>
                <?php
                    echo $car->cv;
                ?>
            </td>
        </tr>
        <tr>
            <td data-tr="Manufacturing date"></td>
            <td>
                <?php
                    $date = explode("/", $car->manufacturingdate);
                    echo $date[2];
                ?>
            </td>
        </tr>
        <tr>
            <td>KM: </td>
            <td>
                <?php
                    echo $car->km;
                ?>
            </td>
        </tr>
        <tr>
            <td>Actions: </td>
            <td>
                <a class="" id="btn-delete">Delete</a>
                <a class="" href="index.php?module=car&op=update&id=<?=$car->id?>">Update</a>
            </td>
        </tr>
    </table>
    <p><a href="index.php?module=car&op=list">Volver</a></p>
</div>

<!-- The Modal -->
<div id="modalDelete" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header error">
        <h2 data-tr="Delete Car"></h2>
        <span class="close">&times;</span>
    </div>
    <div class="modal-body">
        <p data-tr="Do you want to delete this car?"></p>
        <form action="index.php?module=car&op=delete&id=<?=$car->id?>" method="post" id="deleteCar" name="deleteCar">
            <input class="btn btn-danger" name="delete" type="submit" value="Eliminar"/>
        </form>
    </div>
    <div class="modal-footer error">
    </div>
  </div>

</div>

<script src="module/car/view/read_car.js"></script>