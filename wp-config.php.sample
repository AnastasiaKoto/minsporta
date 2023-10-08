<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'minsporta' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'minsporta' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tNg*jvQ<;VmOhUA.LOnUun$[kw{c]p{-*?CL?K>1S`e7*P|=(u`re)D!B0L:$:Y?' );
define( 'SECURE_AUTH_KEY',  '};BISZ?Km9SIWHsA7Lalio)bY^89:cO^XP#`4#49wVw6><rMd>.ils|8$U*5Ymy#' );
define( 'LOGGED_IN_KEY',    'j1&c6d`O`I;qot%9blvg>mA1igHnCG`vZw=MzGVOh7;wZA!}Y[&UDv]U&V&%LUZ>' );
define( 'NONCE_KEY',        ')6seu*1bwyPPtti(x4zQSPXkE]3Ro ULW2w Qmu}%VdNp.~;Ud=@a<mZDP`bC 66' );
define( 'AUTH_SALT',        'W,;EKdzW|WN@n%E8x@NVT%j tk5HEn,&+*L&7Vm]G1fSs5!;f?1Uw|p.CqN$i;w:' );
define( 'SECURE_AUTH_SALT', 'l1m-_]|F6<62NT<p@Ft30D1]h58o)ksdFJ w8T7/NYWJO7QG}+<+H~P3!}mtart!' );
define( 'LOGGED_IN_SALT',   'V/)>Wi7T9&CPv*L730HN}C~E*IlE+~YU%5i6U$R+K~;)l7,A-# (p_^ oW~brZ$p' );
define( 'NONCE_SALT',       '2&?VP.J%mKQ3I,io9XfzxD%cl;s:<Ho1W!5xGAiS.$HL(Gxx,e=>in1PSg3h&ST0' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
