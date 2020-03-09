<?php

session_start();

if (!($_SESSION['autorize']['position'] == 'admin')) {
    header("Location: ../index.php");
}

require_once "../includes/config.php";

$sql = "SELECT * FROM users WHERE `user_id` = " . $_GET['id'];

$user = mysqli_fetch_array(mysqli_query($connection, $sql));

// echo "<pre>";
// echo print_r($user);
// echo "</pre>";


$positions = ['user', 'admin'];

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


    <div id="wrapper" style="width: 100%">


        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                            <h3>Обо мне</h3>
                            <div class="block__content">
                                <img src="/media/images/post-image.jpg">

                                <div class="full-text">

                                    <h1>
                                        <?= $user['user_name'] ?>
                                    </h1>
                                    <h1>
                                        <?= $user['email'] ?>
                                    </h1>
                                    <h1>
                                        <?= $user['phone_number'] ?>
                                    </h1>

                                    <form action="" method="post" id="ajax_form">
                                        <input style="visibility: hidden" type="text" name="id" id="id" value="<?= $user['user_id'] ?>">
                                        <select class="admin__select" name="position" id="position">
                                            <?php
                                            foreach ($positions as $pos) {
                                                if ($user['position'] = $pos) {
                                                    echo "<option selected  value=" . $user['position'] . ">" . $user['position'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $pos . ">" . $pos . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>



                                        <button id="btn">Отправить</button>

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



                    </section>
                    <section class="content__right col-md-4">
                        <?php include "../includes/sidebar.php"; ?>
                    </section>
                </div>
            </div>
        </div>

        <?php include "../includes/footer.php"; ?>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/ajaxUpdateUser.js"></script>

</body>

</html>