<?php

require_once('Connection.php');
function insert($table, $data)
{
    $Conn = new Connection();
    $Connection = $Conn->Connection;

    $row = "";
    $value = "";
    $count = 1;
    foreach ($data as $key => $key_value) {

        if ($count == 1) {
            $row .= $key;
            $value .= "'" . $key_value . "'";
        } else {
            $row .= "," . $key;
            $value .= "," . "'" . $key_value . "'";
        }
        $count++;
    }


    $query = "INSERT INTO $table($row) VALUES ($value)";
    $result=$Connection->query($query);
    if ($result)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}
function delete($table, $UserId) {
    $Conn = new Connection();
    $Connection = $Conn->Connection;

    $query = "DELETE FROM $table WHERE UserId = '$UserId' ";
    $result = $Connection->query($query);
    if($result) {
        return 1;
    }
    else {
        return 0;
    }
}
function display(){
    $Conn = new Connection();
    $Connection = $Conn->Connection;

    $query = "SELECT * FROM user ";

    $result = $Connection->query($query);
    return $result;

}
function update($table,$UserId,$data) {

    $Conn = new Connection();
    $Connection = $Conn->Connection;
    $result = "";
    $count = 1;
    foreach ($data as $key => $key_value) {
        if($count == 1) {
            $result .= $key."="."'".$key_value."'";

        }
        else {
            $result .= ",".$key."="."'".$key_value."'";

        }
        $count++;
    }
    $sql = "Update $table SET $result WHERE UserId= '$UserId'";
    $result = $Connection->query($sql);
    if($result) {
        return '1';
    }
    else {
        return '0';
    }
}
?>





