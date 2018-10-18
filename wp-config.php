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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')cqqY-}qv8|0l&BEElnnmeO:kz?+*^}|k~rh8RVGX}*wVjbw+734k)V!6 >:P{59');
define('SECURE_AUTH_KEY',  '0zyMXib,s=1_5h_d2UNp)eSYO]OyTB1|=TH=gc0MXvog88%:={snQ-R}lL!:j$7+');
define('LOGGED_IN_KEY',    'OLB4io]0C{Kw=ulX=K-QL*tH+uZwO&|krkz]/#QM!{E/KkAi~9s@Gxe{>H0%y^LB');
define('NONCE_KEY',        'Dj$_lv6i-/,9G#j1=j>6V--WpB(d+xy-4ct#-g~]u#L[?xm+:WHA+~7VQ||6QHc]');
define('AUTH_SALT',        'K__!E.dd3MmJm,68vC4<W5z6nIK446{6+H}W`w+rA83oG+J4Z>(4ga_GV+HGoW+S');
define('SECURE_AUTH_SALT', ',0|9-lPv>In]cxi/5DL.kJ_swmeJ@U#7~j5v-NM{]ivxJ_t9^z4T!i=U2_o#d>8g');
define('LOGGED_IN_SALT',   'k+~S:p&R+n-vwT~?Q;HQOr|%P Sbqg9D>vLc]9D~l5P^GK%LIP>-Oc?%?AiOV9QF');
define('NONCE_SALT',       '1_a=~u$IYvwlgN*qM-tf|Rj36HfHC>Sf=<g.J(@C8g4;~e5d<}h(Jy0aM4YmUZx?');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
