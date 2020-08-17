<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/head_doctype.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/header.php');
?>

<div class="wrapper">ГЛАВНАЯ / МУЖЧИНАМ</div>
<div class="wrapper text-align-center">
    <h1>МУЖЧИНАМ</h1>
    <p>Все товары</p>
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