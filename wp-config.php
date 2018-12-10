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
define('DB_NAME', 'edman');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'SkO8btW}n-jJ9*~Lo`X<&{(23Sh,RgxB:J~jH^f}AQv[~&tAEq4x:%x7{Z`3I^@J');
define('SECURE_AUTH_KEY',  'ha@UIL<T5n}=>^(J9E00(;bjO~GAp&Q[9sSVsKqM5+rJbE(t-KM3wJ9WO+Fz>}YX');
define('LOGGED_IN_KEY',    '@w@K=|3o,yKz:mV1&[<>9umC:C{29D7C9YW#w,d}|`c~aBBy$JIf}p[2Q+AXoC{2');
define('NONCE_KEY',        'v1hl1bP-d4&D,W~}Hmt8CU)gKK9RrNlV*EJUN`,aMA$3oYT_v]]NLleDMLv^f+^-');
define('AUTH_SALT',        '@46*=+bLN C[ GFv#lck_=wq#P$i|s44V/wSpE/@W_!aL@lX&UWtKD06uY-I5v_k');
define('SECURE_AUTH_SALT', 's!Uo2K]$~6docI^U4H/)fE[FvQOB.lBTPJgYRLuFJ)pn{(6=zUN@3!z,+[Pi*_HX');
define('LOGGED_IN_SALT',   'fvUFJ!?!}iPU*W(H7(1-_OR&}#5=h4CtR3Vb)7i%if#1+o.GMR#uVv#8RB..u4Z?');
define('NONCE_SALT',       ']O0aa5zU2bS4rVw_,+#`!E?rL*iY].au0<;;@P_r&jpSOdbt1<bo%uzS8*_*OCv.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'edman_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
