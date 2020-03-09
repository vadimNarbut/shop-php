<?php

session_start();

require "includes/config.php";

// echo "<pre>";
// echo print_r($GLOBALS);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php echo $config['tittle'] ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="media/css/style.css">
  <link rel="stylesheet" href="media\css\custom.css">

</head>

<body>

  <div id="wrapper">

    <?php include "includes/header.php"; ?>

    <div class="mini-cart">
      <div class="mini-cart-items">

      </div>
    </div>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/articles.php?page=1">Все записи</a>


              <h3>Новейшее_в_магазине</h3>
              <div class="block__content">
                <div class="mini-cart"></div>
                <div class="articles articles__horizontal">
                  <!-- <article class="article"> -->
                  <!-- <div class="cart">
                      <p class="name"></p>
                      <img src="" alt="">
                      <div class="cost"></div>
                      <button class="add-to-cart">Купить</button>
                    </div> -->

                  <!-- <main>
                      
                      <div class="goods-out"></div>
                    </main> -->
                  <!-- </article> -->

                  <?php
                  $products = mysqli_query($connection, "SELECT * FROM `products` ORDER BY `pub_date` DESC LIMIT 10");
                  ?>
                  <?php
                  while ($prod = mysqli_fetch_assoc($products)) {
                  ?>

                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/<?php echo $prod['image'] ?>);"></div>
                      <div class="article__info">
                        <a href="/article.php?id=<?php echo $prod['id']; ?>"><?php echo $prod['name']; ?></a>
                        <div class="article__info__meta">
                          <?php
                          $prod_cat = false;
                          foreach ($categories as $cat) {
                            if ($cat['id'] == $prod['categorie_id']) {
                              $prod_cat = $cat;
                              break;
                            }
                          }
                          ?>
                          <small>Категория: <a href="/article.php?categorie=<?php echo $prod_cat['id']; ?>"><?php echo $prod_cat['name']; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr($prod['description'], 0, 50, 'utf-8'); ?></div>
                      </div>
                      <!-- <a href="/index.php?id=<?php echo $prod['id']; ?>">Добавить в ввв </a> -->
                      <?
                      if (isset($_SESSION['autorize']['login'])) {
                        echo "<button class='add-to-cart' data-id=" . $prod['id'] . ">Купить</button>";
                      }
                      ?>
                    </article>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>


            <div class="block">
              <a href="/article.php?categorie=5">Все записи</a>
              <h3>Телефоны [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                  $products = mysqli_query($connection, "SELECT * FROM `products` WHERE `categorie_id` = 1 ORDER BY `id` DESC LIMIT 10");

                  ?>

                  <?php
                  while ($prod = mysqli_fetch_assoc($products)) {
                  ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/<?php echo $prod['image'] ?>);"></div>
                      <div class="article__info">
                        <a href="/atricle.php?id=<?php echo $prod['id']; ?>"><?php echo $prod['name']; ?></a>
                        <div class="article__info__meta">
                          <?php
                          $prod_cat = false;
                          foreach ($categories as $cat) {
                            if ($cat['id'] == $prod['categorie_id']) {
                              $prod_cat = $cat;
                              break;
                            }
                          }
                          ?>
                          <small>Категория: <a href="/article.php?categorie=<?php echo $prod_cat['id']; ?>"><?php echo $prod_cat['name']; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr($prod['description'], 0, 50, 'utf-8'); ?></div>
                      </div>
                      <?
                      if (isset($_SESSION['autorize']['login'])) {
                        echo "<button class='add-to-cart' data-id=" . $prod['id'] . ">Купить</button>";
                      }
                      ?>
                    </article>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/article.php?categorie=4">Все записи</a>
              <h3>Телевизоры [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                  $products = mysqli_query($connection, "SELECT * FROM `products` WHERE `categorie_id` = 2 ORDER BY `id` DESC LIMIT 10");
                  ?>

                  <?php
                  while ($prod = mysqli_fetch_assoc($products)) {
                  ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/<?php echo $prod['image'] ?>);"></div>
                      <div class="article__info">
                        <a href="/article.php?id=<?php echo $prod['id']; ?>"><?php echo $prod['name']; ?></a>
                        <div class="article__info__meta">
                          <?php
                          $prod_cat = false;
                          foreach ($categories as $cat) {
                            if ($cat['id'] == $prod['categorie_id']) {
                              $prod_cat = $cat;
                              break;
                            }
                          }
                          ?>
                          <small>Категория: <a href="/article.php?categorie=<?php echo $prod_cat['id']; ?>"><?php echo $prod_cat['name']; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr($prod['description'], 0, 50, 'utf-8'); ?></div>
                      </div>
                      <?
                      if (isset($_SESSION['autorize']['login'])) {
                        echo "<button class='add-to-cart' data-id=" . $prod['id'] . ">Купить</button>";
                      }
                      ?>

                    </article>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
            <?php include "includes/sidebar.php"; ?>
          </section>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php"; ?>


  </div>


  <script src="media\js\jquery-3.3.1.min.js"></script>
  <script src="media\js\main.js"></script>
</body>

</html>