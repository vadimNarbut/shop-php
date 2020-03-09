<?php 
$action = $_POST['action'];

require_once "function.php";

switch ($action){
    case 'init':
        init($connection);
    break;
    case 'selectOneGoods':
        selectOneGoods($connection);
    break;
    case 'updateGoods':
        updateGoods($connection);
    break;
    case 'newGoods':
        updateGoods($connection);
    break;
    case 'loadGoods':
        loadGoods($connection);
    break;
}