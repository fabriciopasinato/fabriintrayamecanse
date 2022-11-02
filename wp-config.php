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
define( 'DB_NAME', 'itranetfianl' );

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
define( 'AUTH_KEY',         'h&>l1Isv`N%oE-Ulbp]CD3rPU/P|+hvbPYjhC<M[k`)(+JxV!#TeTX~rIr}#R)$=' );
define( 'SECURE_AUTH_KEY',  'Rg$qSV.n?sR+Nlt;4>;b_qe5ToC#6ptGyBnX@Bsu&OD^5#uIyZ5kwj:>e>3f;a=a' );
define( 'LOGGED_IN_KEY',    'GYpCUb][bLS*=p|)nV[&=0*i#S!`FeEiin_pE-OvZv& c:x(fX|@DRe~l0h!8iF2' );
define( 'NONCE_KEY',        '3F0>0CV(82X,%87mM[@l(#%7pB$NzETL>{SI(20@2u4oVQcu~70QgV}/%nbky,d1' );
define( 'AUTH_SALT',        'cw[hH)GY0+HG:R3mf!>IkSJY8!IehgY6y^T:tpOrD}U7!oamC$lqEBC/VDC[KplD' );
define( 'SECURE_AUTH_SALT', 'V:Eubou5]}(*wym;<=v7j:@E9480 @@1:1cgUn{w^TgKS2kq:KV>cb03}`Ot@rz`' );
define( 'LOGGED_IN_SALT',   'cE8Hsku@91b;Y6E1Ksp5YsQJV*q8AY](sC##*uI;gDPY@g=1d>pmpFv1_y1qld+f' );
define( 'NONCE_SALT',       '4/.tB:cOtKC?U00w114vmyjtgs^HS0>g9LN,ROvKa A-=Z86`QO:z|i5d#r&K!f~' );

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
