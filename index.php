<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/head_doctype.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/header.php');
?>
<body>
    <main class="wrapper">
        <div class="text-align-center margin-top-60">
            <h1>НОВЫЕ ПОСТУПЛЕНИЯ ВЕСНЫ</h1>
            <p>Мы подготовили для Вас лучшие новинки сезона</p>
            <p class="btn-10-30 margin-top-40">посмотреть новинки</p>
        </div>
        <div class="flex-box margin-top-30">
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
        </div>
        <div class="text-align-center margin-top-100">
            <h2>БУДЬ ВСЕГДА В КУРСЕ ВЫГОДНЫХ ПРЕДЛОЖЕНИЙ</h2>
            <p>подписывайся и следи за новинками и выгодными предложениями.</p>
        </div>
        <div class="flex-box justify-content-center margin-top-40">
            <form action="" method="POST" class="border-1px">
                <input type="email" name="email" id="" placeholder="e-mail">
                <input type="submit" value="записаться">
            </form>
        </div>
        <p class="text-align-center">Некорректный e-mail. Попробуйте еще раз.</p>
    </main>
<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/inc/footer.php');
?>