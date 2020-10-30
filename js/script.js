//AJAX запрос - вывод товаров в каталоге
function renderGoods() {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/system/controllers/goods/catalog/index.php';
    let str_get = window.location.search;
    url = url + str_get;

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный)
    xhr.open('GET', url, true);
    //задание заголовков для http запроса (application/x-form-urlencode - для отправки из формы)
    xhr.setRequestHeader('content-type', 'application/x-form-urlencode');

    //при получении ответа на запрос
    xhr.onreadystatechange = function () {
        //если ответ положительный
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('catalog').innerHTML = xhr.responseText;
        }
    };

    xhr.send(null);
}

//показ гифки предзагрузки пока работает задержка времени для старта функции renderGoods
document.getElementById('catalog').innerHTML = `
                                                <div class="flex-box justify-content-center">
                                                    <img src="/img/preloader.gif"/>
                                                </div>
                                            `;
//задержка времени перед стартом функции renderGoods
setTimeout(function () {
    renderGoods();
}, 500);


//выпадающие фильтры товаров
let listObj = document.getElementsByClassName('filters-btn');
//console.log(listObj);

for (let i = 0; i < listObj.length; i++) {
    listObj[i].addEventListener('click', function () {
        let open = document.querySelectorAll('.display-none');
        //console.log(open);
        open[i].classList.toggle('display-block');
    });
}


//AJAX запрос - корзина - добавление товара
function toBasket() {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/system/controllers/basket/to_basket.php';
    let str_get = window.location.search;
    url = url + str_get;

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный)
    xhr.open('GET', url, true);

    //при получении ответа на запрос
    xhr.onreadystatechange = function () {
        //если ответ положительный
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    };

    xhr.send(null);
}


//AJAX запрос - корзина - удаление товара
function fromBasket() {
    //получаем id товара
    let id = event.target.getAttribute('data-id');

    //скрываем товар визуально
    event.target.closest('.basket-row').remove();

    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/system/controllers/basket/from_basket.php';
    let str_get = '?id=' + id;
    url = url + str_get;

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный)
    xhr.open('GET', url, true);

    //при получении ответа на запрос
    xhr.onreadystatechange = function () {
        //если ответ положительный
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    };

    xhr.send(null);
}


//AJAX запрос для получения массива данных для отображения меток на картах яндекс и гугл
function getShops() {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/api/1.0/shops/get/all/index.php';

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный(для того чтобы сперва получить ответ, а потом продолжить выполнение кода JS))
    xhr.open('GET', url, false);
    //отправляем запрос
    xhr.send();

    //при возвращении запроса происходит запись данных в свойство responseText из массива $arr файла api/1.0/shops/get/all/index.php
    return xhr.responseText;
}


//AJAX запрос - изменение суммы товаров в корзине при удалении товаров из корзины и при изменении способа доставки
function getSumm() {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/system/controllers/basket/get_summ.php';

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный)
    xhr.open( 'GET', url , true );

    //при получении ответа на запрос
    xhr.onreadystatechange = function () {
        //если ответ положительный
        if (xhr.readyState == 4 && xhr.status == 200) {
            //и не равен - 0
            if (Number(xhr.responseText) != 0) {
                let indexSelect = document.getElementById('delivery-select').options.selectedIndex;
                let priceDelivery = 500;

                //заменяю сумму
                document.getElementById('summ-one').innerHTML = xhr.responseText + ' руб.';
                document.getElementById('summ-two').innerHTML = xhr.responseText + ' руб.';
                if (indexSelect == 0) {
                    document.getElementById('summ-total').innerHTML = Number(xhr.responseText) + priceDelivery + ' руб.';
                    document.getElementById('delivery-price').innerHTML = '';
                    document.getElementById('delivery-price-ajax').innerHTML = `
                                                                                <div id="delivery-price" class="flex-box justify-content-center">
                                                                                    <p class="margin-0 padding-5 width-45 text-align-end">Доставка:</p>
                                                                                    <p class="margin-0 padding-5 width-45">500 руб.</p>
                                                                                </div>
                                                                            `;
                } else {
                    document.getElementById('summ-total').innerHTML = xhr.responseText + ' руб.';
                    document.getElementById('delivery-price').innerHTML = '';
                    document.getElementById('delivery-price-ajax').innerHTML = `
                                                                                <div id="delivery-price" class="flex-box justify-content-center">
                                                                                    <p class="margin-0 padding-5 width-45 text-align-end">Доставка:</p>
                                                                                    <p class="margin-0 padding-5 width-45">оплата при получении</p>
                                                                                </div>
                                                                            `;
                }
            } else {
                //убираю и заменяю элементы со страницы
                document.getElementById('reset').innerHTML = '';
                document.getElementById('summ-one-block').innerHTML = 'Ваша корзина пуста';
                document.getElementById('basket-delete').innerHTML = '';
                document.getElementById('summ-two-block').innerHTML = '';
                document.getElementById('delivery-price').innerHTML = '';
                document.getElementById('summ-total-block').innerHTML = '';
            }
        }
    };

    xhr.send(null);
}