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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'j-a/)c6y0_czVL`./%+ru/4@O;hfPXI0J1-Y*u9[u^)dg>zEU={2G!#<@}aYLiAe' );
define( 'SECURE_AUTH_KEY',  '#QZ]`SR2*.iG-%IriU%+[1<QwLYX;IM{Icbq5#Z3MD@8gI&L1NU$E?{ZEuG<M^qb' );
define( 'LOGGED_IN_KEY',    '_MgmKbiv~qN3e!yaiskzUGW#Q.AX9`=(RV~}JN,`*A,!j{<)*y2Hh?&.PGl~1jr*' );
define( 'NONCE_KEY',        'p3v_yB~?{0ecy?|s`kOUWFQ/{y3F_xz9lZ<:s/u5!n8>np[T66-hG7Lw[OOG8>l*' );
define( 'AUTH_SALT',        '&q1 HBz&[bh^E%J;Y:&LGh|0Mlcsy[P7*n]oUFJ} H]:T{3CqiCzf|IL3]j1Wb[ ' );
define( 'SECURE_AUTH_SALT', 'XDgTB.{Y Gs{0/1F`lkFxbrs+>IXPA7l2dvbQJ,L[K$Kj6<p)4n-+5{k#CC@B~?A' );
define( 'LOGGED_IN_SALT',   'CA%p_yEs^]&0cc!M-K,Zz18{~9N0mK0`xX{0e*TjGKVp:(/.u;59i<z*yuf3j<8!' );
define( 'NONCE_SALT',       'y%qckE5)vpc,gX-$zE(;p?At#3ejT+g]i/SfDZtv9.l/23wE*2K!Fsx[^TG9UHcd' );

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
