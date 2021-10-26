<?php

/* Файл констант. */
define('TEMPLATES_DIR', '../views/');
define('LAYOUTS_DIR', 'layouts/');
define('IMG_DIR', '/img/');

/* DB config. */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'shop');

const ERR_CODE = [
    null => "",
    "OK" => "Отзыв добавлен!",
    "DELETED" => "Отзыв удален!",
    "ERROR_ADD" => "Ошибка добавления отзыва!",
    "ERROR_DEL" => "Ошибка удаления отзыва!",
    "ERROR_UPDATE" => "Ошибка изменения отзыва!",
    "UPDATED" => "Отзыв изменен!"
];

// Подключим основные функции-модули приложения.
require_once "../engine/functions.php";
require_once "../engine/db.php";
require_once "../engine/goods.php";
require_once "../engine/gallery.php";
require_once "../engine/news.php";
require_once "../engine/feedback.php";
require_once "../engine/log.php";