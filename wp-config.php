<?php
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
define('DB_NAME', 'crucial-detail');

/** MySQL database username */
define('DB_USER', 'crucial-detail');

/** MySQL database password */
define('DB_PASSWORD', 'First15Minutes!');

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
define('AUTH_KEY',         ')%z^BzWQ=C&@}:o6L}eh+jWRgldr.H-M-j}t,TI7PbQwbx;U;M(*r]xuH/wn:+S4');
define('SECURE_AUTH_KEY',  'M KKre*_KdVK&s39b[a;L613KyGO^;YlQ9lZZC`=Pz82:jNU7s_ch,SB1pff71Xo');
define('LOGGED_IN_KEY',    'RV1~Nj6mS+/NU/PfnaF%7`h>$iHuGA+VDADppJrq|0kI/6W%Fx!v06Mey%k2^()|');
define('NONCE_KEY',        'xigVV*I|3^+K5AV.}@FMV%R?<^g=-m!ND+ux70R7R|Jy>kt,*cvBgnF{kFN*=rM!');
define('AUTH_SALT',        '`k-zV?&<2Q=LSvw~c^Kt+R$,3Qtf3{jo<g-+mawVhNPqt7]t+07FM%yQo*X*=-EH');
define('SECURE_AUTH_SALT', '&lp}Q1a,xx-u5R@ZovX`InKqA/E*_/+vyQX`C3gQPAgZ:e-`(vR;sFnAkNp2MP| ');
define('LOGGED_IN_SALT',   'q=iiV1datTKnc{;F1oW 696-2Ov1IV`LC$Q-Vd{swj{ux$h;-|,co:.Vyrt^XCSD');
define('NONCE_SALT',       'V,#O=9JwD=]6a=u$Zx:WSspWgeW~}+e-?h5lAa}LC9?vuR+ejvxysFasNT.mdoO3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
