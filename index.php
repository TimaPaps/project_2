<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
/*
    require_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Connect.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/UnitActions.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Unit.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/ShowArticleInfo.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/Article.php');
*/
/*
//формирование sql запроса к DB (использование ключа($link) для проброса запроса в DB)
    $connect = new Connect();
    $result = mysqli_query($connect->getConnection(), "SELECT * FROM `core_articles`");
*/

//формирование sql запроса к DB (использование ключа($link) для проброса запроса в DB используя метод getElements из Unit.php)
$result = (new \Project\Core\Article())->getElements();

    include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header/index.php');
?>
<body>
    <main class="wrapper">
        <div class="text-align-center margin-top-60">
            <h1 class="text-up">Новые поступления весны</h1>
            <p class="text-i">Мы подготовили для Вас лучшие новинки сезона</p>
            <p class="btn-10-30 margin-top-40">посмотреть новинки</p>
        </div>
        <div class="flex-box flex-wrap margin-top-30">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <?php
                    $article = new \Project\Core\Article($row['id']);
                    //добавляем $row['id'] в аргумент при создании экземпляра класса Article используя в index.php метод public function __construct($id) и убираем строку $article->getId($row['id']);
                    //убираем строку используя переопределение метода setTable из Unit в Article   $article->getTable('core_articles');  ////вызов метода с пробросом названия нужной таблицы в класс Unit с универсальным методом для выбора нужной таблицы из DB
                    /*$article->id;
                    $article->id = 5;*/

/* если класс родитель Unit не абстрастный, то можно используя его самого вывести данные, т.е. можно создать экземпляр класса
    если он абстрактный, то создать экземпляр класса нельзя
                    $article = new Unit();
                    $article->getId($row['id']);
                    $article->getTable('core_articles');
*/
                ?>
                <div class="main-article" style="background-image: url('<?= $article->getField('photo') ?>')">
                    <div>
                        <div class="padding-10">
                            <b>
                                <?= $article->title() ?>
                            </b>            
                        </div>
                        <div class="padding-10">
                            <?= $article->getField('description') ?>
                        </div>
                    </div>
                </div>   
            <?php endwhile; ?>
        </div>

        
        <!--<div class="flex-box flex-wrap margin-top-30">
            ?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="main-article" style="background-image: url('<?= $row['photo'] ?>')">
                    <div>
                        <div class="padding-10">
                            <b>
                                ?= $row['title'] ?>
                            </b>            
                        </div>
                        <div class="padding-10">
                            ?= $row['description'] ?>
                        </div>
                    </div>
                </div>   
            ?php endwhile; ?>
        </div>-->

        <!--<div class="flex-box margin-top-30">
            <div class="main-item">
                <div class="main-photo-1 main-photo-rectangle"></div>
                <div class="main-photo-5 main-photo-square"></div>
            </div>
            <div class="main-item">
                <div class="main-background-light-gray main-photo-square"></div>
                <div class="main-photo-2 main-photo-square"></div>
                <div class="main-background-gray main-photo-square"></div>
            </div>
            <div class="main-item">
                <div class="main-photo-3 main-photo-square"></div>
                <div class="main-background-light-gray main-photo-square"></div>
                <div class="main-photo-6 main-photo-square"></div>
            </div>
            <div class="main-item">
                <div class="main-background-gray main-photo-square"></div>
                <div class="main-photo-4 main-photo-rectangle"></div>
            </div>
        </div>-->
        <div class="text-align-center margin-top-100">
            <h2>БУДЬ ВСЕГДА В КУРСЕ ВЫГОДНЫХ ПРЕДЛОЖЕНИЙ</h2>
            <p class="text-i">подписывайся и следи за новинками и выгодными предложениями.</p>
        </div>
        <div class="flex-box justify-content-center margin-top-40">
            <form action="" method="POST" class="border-1px">
                <input class="text-i" type="email" name="email" id="" placeholder="e-mail">
                <input type="submit" value="записаться">
            </form>
        </div>
        <p class="text-align-center">Некорректный e-mail. Попробуйте еще раз.</p>
    </main>
<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/components/footer/index.php');
?>