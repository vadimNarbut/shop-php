<?php

require "../includes/config.php";


function init($connection)
{

    $sql = "SELECT `id`, `name` FROM products";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $out[$row['id']] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($connection);
}

function selectOneGoods($connection)
{
    $id = $_POST['gid'];
    $sql = "SELECT * FROM products WHERE id = '$id' ";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "0";
    }
    mysqli_close($connection);
}

function updateGoods($connection)
{
    $id = $_POST['gid'];
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $img = $_POST['img'];
    $category_numb = $_POST['gcategory_numb'];
    $description = $_POST['gdescr'];
    $pubdate = $_POST['gpubdate'];
    $orders_count = $_POST['gorders_count'];
    $views = $_POST['gviews'];

    $sql = "UPDATE `shop(php)`.products SET name = '$name',price = '$cost', image = '$img' , categorie_id = '$category_numb' , 
    description = '$description', pub_date = '$pubdate' , orders_count = '$orders_count' , views = '$views'
    WHERE id = '$id' ";

    if ($connection->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "Error updating record: " . $connection->error;
    }
    mysqli_close($connection);
    // writeJSON($connection);
}

function newGoods($connection)
{
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $img = $_POST['img'];
    $category_numb = $_POST['gcategory_numb'];
    $description = $_POST['gdescr'];
    $pubdate = $_POST['gpubdate'];
    $orders_count = $_POST['gorders_count'];
    $views = $_POST['gviews'];

    $sql = "INSERT INTO `shop(php)`.products   (name, price, image, categorie_id, description, pub_date , orders_count, views)
    VALUES ('$name', '$cost', '$img', '$category_numb', '$description' , '$pubdate' , '$orders_count' , '$views')";

    if (mysqli_query($connection, $sql)) {
        echo "1";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
    // writeJSON($connection);
        
}

// function writeJSON($connection){
//     $sql = "SELECT * FROM `shop(php)`.products";
//     $result = mysqli_query($connection, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         $out = array();
//         while ($row = mysqli_fetch_assoc($result)) {
//             $out[$row['id']] = $row;
//         }
//         $a = file_put_contents('../goods.json',json_encode($out));
//         echo $a;
//     } else {
//         echo "0";
//     }
//     mysqli_close($connection);
// }
    


function loadGoods($connection){
    $sql = "SELECT * FROM `shop(php)`.products";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0){
        $out = array();
        while($row = mysqli_fetch_assoc($result)){
            $out[$row['id']] = $row;
        }
        echo json_encode($out);
    }else{
        echo "0";
    }
    mysqli_close($connection);
}
