<div class="list_errors">
    <div class="list">
        <?php
        if ($rdo->num_rows === 0) {
            echo "<div class='msg'>No hay errores en este momento</div>";
        } else {

        ?>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Origin</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rdo as $row) {

                        ?>

                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['type'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['origin'] ?></td>
                                <td><?= $row['created_at'] ?></td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</div>