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
define('DB_NAME', 'onlinereadingbook');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '-u &h~$4*ngKF]=YCx=(GavB%U!B{cH z0+G{!G#4/V}LVAAv6MukAhr:L@x]ApX');
define('SECURE_AUTH_KEY',  'X+Zotfe5^<-rnczmbAzcKoAGyP* z27(~sd-1e0g&g^7;6#bxgO=@1kBO%[EGxq;');
define('LOGGED_IN_KEY',    'J=,TT_o$;pjo+HT N}pp-k%oIV#iCB{:Kbs:<,D/4.02u;*B13x~[! (2>^YFtX_');
define('NONCE_KEY',        'F6v:h6=?Wa5AqA@%q^SW3h*8.@`u d-vNke._TClfk~?(}e^3S5)tuLzBv{G/v9|');
define('AUTH_SALT',        '|Y5X PWA%6d.iMxuTJ&lLQ(%/5E}w5sqZ%QXRD <lJ)9`[)Vs7i/{~yTn<BhI0R)');
define('SECURE_AUTH_SALT', ')&Ga% (R@3o4c(Q+T!_A6&Mded&1[iFi(I9UW?3;Y;lx{$rn~5GtYi,yM?l3QGO%');
define('LOGGED_IN_SALT',   '-:2(_x6%b%G=URyrST4B&:kmV&:#Y:<,YnDa]Oc!u2}z$}H>%mPt{{+9/pAC 5sb');
define('NONCE_SALT',       'lcPYyD^;rl^&2CUWXEsmyy)X?WcXP&Kb&)F-n7Lp_:C;suiJq%xslbX-5 Jb7kDY');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
