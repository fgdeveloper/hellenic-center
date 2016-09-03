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
define('DB_NAME', 'helle8_helleniccenter');

/** MySQL database username */
define('DB_USER', 'helle8_dev');

/** MySQL database password */
define('DB_PASSWORD', 'H3llen1c');

/** MySQL hostname */
define('DB_HOST', '216.97.238.71');

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
define('AUTH_KEY',         'T4hWedVLHPkYKBAqZIFqAAtLAcPkOqAlti0njXb1iBvOpHIb11K6ID072ynMNxZb');
define('SECURE_AUTH_KEY',  'HdouH6oGU71e3dcecoMbm0UHzSRhT1uiYVLbQfu368LxMV14pSsXHONC5Xp58RcG');
define('LOGGED_IN_KEY',    'EPhlht39fJuacDJykT0N9V5KamVSTTPSr8nySyqymbmza4QTCJ8w8jNRKqmZwzyf');
define('NONCE_KEY',        'N75sQfVppDEF34ikVM1lILYvbavr6XzqmUQ4U2eUyVhJu4H9koaaqELQEM1aQLBE');
define('AUTH_SALT',        'WRtE77upSrMizK3Qh6aisxjnzFA24zQpXfuaKoseRZPkaawKujVcfvKO74ybTxEH');
define('SECURE_AUTH_SALT', 'gXfHU9pB7gtqQplE8wzsnvKVMIQXS0OU0NfaZnEAJNbefVMAkkHz956IDhzM2c7L');
define('LOGGED_IN_SALT',   'JUPIr74pCIVvAKV8yBpafvcRQoAHV0eQchyvrB6zpRywzGdg8UlPa61ZqUleEd9N');
define('NONCE_SALT',       'XpczkCD5apYho8lJh3QjJa09I4c6RLrTxwAhABWJvONnuqkUVAtZxtMtgGePzLIw');

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
