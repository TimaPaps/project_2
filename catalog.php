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

<div class="wrapper nav margin-left-30 text-up text-12px"><a class="text-12" href="index.php">Главная</a> / <a  href="catalog.php">Каталог</a> / <?= $cat_name ?></div>
<div class="wrapper text-align-center">
    <h1 class="text-up"><?= $cat_name ?></h1>
    <p class="text-i">Все товары</p>
    <?//var_dump($_GET);?>
    <div class="flex-box justify-content-center text-i">
        <div class="padding-10">Категория</div>
        <div class="padding-10">Размер</div>
        <div class="padding-10">Стоимость</div>
    </div>
</div>
<div id="catalog" class="wrapper"></div>
<div class="flex-box justify-content-center">
    <div class="padding-10">1</div>
    <div class="padding-10">2</div>
    <div class="padding-10">3</div>
    <div class="padding-10">4</div>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>