<?php
require "includes/config.php";
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
    <!-- paginator -->
    <link rel="stylesheet" type="text/css" href="media/css/paginator.css">
</head>

<body>

    <div id="wrapper">

        <?php include "includes/header.php"; ?>

        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                            <a href="/article.php">Все записи</a>
                            <h3>Новейшее_в_блоге</h3>
                            <div class="block__content">
                                <div class="articles articles__horizontal">

                                    <?php

                                    $products = mysqli_query($connection, "SELECT * FROM `shop(php)`.products WHERE `categorie_id` = " . (int) $_GET['categorie']);

                                    while ($prod = mysqli_fetch_assoc($products)) {
                                        if (count($prod) > 0) { ?>
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
                                            </article>
                                        <?php } else {
                                            echo "товаров нет";
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>

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

</body>

</html>