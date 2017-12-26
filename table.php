<table id="table1" class="table table-striped table-dark" border="solis 2px" align="center">

    <thead>

    <th>UserName</th>
    <th>Email</th>
    <th>Delete</th>
    <td>Edit</td>
    </thead>
    <tbody id="tblbody">
    <?php
    require_once("Connection.php");
    require_once("functionall.php");
    $result =  display();
    while ($row = mysqli_fetch_array($result))
    {
        ?>
        <tr data-id="<?php echo($row[0]); ?>">
            <td id="tbl1"><?php echo($row[1]); ?></td>
            <td><?php echo($row[2]); ?></td>
            <td><button  style="background: darkgray" class="btndelete" id="<?php echo($row[0]); ?>">delete</button></td>
            <td><button type="button" class="btn btn-primary btnedit" id="<?php echo($row[0]); ?>" data-toggle="modal" data-target="#mymodal">Edit</button></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>