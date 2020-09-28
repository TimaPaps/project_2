<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Быстрый старт. Размещение интерактивной карты на странице</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <script src="https://api-maps.yandex.ru/2.1/?apikey=544ade45-1d2c-4332-b8ea-843121af5cad&lang=ru_RU" type="text/javascript">
        </script>
        <script type="text/javascript">
            ymaps.ready(init);

            function init(){
                let myMap = new ymaps.Map("map", {
                    center: [55.0450000, 60.1083300],
                    zoom: 10
                });

                //создание метки
                let myPlacemark = new ymaps.Placemark(
                    [55.0459, 60.1070000]
                );
                //добавление метки на карту
                myMap.geoObjects.add(myPlacemark);

                //создание метки
                let myPlacemark1 = new ymaps.Placemark(
                    [55.1500, 60.1100000]
                );
                //добавление метки на карту
                myMap.geoObjects.add(myPlacemark1);

            }

        </script>

        
    </head>

    <body>
        <div id="map" style="width: 600px; height: 400px"></div>
    </body>

</html>