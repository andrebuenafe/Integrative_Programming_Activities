<?php
    include_once "../Controller/Usershandler.php";
    header('Content-Type: application/json');

    $get = $_GET; // Method
    $searchbyEmail = new Usershandler(); // From Class
    $data = $searchbyEmail->searchbyEmail($get); // From Function
    echo json_encode($data); // JSON Data
?>