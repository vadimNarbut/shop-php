var cart = {};

function loadCart() {
    //проверяю есть ли в localStorage запись cart
    if (localStorage.getItem('cart')) {
        // если есть - расширфровываю и записываю в переменную cart
        cart = JSON.parse(localStorage.getItem('cart'));
        showCart();
    } else {
        $('.main-cart').html(`<div class="empty__order">Корзина пуста!</div>`);
    }
}

function showCart() {
    //вывод корзины
    if (!isEmpty(cart)) {
        $('.main-cart').html(`<div class="empty__order">Корзина пуста!</div>`);
    } 
    else {
        $.getJSON('goods.json', function (data) {
            var goods = data;
            var out = '';
            for (var id in cart) {
                // out += `<div class="cart__item__description"><button data-id="${id}" class="del-goods">x</button>`;
                // out += `<div class="cart__item__visible"><img class="cart__image" src="static/images/${goods[id].img}">`;
                // out += `<span class="cart__text">${goods[id].name  }</span></div>`;
                // out += ` <div class="cart__changes__button"><button data-id="${id}" class="minus-goods">-</button>  `;
                // out += ` ${cart[id]}  `;
                // out += `  <button data-id="${id}" class="plus-goods">+</button>  `;
                // out += cart[id]*goods[id].cost;
                // out += '</div></div><br>';


                // out += `<div class="cart__items__description">`;
                // out += `<span class="cart__items__description__text"></span>`;
                // out += `<span class="cart__items__description__text">название</span>`;
                // out += `<span class="cart__items__description__text">количесво</span>`;
                // out += `<span class="cart__items__description__text">стоимость</span>`;
                // out += `</div>`;


                out += `<div class="cart__items">`;
                out += ` <div class="cart__item">`;
                out += `<img src="static/images/${goods[id].img}" alt="" class="cart__item__image">`;
                out += `<div class="cart__item__name">`;
                out += `<span class="cart__item__text__name">`;
                out += `${goods[id].name  }`;
                out += `</span>`;
                out += `</div>`;
                out += `<div class="cart__item__change__buttons">`;
                out += `<button class="minus-goods" data-id="${id}">-</button>`;
                out += `<span class="item__count">${cart[id]}</span>`;
                out += `<button class="plus-goods" data-id="${id}">+</button>`;
                out += `</div>`;
                out += `<div class="cart__item__cost">`;
                out += `<span class="cart__item__cost__text">`;
                out += cart[id]*goods[id].cost;
                out += `</span>`;
                out += `</div>`;
                out += `<button class="del-goods" data-id="${id}">X</button>`;
                out += `</div>`;
                out += `</div>`;
            }
            $('.main-cart').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus-goods').on('click', plusGoods);
            $('.minus-goods').on('click', minusGoods);
        });
    }
}

function delGoods() {
    //удаляем товар из корзины
    var id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showCart();
}

function plusGoods() {
    //добавляет товар в корзине
    var id = $(this).attr('data-id');
    cart[id]++;
    saveCart();
    showCart();
}

function minusGoods() {
    //уменьшаем товар в корзине
    var id = $(this).attr('data-id');
    if (cart[id] == 1) {
        delete cart[id];
    } else {
        cart[id]--;
    }
    saveCart();
    showCart();
}

function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('cart', JSON.stringify(cart)); //корзину в строку
}

function isEmpty(object) {
    //проверка корзины на пустоту
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;
}

function sendEmail() {
    var ename = $('#ename').val();
    var email = $('#email').val();
    var ephone = $('#ephone').val();
    if (ename != '' && email != '' && ephone != '') {
        if (isEmpty(cart)) {
            $.post(
                "core/mail.php", {
                    "ename": ename,
                    "email": email,
                    "ephone": ephone,
                    "cart": cart
                },
                function (data) {
                    if (data == 1) {
                        alert('Заказ отправлен');
                    } else {
                        alert('Повторите заказ');
                    }
                }
            );
        } else {
            alert('Корзина пуста');
        }
    } else {
        alert('Заполните поля');
    }

}


$(document).ready(function () {
    loadCart();
    $('.send-email').on('click', sendEmail); // отправить письмо с заказом
});