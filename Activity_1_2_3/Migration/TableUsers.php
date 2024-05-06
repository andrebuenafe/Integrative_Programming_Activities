<?php
include_once "../database/dbConnection.php";

class Createtblusers extends Dbconnection{
    public function tblusers(){
        $this->conn->query("CREATE TABLE IF NOT EXISTS users (
            id int auto_increment primary key,
            fname varchar(255) not null,
            lname varchar(255) not null,
            email varchar(50) unique not null,
            password varchar(255) not null,
            token varchar(255) not null)");
    }
}
?>