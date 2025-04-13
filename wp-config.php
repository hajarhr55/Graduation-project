<?php
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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


define( 'DB_NAME', 'your_database_name' ); // 

/** Database username */
define( 'DB_USER', 'your_db_user' );

/** Database password */
define( 'DB_PASSWORD', 'your_db_password' );

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
define( 'AUTH_KEY',         'DbGo6w6W)y/6q.]qaYx1imHGtW9[>%bL,<P[~Mi-:bSqpiXIUDq5E|;!*huDYeQZ' );
define( 'SECURE_AUTH_KEY',  'wByYtM`!M+45!lk$zo5l0kt`)ZQH#M**q28f0ZGfN+N(x_r|TIIc2#I=@io%OW-K' );
define( 'LOGGED_IN_KEY',    'GfDTnAVMV=1>VD|{*Y|w7t:9#n8E5ZfcSBou.g[ml n}%U0Z[^5mmbOIRn<}~ Vf' );
define( 'NONCE_KEY',        'H<AT<c>Qf)#^[obz>oL@kH4Fo2^r3 . 1DAX={#I1nRqcD/6N,yGo2d@FbFb+Z(j' );
define( 'AUTH_SALT',        '6Thh)qU LhwB%J~)B_{avREu)$u>9_0L&<lvIe&k[d!RP|ahzTX$=ynCa|^kF6$a' );
define( 'SECURE_AUTH_SALT', '49RU%isYHcTsGcUG3@:kI5kssp7Qv%8~^sxi0@SQIUKz+nX;ddxGC<m6ie2+VB#&' );
define( 'LOGGED_IN_SALT',   '[ J=6so2mXbaMS?!FGAy?J=Gl$P{uiw_P1};67ovpBg-Hv8gHj7-M~!@og>77|S[' );
define( 'NONCE_SALT',       'E&=X*d]&%CqaO_Vd2(^ir9Cy3/2M:uqmq&pPCWUhR0#4LLr <&,q&D%x$=]yQ1y.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

define('WP_DEBUG_LOG', true); // تسجيل الأخطاء في ملف log
define('WP_DEBUG_DISPLAY', false); // تعطيل عرض الأخطاء في المتصفح

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

