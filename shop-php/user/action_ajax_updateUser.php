<?php

require_once "../includes/config.php";

if (isset($_POST["id"])) { 

	// Формируем массив для JSON ответа
    $result = array(
        'id' => $_POST['id'],
        'image' => $_POST['image'],
    	'name' => $_POST['name'],
        'login' => $_POST['login'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone']
    ); 
    echo json_encode($result); 
}

$update = "UPDATE users SET  user_login = '" . $_POST['login'] . "', `user_name` = '" . $_POST['name']  . "' , phone_number = '" . $_POST['phone'] . "', email = '" . $_POST['email']  . "' WHERE user_id = " . $_POST['id'];
    mysqli_query($connection, $update);
