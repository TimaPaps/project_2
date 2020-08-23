<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/head_doctype.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');

    //создание фильтра по колонке categori_id из таблицы core_goods
    if (isset($_GET['category_id']) && $_GET['category_id'] == 1) {  //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
        $cat_name = 'Женщинам';
    } elseif (isset($_GET['category_id']) && $_GET['category_id'] == 2) {  //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
        $cat_name = 'Мужчинам';
    } elseif (isset($_GET['category_id']) && $_GET['category_id'] == 3) {  //isset($_GET['category_id']) --- убирает Notice: Undefined index: category_id in ...
        $cat_name = 'Детям';
    } else {
        $cat_name = 'Все товары';
    }
    //var_dump($_GET);
?>

<div class="wrapper">Главная / <?= $cat_name ?></div>
<div class="wrapper text-align-center">
    <h1><?= $cat_name ?></h1>
    <p>Все товары</p>
    <?//var_dump($_GET);?>
    <div class="flex-box justify-content-center">
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
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php');
?>