<?php

require_once "../includes/config.php";

if (isset($_POST["id"])) {

    // Формируем массив для JSON ответа
    $result = array(
        'id' => $_POST['id'],
        'position' => $_POST['position']

    );
    echo json_encode($result);
}

$update = "UPDATE users SET position = '" . $_POST['position'] . "' WHERE user_id = " . $_POST['id'];
mysqli_query($connection, $update);
