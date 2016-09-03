<?php define('WP_CACHE', true);
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hellenj7_greekfestivalipswich');

/** MySQL database username */
define('DB_USER', 'hellenj7_gfuser');

/** MySQL database password */
define('DB_PASSWORD', 'GreekFestival-1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6LrGkT5t25cWhuATdgrnRyVmmf7BMthwIDzHnQGsbeZEb1RPRXodl3iwTG7RJTsg');
define('SECURE_AUTH_KEY',  '9IL41KCcN7HiCqaGGOWlOs31U7RMdjvzYBaT5n6WQcfSsQcvp3MwBPxc7fxVO6oA');
define('LOGGED_IN_KEY',    'XoBersCry83vBZKoyoPJJOQQfYx9QzpjOiH29JwT5Y5bRt7g3I5PqLnStl57GmMH');
define('NONCE_KEY',        '3kN782clAlgrWVyGG81yxSku668Itz8cy4AOe4ugQDUpBOqRui9OIBecWnUxX5ns');
define('AUTH_SALT',        'gRalAP8zdXT02apV5j32XYRvX4T7sk7RJzcO5EOBBW9O1a9YWUrus3GH7KQFgrJy');
define('SECURE_AUTH_SALT', '56DJ3JiX7Y1vhMBwNFvPMaFi2ueSpwqgnPAszbmiaoBm0GzrTfSgl5ViMc4ACSkp');
define('LOGGED_IN_SALT',   'NCRFCmIenfiTYAdMgByYGpn7cUo1zRn7dO7w9Ter8e5sdO987n6tMBX0vEK6UuBI');
define('NONCE_SALT',       '97qxereySeMkid4qjqfUbrumCY9XOQQDhKON22ixNnnIoH4v6XT88fTrvDGJP66m');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
