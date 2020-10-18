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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'flower_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{Qy4[Z~nhzB^Yrm+uA*O_f=pMc:LBX a?RA%Vq(|Iubu)~],p/{g*C$:!G=XzRf/' );
define( 'SECURE_AUTH_KEY',  'J)y=~DqT:~Vlj?F(Ls(?gor+)J5B^uRb){lEpddZ8uh}#NG.>UiF(tkliNYA<C.V' );
define( 'LOGGED_IN_KEY',    ';kSf73&g$aWr$i?YnIX^gy~ZZ3vd pf313wE<K/nOiz/-O`K8aORTN`!5:**TkFz' );
define( 'NONCE_KEY',        '$dFXs9hKNd!PqRRWkACz;4jcS/<I1^[5k:O M2OTBH9T|.x$LM;B&Jx4Hu6Dt{Rz' );
define( 'AUTH_SALT',        'M^10#Z9i`JfX{ j{)#$h_4?M]cI6jDd)$L9XF1g87N^x7yJ],V ,)=x5[[69%_x ' );
define( 'SECURE_AUTH_SALT', 'TzAh}Sp{jENotF@Rebuo 7~`jm,1QMM(q#1ww}KMR-+@h-pxg_|F3;y,%h[O9ech' );
define( 'LOGGED_IN_SALT',   'R~I:hSX~d!X 1f5%,Neem;%0yvPY,Upuu+BX {!#3zUl49m/Gt_d,NqSZYLpfnPw' );
define( 'NONCE_SALT',       'b0q$^OSP}]pY1$-[lkTyzu-p/lA|-7<|C^/BqJ3x7~Z#UbF6)<6!#L$EIdPrA2~&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
