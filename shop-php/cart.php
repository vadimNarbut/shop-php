<?php

require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="media\css\cart.css">
</head>

<body>
    <header></header>
    <main>
        <div class="cart__items__description">
            <span class="cart__items__description__text"></span>
            <span class="cart__items__description__text">название</span>
            <span class="cart__items__description__text">количесво</span>
            <span class="cart__items__description__text">стоимость</span>
        </div>
        <div class="main-cart">

        </div>
        <!-- <div class="main-cart1">
            <div class="cart__items__description">
                <span class="cart__items__description__text"></span>
                <span class="cart__items__description__text">название</span>
                <span class="cart__items__description__text">количесво</span>
                <span class="cart__items__description__text">стоимость</span>
            </div>
            <div class="cart__items">
                <div class="cart__item">
                    <img src="static\images\samsung..jpg" alt="" class="cart__item__image">
                    <div class="cart__item__name">
                        <span class="cart__item__text__name">
                            samsung
                        </span>
                    </div>
                    <div class="cart__item__change__buttons">
                        <button class="minus__item">-</button>
                        <span class="item__count">123</span>
                        <button class="plus__item">+</button>
                    </div>
                    <div class="cart__item__cost">
                        <span class="cart__item__cost__text">123123</span>
                    </div>
                    <button class="del__item" data-id="${id}">X</button>
                </div>
            </div>
        </div> -->
        <div class="email-field">
            <input class="name__field" type="text" id="ename" placeholder="Ваше имя">
            <input class="email__field" type="text" id="email" placeholder="Ваш email">
            <input class="phone__field" type="text" id="ephone" placeholder="Ваш телефон">
            <button class="send-email">Заказать</button>
        </div>
    </main>
    <footer></footer>
    <script src="media\js\jquery-3.3.1.min.js"></script>
    <script src="media\js\cart.js"></script>
</body>

</html>