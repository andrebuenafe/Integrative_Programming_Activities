<?php
    include_once "../Controller/Usershandler.php";
    header('Content-Type: application/json');

    $getallUsers = new Usershandler(); // From Class
    $data = $getallUsers->getallUsers(); // From Function
    echo json_encode($data); // JSON Data
?>