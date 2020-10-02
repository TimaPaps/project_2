        <footer class="wrapper flex-box footer-nav space-between">
            <div class="padding-30">
                <h3>КОЛЛЕКЦИИ</h3> 
                <?php
                //вывод в цикле ссылок на категории
                    $connect = new \Project\Core\Connect();
                    $categories = mysqli_query($connect->getConnection(), " SELECT * FROM categories ");
                    while ($category = mysqli_fetch_assoc($categories)) { 
                        //подсчет кол-ва товаров по категориям
                        $count = mysqli_query($connect->getConnection(), " SELECT COUNT(*) as num FROM core_goods WHERE category_id= " . $category['id']);
                        $info = mysqli_fetch_assoc($count);                
                ?>
                <a href="catalog.php?category_id=<?= $category['id'] ?>"><?= $category['title'] ?>(<?= $info['num'] ?>)</a>
                <?php } ?>
                <?php
                    $count = mysqli_query($connect->getConnection(), " SELECT COUNT(*) as num FROM core_goods WHERE is_new = 1 ");
                    $info = mysqli_fetch_assoc($count);
                ?>
                <a href="catalog.php?is_new=1">Новинки (<?= $info['num']?>)</a>
                <!--<div class="padding-5">Новинки (<?= $info['num']?>)</div>
                <a href="catalog.php?category_id=1">Женщинам</a>
                <a href="catalog.php?category_id=2">Мужчинам</a>
                <a href="catalog.php?category_id=3">Детям</a>
                <a href="#">Новинки</a>-->
            </div>
            <div class="padding-30">
                <h3>МАГАЗИН</h3>
                <a href="/yandex_map.php">О нас</a>
                <a href="#">Доставка</a>
                <a href="#">Работа с нами</a>
                <a href="#">Контакты</a>
            </div>
            <div class="padding-30">
                <h3>МЫ В СОЦИАЛЬНЫХ СЕТЯХ</h3>
                <p>Сайт разработан Папсуевым Т.В. <br> 
                под менторством INORDIC</p>
                <p>2020 © Все права защищены</p>
                <div class="flex-box">
                    <div class="facebook footer-social-icon"></div>
                    <div class="instagram footer-social-icon"></div>
                    <div class="linkedin footer-social-icon"></div>
                </div>
            </div>
        </footer>
    <script src="/js/script.js"></script>
</body>
</html>