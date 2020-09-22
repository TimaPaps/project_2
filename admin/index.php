<?php

session_start();

    require_once($_SERVER['DOCUMENT_ROOT'] . '/config/db_config.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/system/classes/autoload.php');
    //include($_SERVER['DOCUMENT_ROOT'] . '/components/head_doctype.php');

    $user = new \Project\Core\User($_COOKIE['user_id']);

    if ($user->getField('user_group') != 2) {
        header('Location: http://project_2/catalog.php');
    }
//var_dump($user);
//var_dump($user->login());
?>

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Базовая панель администратора с фиксированной боковой панелью и навигационной панелью.">

    <title>Панель администратора | Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>

  <body>

<script defer>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4481610-59', 'auto');
  ga('send', 'pageview');

</script>

<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(39705265, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39705265" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8588635311388465",
    enable_page_level_ads: true
  });
</script>


<nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">My second <br> web-project</a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <span class="nav-link" style="color: red;"><?= $user->login() ?></span>
      <a class="nav-link" href="/system/controllers/users/logout.php">Выйти</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="?page=orders">
              <span data-feather="file"></span>
              Заказы
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=items">
              <span data-feather="shopping-cart"></span>
              Товары
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?page=users">
              <span data-feather="users"></span>
              Клиенты
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <? if (isset($_GET['new'])) { ?>
        <form action="/system/controllers/goods/create.php" method="POST" enctype="multipart/form-data" style="width: 80%">
          <div class="form-group">
            <input type="text" class="form-control margin-0-important" name="title" placeholder="Название товара" >
          </div>
          <div class="form-group margin-0">
            <input type="number" class="form-control margin-0-important" name="article" placeholder="Артикул">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="price" placeholder="Цена"> руб.
          </div>
          <div class="form-group">
            <input type="file" class="form-control" name="photo" style="border: none;">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" name="category_id">
              <option value="1">Женщинам</option>
              <option value="2">Мужчинам</option>
              <option value="3">Детям</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Тип товара</label>
            <select class="form-control" name="type_id">
              <option value="1">Куртки</option>
              <option value="2">Джинсы</option>
              <option value="3">Обувь</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание товара</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="" name="is_new" value="1"> Новинка
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Создать</button>
          </div>          
        </form>
      <? } elseif (isset($_GET['change'])) { ?>

        <? $good = new \Project\Core\Good($_GET['id']); ?>

        <form action="/system/controllers/goods/update.php" method="POST" enctype="multipart/form-data" style="width: 80%">
          <!--скрытое поле для передачи данных в какой таблице по какому id изменить товар-->
          <input type="hidden" name="id" value="<?= $good->getField('id') ?>">

          <div class="form-group">
            <input type="text" class="form-control margin-0-important" name="title" value="<?= $good->getField('title'); ?>">
          </div>
          <div class="form-group margin-0">
            <input type="number" class="form-control margin-0-important" name="article" value="<?= $good->getField('article'); ?>">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="price" value="<?= $good->getField('price'); ?>"> руб.
          </div>
          <div class="form-group">
            <img src="http://project_2<?= $good->getField('photo') ?>" style="width: 200px;">
            <input type="file" class="form-control" name="photo" style="border: none;">
          </div>

          <? $category = new \Project\Core\Category($good->getField('category_id')) ?>
          
<?//ручное создание ассоциативного массива?>
          <? $arr_category = [  
            '1' => 'Женщинам',
            '2' => 'Мужчинам',
            '3' => 'Детям'
          ] ?>
           <? //var_dump($arr_category); ?>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" name="category_id">
              <option value="<?= $category->getField('id') ?>"><?= $category->getField('title') ?></option>
              <? foreach ($arr_category as $key => $value) { ?>
                <? if ($key != $category->getField('id')) { ?>
                  <option value="<?= $key ?>"><?= $value ?></option>
                <? } ?>
              <? } ?>
            </select>
          </div>

          <? $type = new \Project\Core\Type($good->getField('type_id')) ?>

          <?php
//автоматическое создание ассоциативного массива
          $connect = new \Project\Core\Connect(); 

          //запрос к DB
          $result = mysqli_query($connect->getConnection(), "SELECT * FROM item_types " );
          //var_dump($result);
          $arr_type = [];
          //создание ассоциативного массива с данными из DB
          while ($row = mysqli_fetch_assoc($result)) {
            $arr_type[$row['id']] = $row['title'];
          }                    
          //var_dump($arr_type);
          ?>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Тип товара</label>
            <select class="form-control" name="type_id">
              <option value="<?= $type->getField('id') ?>"><?= $type->getField('title') ?></option>
              <? foreach ($arr_type as $key => $value) { ?>
                <? if ($key != $type->getField('id')) { ?>
                  <option value="<?= $key ?>"><?= $value ?></option>
                <? } ?>
              <? } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Описание товара</label>
            <textarea class="form-control" name="description" rows="3"><?= $good->getField('description'); ?></textarea>
          </div>
          <div class="form-group form-check">
            <input type="hidden" name="is_new" value="0"> <!--кастом для отправки 0 если нет галочки в чекбоксе, без этой строки будет игнор на состояние чекбокса и всегда будет отправляться 1-->
            <input type="checkbox" <? if ($good->getField('is_new')) { ?> checked <? } ?> class="" name="is_new" value="1"> Новинка
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>          
        </form>
      <? } else { ?>

      <? } ?>

      <? if (isset($_GET['page']) && $_GET['page'] == 'items') { ?>
        <div>
          <a href="?new=item" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Добавить товар</a>
        </div>
        <h2>Товары</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#id</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Артикул</th>
                <th>Описание</th>
                <th>Категория</th>
                <th>Тип товара</th>
                <th>Новинка</th>
              </tr>
            </thead>
            <tbody>
                <?php

                  $connect = new \Project\Core\Connect();

                  //запрос к DB
                  $result = mysqli_query($connect->getConnection(), "SELECT * FROM core_goods " );
                  //создание ассоциативного массива с данными из DB и вывод товаров в цикле
                  while ($info = mysqli_fetch_assoc($result)) { 
                    $category = new \Project\Core\Category($info['category_id']);
                    $type = new \Project\Core\Type($info['type_id']);
                    
                    ?>
                    <tr>
                        <td><?= $info['id'] ?></td>
                        <td>
                          <a href="?change=item&id=<?= $info['id'] ?>" target="_blank">
                            <?= $info['title'] ?></td>  
                          </a>
                        <td><?= $info['price'] ?></td>
                        <td><?= $info['article'] ?></td>
                        <td><?= $info['description'] ?></td>
                        <td><?= $category->getField('title') ?></td>
                        <td><?= $type->getField('title') ?></td>
                        <td><?= $info['is_new'] != 0 ? 'новинка' : '' ?></td>
                    </tr>
                  <? } ?>                
            </tbody>
          </table>
        </div>
        <div>
          <a href="?new=item" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Добавить товар</a>
        </div>
      <? } elseif (isset($_GET['page']) && $_GET['page'] == 'users') { ?>
        <h2>Клиенты</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>#id</th>
                <th>Логин</th>
                <th>E-mail</th>
                <th>Группа пользователей</th>
              </tr>
            </thead>
            <tbody>
                <?php

                  $connect = new \Project\Core\Connect();

                  //запрос к DB
                  $result = mysqli_query($connect->getConnection(), "SELECT * FROM core_users " );
                  //создание ассоциативного массива с данными из DB и вывод товаров в цикле
                  while ($info = mysqli_fetch_assoc($result)) { 
                    $group = new \Project\Core\UserGroup($info['user_group']);

                    ?>
                      <tr>
                          <td><?= $info['id'] ?></td>
                          <td><?= $info['login'] ?></td>
                          <td><?= $info['email'] ?></td>
                          <td><?= $group->getField('title') ?></td>
                      </tr>
                  <? } ?>              
            </tbody>
          </table>
        </div>
        <? } elseif (isset($_GET['page']) && $_GET['page'] == 'orders') { ?>
          <h2>Заказы</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#id</th>
                  <th>Имя</th>
                  <th>Телефон</th>
                  <th>E-mail</th>
                  <th>Товары</th>
                  <th>Статус</th>
                  <th>Время заказа</th>
                  <th>Время обработки</th>
                </tr>
              </thead>
              <tbody>
                  <?php

                    $connect = new \Project\Core\Connect();

                    //запрос к DB
                    $result = mysqli_query($connect->getConnection(), "SELECT * FROM core_orders " );
                    //var_dump($result);
                    //создание ассоциативного массива с данными из DB
                    while ($info = mysqli_fetch_assoc($result)) {
                        $status = new \Project\Core\Status($info['order_status']);
                        ?>
                        <tr>
                            <td><?= $info['id'] ?></td>
                            <td><?= $info['first_name'] ?></td>
                            <td>
                              <a href="tel:<?= $info['phone'] ?>">
                                <?= $info['phone'] ?>  
                              </a>                   
                            </td>         
                            <td>
                              <a href="mailto:<?= $info['email'] ?>">
                                <?= $info['email'] ?>
                              </a>  
                            </td>  
                            <td><?= $info['goods'] ?></td>
                            <td style="color: <?= $status->getField('color') ?>; background: <?= $status->getField('background') ?>"><?= $status->getField('title') ?></td>
                            <td><?= date('d-m-Y в H:i', $info['publ_time']) ?></td>
                            <td><?= $info['last_update'] != 0 ? date('d-m-Y в H:i', $info['last_update']) : 'не просмотрено' ?></td>
                        </tr>
                    <? } ?>
              </tbody>
            </table>
          </div>
        <? } else { ?>

      <? } ?>

    </main>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
</body>
</html>