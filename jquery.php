<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php demo</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row" id="reloadpage">
        <form class="form-horizontal col-md-6" method="POST" id="FORM_ID">
            <fieldset>

                <!-- Form Name -->
                <h1>my form</h1>

                <!-- name-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="UserName">Enter name</label>
                    <div class="col-md-12">
                        <input id="a1" name="UserName" type="text" class="form-control input-md" >

                    </div>
                </div>

                <!-- email-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Email">enter email</label>
                    <div class="col-md-12">
                        <input id="a2" name="Email" type="text" class="form-control input-md" >

                    </div>
                </div>

                <!-- submit Button -->
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="submit" value="Submit">
                    </div>
                </div>

            </fieldset>
        </form>

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



            <!-- Modal -->
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" id="mdlform">

                                <fieldset>
                                    <input type="hidden" id="mdlid" name="UserId">
                                    <!-- name-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Enter name</label>
                                        <div class="col-md-12">
                                            <input id="mdlid1" name="UserName" type="text" class="form-control input-md" >
                                        </div>
                                    </div>

                                    <!-- email-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="textinput">Enter email</label>
                                        <div class="col-md-12">
                                            <input id="mdlid2" name="Email" type="text" class="form-control input-md" >
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>


                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="insert.js"></script>
</body>
</html>