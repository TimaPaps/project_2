<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');

    $good = new \Project\Core\Good($_GET['id']);

    //создание фильтра по колонке category_id из таблицы core_goods и таблицы categories с использованием класса Category 
    $category = new \Project\Core\Category($good->getField('category_id'));
    $cat_name = $category->getField('title');

    $type = new \Project\Core\Type($good->getField('type_id'));
    $type_name = $type->getField('title');

?>

<div class="breadcrumbs wrapper nav padding-30 text-up text-12px">
    <a class="text-12" href="index.php">Главная</a> / <a href="catalog.php">Каталог</a> / <a href="catalog.php?category_id=<?= $good->getField('category_id') ?>"><?= $cat_name ?></a> / <a href="catalog.php?category_id=<?= $good->getField('category_id') ?> & type_id=<?= $good->getField('type_id') ?>"><?= $type_name ?></a> / <?= $good->title() ?>
</div>

<div class="item padding-30">
    <div class="item-photo">
        <img src="<?= $good->photo() ?>">
    </div>
    <div class="padding-10">
        <b>
            <?= $good->title() ?>
        </b>            
    </div>
    <div class="padding-10">
        Артикул: <?= $good->getField('article') ?>
    </div>
    <div class="padding-10">
        <?= $good->price() ?> руб.
    </div>
    <div class="padding-10">
        <?= $good->getField('description') ?>
    </div>
</div> 


<div class="wrapper nav padding-30 text-up text-12px"><a class="text-12" href="index.php">Главная</a> / <a  href="catalog.php">Каталог</a> / </div>
<div class="text-align-center">
    <div class="wrapper card-background-gray"></div>
    <div class="">
        <h1>Кеды с полоской</h1>
        <p>Артикул: 112233</p>
        <p>4500 руб.</p>
        <p>Отличные кеды из водонепроницаемого материала. Отличноподходят для любой погоды <br>
            приятно сидят на ноге, стильные и комфортные</p>
        <p>размер</p>
        <div></div>
        <input type="submit" value="добавить в корзину">
    </div>
</div>

<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>