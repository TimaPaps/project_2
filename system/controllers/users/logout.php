<?php

//убиваем куку ( -3600 просроченный срок годности - она удалится)
setcookie('user_id', 0, time() - 3600, '/');
//редирект
header('location: http://project_2/catalog.php');   

?>