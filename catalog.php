<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');

    //создание фильтра по колонке category_id из таблицы core_goods и таблицы categories с использованием класса Category 
    if (isset($_GET['category_id'])) {
        $category = new \Project\Core\Category($_GET['category_id']);
        $cat_name = $category->getField('title');
    } else {
        $cat_name = 'Все товары';
    }

/*
    //создание фильтра по колонке category_id из таблицы core_goods
    if (isset($_GET['category_id']) && $_GET['category_id'] == 1) {  //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
        $cat_name = 'Женщинам';
    } elseif (isset($_GET['category_id']) && $_GET['category_id'] == 2) {  //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
        $cat_name = 'Мужчинам';
    } elseif (isset($_GET['category_id']) && $_GET['category_id'] == 3) {  //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
        $cat_name = 'Детям';
    } else {
        $cat_name = 'Все товары';
    }
*/
    //var_dump($_GET);
?>

<div class="wrapper nav padding-30 text-up text-12px"><a class="text-12" href="index.php">Главная</a> / <a  href="catalog.php">Каталог</a> / <?= $cat_name ?></div>
<div class="wrapper text-align-center">
    <h1 class="text-up"><?= $cat_name ?></h1>
    <p class="text-i">Все товары</p>
    <?//var_dump($_GET);?>
    <div class="filters flex-box justify-content-center text-i nav-i">
        <div class="padding-10">          
            <div class="filters-btn">Категории</div>
            <div class="display-none z-index-1">
                <ul>
                    <li><a href="?type_id=1 <?= isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '' ?>">Куртки</a></li>
                    <li><a href="?type_id=2 <?= isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '' ?>">Джинсы</a></li>
                    <li><a href="?type_id=3 <?= isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '' ?>">Обувь</a></li>
                </ul>
            </div>
        </div>
        <div class="padding-10">
            <div class="filters-btn">Размер</div>
            <div class="display-none z-index-1">
                <ul>
                    <li><a href="?type_id=1 <?= isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '' ?>">Куртки</a></li>
                    <li><a href="?type_id=2 <?= isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '' ?>">Джинсы</a></li>
                    <li><a href="?type_id=3 <?= isset($_GET['category_id']) ? '&category_id=' . $_GET['category_id'] : '' ?>">Обувь</a></li>
                </ul>
            </div>
        </div>
        <div class="padding-10">
            <div class="filters-btn">Стоимость</div>
            <div class="display-none z-index-1 text-14px">
                <ul>
                    <li><a href="">0-1000 руб.</a></li>
                    <li><a href="">1000-3000 руб.</a></li>
                    <li><a href="">3000-6000 руб.</a></li>
                    <li><a href="">6000-20000 руб.</a></li>
                </ul>
            </div>
        </div>
<!--    
        <div class="padding-10">Категория</div>
        <div class="padding-10">Размер</div>
        <div class="padding-10">Стоимость</div>
-->
    </div>
</div>
<!--подгрузка товаров-->
<div id="catalog" class="wrapper"></div>
<!--пагинация-->
<div class="pagination flex-box justify-content-center">
    <?php
        //подключение файла
        $connect = new \Project\Core\Connect();

        //фильтрация по категориям
        $category_str = '';  //вспомогательная строка для категории чтобы при клике в ячейки пагинации не выкидывало на - Все товары
        $type_str = '';  //вспомогательная строка для типов
        $filter = ''; //убираем Notice: Undefined variable: filter in ...
        if (isset($_GET['category_id']) && $category_id = $_GET['category_id']) { //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
            $filter .= " AND category_id=$category_id";
            $category_str = "&category_id=$category_id";
        }

        //фильтрация по типу товара
        if (isset($_GET['type_id']) && $type_id = $_GET['type_id']) {
            $filter .= " AND type_id=$type_id";
            $type_str = "&type_id=$type_id";
        }
        
        //запрос к DB с подсчетом количества id и записью в переменную num
        $result = mysqli_query($connect->getConnection(), "SELECT COUNT(id) as num FROM core_goods WHERE id>0 $filter" );
        //создание ассоциативного массива с данными из DB
        $info = mysqli_fetch_assoc($result);
        //в переменную помещаем данные из массива с ключом num
        $amount = $info['num'];
        $per_page = 4;
        $pages_amount = ceil($amount / $per_page); //ceil округляет в большую сторону

        //выделение в пагинации активной страницы
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
    ?>
    <?php for ($i = 1; $i <= $pages_amount; $i++): ?>
    <div class="amount padding-10 nav-white<? if($i == $page) { ?> page-active nav <? } ?>">
        <a href="?page=<?= $i ?><?= $category_str ?><?= $type_str ?>">
            <?= $i ?>    
        </a>
        </div>
    <?php endfor; ?>
</div>
<!--
<div class="flex-box justify-content-center">
    <div class="padding-10 amount">1</div>
    <div class="padding-10">2</div>
    <div class="padding-10">3</div>
    <div class="padding-10">4</div>
</div>
-->
<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>