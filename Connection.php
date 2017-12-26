<?php

class Connection
{

    private $DB_SERVER = "localhost";
    private $DB_USERNAME = "root";
    private $DB_PASSWORD = "";
    private $DB_DATABASE = "jquery";
    public $Connection = "";
    public function __construct()
        {

            $this->Connection = mysqli_connect($this->DB_SERVER, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_DATABASE) or
            die('database is not connected'.mysqli_connect_error());
        }
}
?>