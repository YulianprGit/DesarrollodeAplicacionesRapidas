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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'lab' );

/** Database username */
define( 'DB_USER', 'yulpac' );

/** Database password */
define( 'DB_PASSWORD', 'B957792024' );

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
define( 'AUTH_KEY',         'mf.mZ)`kCX1OYmhE)WYw=kb)+wQ(2HUDw!yg{aI>%Tk.TP39}HBPLICqwoSC944f' );
define( 'SECURE_AUTH_KEY',  '7TMDYz]J$Cud[[XKp<OSx_b|sb{yI6bYD>QYIKuN<uI<}9t?iJoxiZk)&pT8VY~4' );
define( 'LOGGED_IN_KEY',    'dqX;vs~/T`+7CrpJ}t_@$?|4St#Mw(/dix6tM!7a(Qf^A=eYgQBJ2YcJ;W]k8FYd' );
define( 'NONCE_KEY',        'ZdnWTc:twc;tRQmPJB7]%,IxPgxcO<lS|:mA8]+}QT8;0=| f._=SYv8|i95ZDy~' );
define( 'AUTH_SALT',        '1|5>!UCuH?0NN%1~WSTLaI`U{rw|mSg)CTnf5.W#6!U[sgsR|Qjn: }#.O%p=hye' );
define( 'SECURE_AUTH_SALT', 'A89sa|@~WL?PM-(v]Ek8QWQ[#W.<J$aN0okJj%D$/APeC;tOxyw]mXFgE~O| uhk' );
define( 'LOGGED_IN_SALT',   '.Alrj=sa{FwG-(tG,#CU3X1E:hZDy<F8:R*0:c[(yjcqp,pM3)C.X*#82=9[:C:b' );
define( 'NONCE_SALT',       'l>!rjO/8eofQpH/k!prMcj~dk3 aGi>kW/PmOltEzlDN(kPf7 YggPw%o>gVV?=g' );

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

/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files . */
require_once ABSPATH . 'wp-settings.php';
