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
define( 'DB_NAME', '2008-21_hotel' );

/** Имя пользователя базы данных */
define( 'DB_USER', '2008-21_wpadmin' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '3feb68c6a95f5380acd6' );

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
define( 'AUTH_KEY',         'ggvvfYH]66U.5-908?Ba>UA2}Fmkj.GBVR1SwIECj6gwTqSHR{RfB2MCo@t|q:{i' );
define( 'SECURE_AUTH_KEY',  'T@j2D}AcSikz_Lgwq;;F*9M+,3v*MQua,2wOCP:x,jp-]@2;**=~hx56/81O*<(1' );
define( 'LOGGED_IN_KEY',    '/Qy+GMom@-Yja`^uB{sxhwfhtfHZy&8_MAGnX)-@y:kP@wu5%b1kk&a>7m@D7q_r' );
define( 'NONCE_KEY',        'x?ix1?O^*>ie1LIn0k9@7O@~7HEANne:,$zU!LX9o*)=0t4csd+trHQQ7kOtIq.B' );
define( 'AUTH_SALT',        '<D%&~1pFdncX@P7PK*.dzM|[uh=K&u-)$4ZJNKwOOOL_16F!,B@/|qAvxCb~:GI,' );
define( 'SECURE_AUTH_SALT', 'B363}y;doMz=;*=1y!H7w[g:i3.{X363|(r}:zZ+H?2Ptpu:3]z-}eMH+N`!Z_7^' );
define( 'LOGGED_IN_SALT',   'm0.;0yWIG^2H8^}cYEO9WoiVY{|VqdY)d[mM2=l>JpTcd4}=dt~HJ,p,k{/y|hb-' );
define( 'NONCE_SALT',       'DbvQgi$7#GnHz{R1W#eE%yn<_nzc_kW/8cZ%R&X(nOD3T-{ZuQy(/?|AUU/GwN+C' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'vryus_';


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