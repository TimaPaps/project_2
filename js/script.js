function renderGoods() {
    // создание нового экземпляра класса для запросов
    let xhr = new XMLHttpRequest();

    //формирование url
    let url = 'http://project_2/system/controllers/goods/catalog/index.php';
    let str_get = window.location.search;
    url = url + str_get;
    console.log(url);

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
document.getElementById('catalog').innerHTML = '<img src="/img/preloader.gif"/>';
//задержка времени перед стартом функции renderGoods
setTimeout(function() {
    renderGoods();
}, 1000);