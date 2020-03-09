<?
@session_start();

require_once "includes/config.php";


// echo "<pre>";
// echo print_r($_SESSION);
// echo "</pre>";


$sql = "SELECT * FROM users WHERE user_id = " . $_SESSION['autorize']['id'];
$name = @mysqli_fetch_array(mysqli_query($connection, $sql));

$_SESSION['autorize']['position'] = $name['position'];

?>
<header id="header">
  <!-- wonts avesome-->
  <script src="https://kit.fontawesome.com/02dd69479c.js" crossorigin="anonymous"></script>

  <div class="header__top">
    <div class="container">
      <div class="header__top__logo">
        <h1><?php echo $config['tittle'] ?></h1>
      </div>
      <nav class="header__top__menu">
        <ul>
          <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
          <li><a href="/">Главная</a></li>
          <li><a href="<?php echo $config['vk_url'] ?>" target="_blank">Я Вконтакте</a></li>
          <?
          if (isset($_SESSION['autorize']['position'])) {
            if ($_SESSION['autorize']['position'] == 'admin') {
          ?>
              <li><a href="admin\admin.php" id="LogOut">admin панель</a></li>
              <?
              echo "<li><a href='user/aboutUser.php?id=" . $_SESSION['autorize']['id'] .  "' >Привет, " . $_SESSION['autorize']['login'] . "</a></li>"; ?>
              <li><a href="/LogOut.php" id="LogOut">выйти</a></li>
            <?
            } else {
              echo "<li><a href='user/aboutUser.php?id=" . $_SESSION['autorize']['id'] .  "' >Привет, " . $_SESSION['autorize']['login'] . "</a></li>"; ?>
              <li><a href="/LogOut.php" id="LogOut">выйти</a></li>
            <?
            }
          } else { ?>
            <li><a href="/register.php">Регистрация</a></li>
            <li><a href="/login.php">Авторизация</a></li>
          <?
          }
          ?>

        </ul>
      </nav>
    </div>
  </div>

  <?php
  $categories = mysqli_query($connection, "SELECT * FROM `product_categories`");
  ?>
  <div class="header__bottom">
    <div class="container">
      <nav>
        <ul>
          <?php
          while ($cat = mysqli_fetch_assoc($categories)) {
          ?>
            <li><a href="/articles_category.php?categorie=<?php echo $cat['id']; ?>"><?php echo $cat['name'] ?></a></li>
          <?php
          }
          ?>
        </ul>
      </nav>
    </div>
  </div>
</header>

<script src="media\js\jquery-3.3.1.min.js"></script>
<script src="media\js\script.js"></script>

<?
