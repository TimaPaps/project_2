<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Мы на картах</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <?php

            require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
            include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
            include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');

        ?>

        <script src="https://api-maps.yandex.ru/2.1/?apikey=544ade45-1d2c-4332-b8ea-843121af5cad&lang=ru_RU" type="text/javascript"></script>

        <style type="text/css">
            /* Always set the map height explicitly to define the size of the div
            * element that contains the map. */
            #map {
                height: 60%;
            }
            /* Optional: Makes the sample page fill the window. */
            html,
            body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>

        <script type="text/javascript">
            ymaps.ready(init);

            function init(){
                let myMap = new ymaps.Map("map", {
                    center: [55.0450000, 60.1083300],
                    zoom: 8
                });

                //автоматическое создание меток
                //создание массива данных из таблицы в БД
                let points = JSON.parse(getShops());

                //в цикле перебираем массивы для подставления координат в метки и вывода меток на карту
                for (let i = 0; i < points.length; i++) {
                    //создание метки
                    let myPlacemark = new ymaps.Placemark(
                        [points[i].latitude, points[i].longitude],
                        {
                            hintContent: points[i].title,
                            balloonContent: '<b>' + points[i].title + '</b><div>' + points[i].adress + '</div><div>' + points[i].description + '</div><div><img class="geo-photo-size" src="' + points[i].photo + '"/></div>'
                        }
                    );

                //добавление метки на карту
                myMap.geoObjects.add(myPlacemark);
            }
        }
        </script>
        
    </head>

    <body class="wrapper">
        <div id="map" ></div>

        <?php

            include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');

        ?>

    </body>

</html>