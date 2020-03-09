<?

session_start();
require_once "../includes/config.php";

if (!($_SESSION['autorize']['position'] == 'admin')) {
    header("Location: ../index.php");
}

$users =  mysqli_query($connection, "SELECT * FROM users");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <div class="prod__admin">
        <div class="goods-out"></div>

        <h2>Товар</h2>
        <div class="prod__attributes">
            <div class="prod__attribute">
                <p>Имя: <input type="text" id="gname"></p>
            </div>
            <div class="prod__attribute">
                <p>Стоимость: <input type="text" id="gcost"></p>
            </div>
            <div class="prod__attribute">
                <p>Изображение: <input type="text" id="img"></p>
            </div>
            <div class="prod__attribute">
                <p>Номер категории: <input type="text" id="gcategory_numb"></p>
            </div>
            <div class="prod__attribute">
                <p>Описание: <textarea id="gdescr" cols="30" rows="10"></textarea></p>
            </div>
            <div class="prod__attribute">
                <p>Дата публикации: <input type="text" id="gpubdate"></p>
            </div>
            <div class="prod__attribute">
                <p>Количество заказов: <input type="text" id="gorders_count"></p>
            </div>
            <div class="prod__attribute">
                <p>Количество просмотров: <input type="text" id="gviews"></p>
            </div>

            <input type="hidden" id="gid">
            <button class="add-to-db">Обновить</button>
        </div>
    </div>

    <div class="user__admin">
    <h2>Пользователи</h2>
        <div class="user__admin__items">
            <? foreach($users as $user) { ?>
            <div class="user__admin__item" >
                <div class="first__col">
                    <div class="user__item__name">
                        <span>Логин: <?= $user['user_login'] ?></span>
                    </div>
                    <div class="user__item__post">
                        <span>Должность: <?= $user['position'] ?></span>
                    </div>
                </div>
                <div class="second__col">
                    <a href="userDescription.php?id=<?=$user['user_id']?>">More about user</a>
                    <a href="userDropData.php?id=<?= $user['user_id'] ?>">delete</a>
                </div>
            </div>
            <? } ?>
        </div>

    </div>

    <script src="js\jquery-3.3.1.min.js"></script>
    <script src="js\admin.js"></script>
</body>


</html>