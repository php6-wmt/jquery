<?php
require_once('functionall.php');

switch ($_POST['flag']){
    case 'insert':
        $table = $_POST['table'];
        $UserName = $_POST['UserName'];
        $Email = $_POST['Email'];
        $data = array(
            "UserName" => $UserName,
            "Email" => $Email

        );
        echo insert($table, $data);
        break;
    case 'delete':
        $UserId= $_POST['UserId'];
        $table = $_POST['table'];

        echo delete($table, $UserId);
        break;
    case 'update':

        $UserId = $_POST['array'][0]['value'];
        $table = $_POST['table'];
        $Email = $_POST['array'][2]['value'];
        $UserName = $_POST['array'][1]['value'];
        $data = array(
            "UserId" => $UserId,
            "Email" => $Email,
            "UserName" => $UserName
        );
        echo update($table,$UserId,$data);
        break;
}
   /* if($_POST['flag'] == 'insert')
    {
        $table = $_POST['table'];
        $UserName = $_POST['UserName'];
        $Email = $_POST['Email'];
        $data = array(
            "UserName" => $UserName,
            "Email" => $Email

        );
        echo insert($table,$data);
    }
    if($_POST['flag'] == 'delete')
    {
        $UserId= $_POST['UserId'];
        $table = $_POST['table'];
        echo delete($table, $UserId);
    }
if($_POST['flag'] == 'update') {

    $UserId = $_POST['array'][0]['value'];
    $table = $_POST['table'];
    $Email = $_POST['array'][2]['value'];
    $UserName = $_POST['array'][1]['value'];
    $data = array(
        "UserId" => $UserId,
        "Email" => $Email,
        "UserName" => $UserName
    );


    echo update($table,$UserId, $data);
    }*/

/*if ($_POST['flag'] == 'find') {
   $id = $_POST['id'];
   $idPass = "id=".$id;
   $table = $_POST['table'];
   echo find($table, $idPass);
}

if($_POST['flag'] == 'update') {
   $id = $_POST['id'];
   $table = $_POST['table'];
   $email = $_POST['email'];
   $name = $_POST['name'];
   $username = $_POST['username'];
   $data = array(
       "name" => "$name",
       "email" => "$email",
       "username" => "$username"
   );
   echo update($table, $id, $data);
}*/
