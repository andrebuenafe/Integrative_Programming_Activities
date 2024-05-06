<?php
    include_once "../Controller/Usershandler.php";

    $insertUser = new Usershandler(); // From Class
    $data = $insertUser->insertUser($_POST); // From Function
    echo json_encode($data); // JSON Data
?>