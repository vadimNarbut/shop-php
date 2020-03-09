<?

session_start();
// Страница регистрации нового пользователя
// Соединямся с БД
require "includes/config.php";

if (isset($_POST['submit'])) {
    $err = [];

    // проверям логин
    if (!preg_match("/^[a-zA-Z0-9]+$/", $_POST['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if (strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($connection, "SELECT user_id FROM users WHERE user_login='" . mysqli_real_escape_string($connection, $_POST['login']) . "'");
    if (mysqli_num_rows($query) > 0) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if (count($err) == 0) {

        $login = $_POST['login'];

        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));

        mysqli_query($connection, "INSERT INTO users SET user_login='" . $login . "', user_password='" . $password . "'");

        // Вытаскиваем из БД запись, у которой логин равняеться введенному
        $query = mysqli_query($connection, "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($connection, $_POST['login']) . "' LIMIT 1");
        $data = mysqli_fetch_assoc($query);

        // Ставим скссию
        $_SESSION['autorize']['login'] = $_POST['login'];
        $_SESSION['autorize']['id'] = $data['user_id'];

        header("Location: index.php");
        exit();
    } else {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach ($err as $error) {
            print $error . "<br>";
        }
    }
}




?>

<link rel="stylesheet" type="text/css" href="media/css/register.css">

<div class="register">
    <form class="input__items" method="POST">
        <p><input class="login" name="login" type="text" required title="Ведите ваш Логин" placeholder="Ваш логин"></p>
        <p><input class="password" name="password" type="password" required title="Введите ваш пароль" placeholder="Ваш пароль"></p>

        <input class="btn" name="submit" type="submit" value="Зарегистрироваться">
    </form>
</div>