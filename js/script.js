//AJAX запрос
function renderGoods() {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/system/controllers/goods/catalog/index.php';
    let str_get = window.location.search;
    url = url + str_get;
    //console.log(url);

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный)
    xhr.open('GET', url, true);
    //задание заголовков для http запроса (application/x-form-urlencode - для отправки из формы)
    xhr.setRequestHeader('content-type', 'application/x-form-urlencode');

    //при получении ответа на запрос
    xhr.onreadystatechange = function() {
        //если ответ положительный
        if(xhr.readyState == 4 && xhr.status == 200) {
            //alert('Ok');
            //делаем с ответом то что нам надо - ответ лежит в свойстве responseText этого объекта,т.е. верстка из .../catalog/index.php
            document.getElementById('catalog').innerHTML = xhr.responseText;
        }
    }

    xhr.send(null);
}

//показ гифки предзагрузки пока работает задержка времени для старта функции renderGoods
document.getElementById('catalog').innerHTML = `
                                                    <div class="flex-box justify-content-center">
                                                        <img src="/img/preloader.gif"/>
                                                    </div>
                                                `;
//задержка времени перед стартом функции renderGoods
setTimeout(function() {
    renderGoods();
}, 500);

//выпадающие фильтры товаров
let listObj = document.getElementsByClassName('filters-btn');
//console.log(listObj);

for (let i = 0; i < listObj.length; i++) {
    listObj[i].addEventListener('click', function() {
        let open = document.querySelectorAll('.display-none');
        //console.log(open);
        open[i].classList.toggle('display-block');
    });
}

//корзина
function toBasket() {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/system/controllers/basket/to_basket.php';
    let str_get = window.location.search;
    url = url + str_get;
    //console.log(url);

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный)
    xhr.open('GET', url, true);

    //при получении ответа на запрос
    xhr.onreadystatechange = function() {
        //если ответ положительный
        if(xhr.readyState == 4 && xhr.status == 200) {
            //alert('Ok');
            //делаем с ответом то что нам надо - ответ лежит в свойстве responseText этого объекта,т.е. верстка из .../catalog/index.php
            //alert(xhr.responseText);
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    }

    xhr.send(null);
}

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
    //console.log(url);

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный)
    xhr.open('GET', url, true);

    //при получении ответа на запрос
    xhr.onreadystatechange = function() {
        //если ответ положительный
        if(xhr.readyState == 4 && xhr.status == 200) {
            //alert('Ok');
            //делаем с ответом то что нам надо - ответ лежит в свойстве responseText этого объекта,т.е. верстка из .../catalog/index.php
            //alert(xhr.responseText);
            document.getElementById('basket-count').innerHTML = xhr.responseText;
        }
    }

    xhr.send(null);
}

//AJAX запрос для получения массива данных для отображения меток на картах яндекс и гугл
function getShops () {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/api/1.0/shops/get/all/index.php';

    //запуск метода open() для установки параметров запроса (метод GET, куда - HTTP....., если true - то запрос асинхронный, иначе запрос синхронный(для того чтобы сперва получить ответ, а потом продолжить выполнение кода JS))
    xhr.open('GET', url, false);
    //отправляем запрос
    xhr.send();

    //console.log(xhr.responseText);

    //при возвращении запроса происходит запись данных в свойство responseText из массива $arr файла api/1.0/shops/get/all/index.php
    return xhr.responseText;
}

//получение суммы товаров из корзины