<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'demo1DB09yek');

/** MySQL database username */
define('DB_USER', 'demo1DB09yek');

/** MySQL database password */
define('DB_PASSWORD', 'd4AJOIOUaw');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         'K9pSZ#1-_$fn3A.{XjMU^<qIP2AmuXf{3*<TbEM*muAI{2fqTb<y*TAHu+eq6E<;');
define('SECURE_AUTH_KEY',  'D2eLT*<u+H;6pxai29.]WeHx*it^>ryFM3fnQY,}y^UbEM$fn3B,{bjMU<u$IQ3An');
define('LOGGED_IN_KEY',    '_DK-_ltK:5hoVd[1-_OW9GXfIP*iq6E<bjMT<;x*PXAHu+em2A.{emP*<qxEL;6i');
define('NONCE_KEY',        'X#2emP*#pxDL;607^>UcFNz!krB,}fnQY,}v$JQ7Frzcj7F>bjMU^>ryJ}3nuXf{');
define('AUTH_SALT',        'c0@JR4Cv@gr7F>0ckNU!>rzQ3BnvYg}3@,QcFN^>ryFM7jrY,}v$s-dp5D#:ZhK-');
define('SECURE_AUTH_SALT', 'kC[0HP2ipTa#;+.PXAH+_lt9H]aiLS*#pxKS5Dpxah19_]WeHO_[s-GO5hpSa#:w~');
define('LOGGED_IN_SALT',   'T{uEM7q+fm2A.TbEMy*juHPAmuXe{y*LT6E+.mtA#;aiLT*]u+rzg}4@>UcFNz!o');
define('NONCE_SALT',       'p#]iLT#pxai;6+_WdHO-_ltnuXf{v$fnAI{3fnQ<y^MU7Ey*iq2A.{XfIP$.yLT6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
