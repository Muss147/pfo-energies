<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pfo_energies_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[QAV56/Br4(}6xY4;BQl|fTZE-evDC;Ch)m-5WP4KzM)zZ2s8>`d7^t!7}xN,r<0' );
define( 'SECURE_AUTH_KEY',  'm{%pO94I?8hkMwJ,4fcS&y%SP@8~!!zzkc5wpYRh{(U.<Te:XeHs@f}yG-O_V|1P' );
define( 'LOGGED_IN_KEY',    'MQr$*hL-#100?06Oe#y0XWdQKm]167#$I)<]B?nK#W+!O,:s+[O3 6vQ*Sj4bJj%' );
define( 'NONCE_KEY',        '+8P2T()5llMsoxSWYOSi2U!JA!9b+2KwKqg5<QPitX}u-Ml)f<n[Rn``,>3Ri/.E' );
define( 'AUTH_SALT',        'Su1XhZ=<<DKqT5_lmOagyT#gFmTw*p{Lim^p#RS/B,_*@.$J)Y;U9v]qlI3:NdaB' );
define( 'SECURE_AUTH_SALT', 'q`QN4p;j1I]{CgDsr9+P7lZK>+{@6(,u#T~,~ju85l?2)wk6L:x}zTCsn,-/45Pg' );
define( 'LOGGED_IN_SALT',   'Kt-,;uY@kFMEi{k;)zfyFvp>(`R0r88_8_~<:#-i&_`]~(uD11v.IPczC}QL2T4y' );
define( 'NONCE_SALT',       'o?QfxxYd}QvC=V<gUgsJrB(,0Du5TmM>X7-SdTKu*zV^gaBuwDJrR]YMDo6XV}sQ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
