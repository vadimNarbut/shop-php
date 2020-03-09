<?
session_start();

// Страница авторизации
// Функция для генерации случайной строки
function generateCode($length = 6)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
        $code .= $chars[mt_rand(0, $clen)];
    }
    return $code;
}

// Соединямся с БД
require "includes/config.php";

if (isset($_POST['submit'])) {
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($connection, "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($connection, $_POST['login']) . "' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if ($data['user_password'] === md5(md5($_POST['password']))) {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        if (!empty($_POST['not_attach_ip'])) {
            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
            $insip = ", user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";
        }

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($connection, "UPDATE users SET user_hash='" . $hash . "' " . $insip . " WHERE user_id='" . $data['user_id'] . "'");

        // Ставим скссию
        $_SESSION['autorize']['login'] = $_POST['login'];
        $_SESSION['autorize']['id'] = $data['user_id'];

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: index.php");
        exit();
    } else {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>


<link rel="stylesheet" type="text/css" href="media/css/register.css">

<div class="singUp">
    <form method="POST" class="input__items" >
        <p><input class="login" name="login" type="text" required title="Ведите ваш Логин" placeholder="Ваш логин"></p>
        <p><input class="password" name="password" type="password" required title="Введите ваш пароль" placeholder="Ваш пароль"></p>
        <p><input class="checkbox" type="checkbox" name="not_attach_ip"> Не прикреплять к IP(не безопасно)</p>
        <input class="btn" name="submit" type="submit" value="Войти">
    </form>
</div>