<?php

session_start();

require_once "../includes/config.php";
require_once "./imageCheck.php";
require_once "./Check.php";

$sql = "SELECT * FROM users WHERE `user_id` = " . $_GET['id'];

$user = mysqli_fetch_array(mysqli_query($connection, $sql));

// echo "<pre>";
// echo print_r($user);
// echo "</pre>";
?>
<?php
require "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Блог IT_Минималиста!</title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <div id="wrapper">


        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                            <h3>Обо мне</h3>
                            <div class="block__content">
                                <!-- <form action="" method="post" enctype="multipart/form-data">
                                    
                                    <input type="file" name="image" id="image">
                                    <input type="submit" name="first" value="send">
                                </form> -->

                                <?php
                                // if(isset($_FILES['image'])){
                                //     $check = can_upload($_FILES['image']);

                                //     if($check === true){
                                //         make_upload($_FILES['image']);
                                //         echo "<strong>Файл успешно загружен!</strong>";
                                //     } else {
                                //         echo "<strong>$check</strong>";  
                                //     }
                                // }else{
                                //     echo "xyu";
                                // }

                                // if (count($_FILES)>0){
                                //     @move_uploaded_file($_FILES['image'], "/static/usersImages/");
                                // }
                                ?>


                                <br>
                                <!-- <img src="\static\usersImages\<?php echo $user['user_image'] ?>" alt=""> -->
                                <div class="full-text">
                                    <form method="post" id="ajax_form" action="">
                                        <div class="form__elems">

                                            <input class="form__elem" type="text" style="display: none" name="id" id="id" value="<?= $user['user_id'] ?>">


                                            <label for="">
                                                Ваше имя:
                                                <input class="form__elem" type="text" name="name" id="name" value="<?= $user['user_name'] ?>">
                                            </label>
                                            <br>
                                            <label for="">
                                                Ваше логин:
                                                <input class="form__elem" type="text" name="login" id="login" value="<?= $user['user_login'] ?>">
                                            </label>
                                            <br>
                                            <label for="">
                                                Ваш Email:
                                                <input class="form__elem four__elem" type="text" name="email" id="email" value="<?= $user['email'] ?>">
                                            </label>
                                            <br>
                                            <label for="">
                                                Ваш телефон:
                                                <input class="form__elem" type="text" name="phone" id="phone" value="<?= $user['phone_number'] ?>">
                                            </label>
                                            <br>


                                            <input class="form__btn" type="button" value="save" id="btn">
                                        </div>
                                    </form>
                                    <!-- <form method="post" id="ajax_form" action="">
                                        <input type="text" name="name" placeholder="NAME" /><br>
                                        <input type="text" name="phonenumber" placeholder="YOUR PHONE" /><br>
                                        <input type="button" id="btn" value="Отправить" />
                                    </form> -->
                                    <br>
                                    <div id="result_form"></div>

                                </div>
                            </div>
                        </div>

                        <?
                        // echo "<pre>";
                        // echo print_r($_POST);
                        // echo $_POST['image'];
                        // echo "</pre>";


                        // $update = "UPDATE users SET user_image = '" . $_POST['image'] . "' WHERE user_id = " . $_GET['id'];
                        // mysqli_query($connection, $update);

                        ?>


                    </section>
                    <section class="content__right col-md-4">
                        <?php include "../includes/sidebar.php"; ?>
                    </section>
                </div>
            </div>
        </div>

        <?php include "../includes/footer.php"; ?>
        <?php




        ?>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/ajaxUpdateUser.js"></script>

</body>

</html>