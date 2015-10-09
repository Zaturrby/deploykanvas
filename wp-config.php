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
define('DB_NAME', '31014wordpress');

/** MySQL database username */
define('DB_USER', '31014wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'k4nv4s');

/** MySQL hostname */
define('DB_HOST', 'sql10.pcextreme.nl');

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
define('AUTH_KEY',         'N2M>A DY-j4GSECI&qFK<AHxC,)1f}`:B-O[[;f:Zt0I5Ywew;obRK<$`3@r-nIV');
define('SECURE_AUTH_KEY',  '-bH:A}y,M>}} #H;YozqP UCy$H_`4k(UIk3({Ze[iZ@0kS~igqbZ2IS3:X9-%o*');
define('LOGGED_IN_KEY',    '*&S+awEi,]e16%GBzZX4<=GrMQ@~3Pi+9w[S2^SG2|_*m|+PgQL.6!zFyGvIKg|U');
define('NONCE_KEY',        'wc~W.1i$:7C,_5uRh>QY^wMrGoXQwrvh7|EKIT/|7+o_P-qkF6n_i<!^ueZjVK$U');
define('AUTH_SALT',        '<LEx5~| yjZ/HOH=f81iZ|Wg?.)`MV7WPc2U@LEA4QXBP7AD8pAm J7vHL}$*^wq');
define('SECURE_AUTH_SALT', 'C3-S[GtLD5Lfa`<2/.]jQ(?|hx$0+a]/9Z;.K9%aG4Dfae<f7>KnKpaHrLB^(.,o');
define('LOGGED_IN_SALT',   '3b.z@=96Q21-ZoE78F<|ynBh@(6WK||5Ezv2AKE9D5?N+[dq-wF9vTc=@LJ6~:vC');
define('NONCE_SALT',       '=G~Op;x8305VF:.=kuFwPcn-[<!Q3U^}B|j5u?xfI&?BZ|GyjL.X3#T>&BPremkv');

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
define ('WPLANG', 'nl_NL');

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
