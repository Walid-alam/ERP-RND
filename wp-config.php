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
define('DB_NAME', 'erprnd');

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
define('AUTH_KEY',         'y932yeR,nqXzwyrj&q2%vfBq)?-`>&CxH#trBXQ@u&Ii#3S8b&90$<S#9-FtbG/v');
define('SECURE_AUTH_KEY',  '[ 7=-idY/HZ6#p-Da$*rp2S^),v<j)Q6{o|Ej|/PLGTZfA:2sAW%BkP44]W=W$vz');
define('LOGGED_IN_KEY',    'l?V|vlOhJ=5>Ve+-R?D$Girw@GLmM{#DUm!}8nwnM7n(WJXBNFTq1>Vs8C#9BW+]');
define('NONCE_KEY',        '!@fR3;-K.,j>SxN/_0USd)f*-9Vj`7[ks %qUu4x`4+/%MYo;TJ+l d{u}jT4I$n');
define('AUTH_SALT',        'VV_`0^$6 pxs- oWyDl7q77B(wEED/bos/f-4R2YRU(SU5;t:pgk9^u;3ULi+Qt<');
define('SECURE_AUTH_SALT', 'Xc-Z_n1C4.9&ZLc,C|C]p@Z_k)dXN>$TF13z>KqqD`:a)@+CqN44r#qjHk4qnV2 ');
define('LOGGED_IN_SALT',   'cR0ae9Y4gX`S,yELx-5N]K=n#,@l9fzW>=M=yIC42RC-O<`eB?lo&2rlMmp5#nz=');
define('NONCE_SALT',       '{:V^Um0Ft{&m!kcDtqn/EYg%4a-:*`I)OT$@(SClxXYo8oj9>>[%K.v?OSOoK7w*');

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
