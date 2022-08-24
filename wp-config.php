<?php

define('FS_METHOD', 'direct');

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbs7559591' );

/** Database username */
define( 'DB_USER', 'dbu1119998' );

/** Database password */
define( 'DB_PASSWORD', 'nAjgMLBIIjInZaBAunmq' );

/** Database hostname */
define( 'DB_HOST', 'db5008956711.hosting-data.io' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'b?NSLS49bpBX16{zNx!sm.<bs|3QwN|6S+j$@@KT@/G,9&eEqqgXopWK9/${mF3S' );
define( 'SECURE_AUTH_KEY',   'B2%&Adr3|9Fv[5a**Bas=qetY3B*LyV00KC4$Ok.!(+nE2#sK!qGD%_ caP;#`Qv' );
define( 'LOGGED_IN_KEY',     'gqja[y::db%puU9a&{dEeJ2QL60FM;xU+bP2u4OuiXQB{YP1iRNJhU?vfB<#]XTA' );
define( 'NONCE_KEY',         '*UH=$XzVyKn?v|DcrThK.pO;oaHN=SNPbRG=Oy#3Ca,Dj1uq=X^|Zo8%s}[%>Zv4' );
define( 'AUTH_SALT',         'AX!|skZo@,G!!Ij/fE&p0%m;-c3 BwB2#rG-B]eqHxEy:4hiF$(>pH.T(9^L$555' );
define( 'SECURE_AUTH_SALT',  'jB_$6|ar.y=3) ONT|m${Q(9j82)*V*cp+<yb5EjL<M?AUsU@E=tb+&Aijs)e4>d' );
define( 'LOGGED_IN_SALT',    'PQH)}axySdP]<C5{GL *1D|ZGgq>}seljN9<wduS![IV/W_ZKzKkq3;wAV+xjL{4' );
define( 'NONCE_SALT',        '=;w<{Tiu.Lex:*#OheRPDSt)LqFniY,nr{N^,w3!!ZYptf,R5ingAQHtS%dH%!Iz' );
define( 'WP_CACHE_KEY_SALT', '0$w.WmnKv7o+e<G)ExBR$fs;v`+^!j.k&?wuyKSAyC|,df,oA@tQt!Vv1%Vodp(4' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ThSeEsAO';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
