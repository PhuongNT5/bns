<?php
define( 'WP_CACHE', true );


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
define( 'DB_NAME', 'u619919554_nzlsA' );

/** Database username */
define( 'DB_USER', 'u619919554_hUaAI' );

/** Database password */
define( 'DB_PASSWORD', 'xwwuJ1UttE' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',          '31(e?EtWuJ[`aW=b7}2jr.$Am+{hp;g4*opkOJ-Q|2I%bed8*oF:6e2BTFdm96J|' );
define( 'SECURE_AUTH_KEY',   'M&Bx3:|h:8;0#t4,n?04kHX00bG7-CZ.q95l*Yl@Yz7DB?c>o_XMX?sz+i(8QE.D' );
define( 'LOGGED_IN_KEY',     '|DYQfM,P n<2h}4}?:J+#}hy{kISPu |y9DWOOT.kdJH<+NK/nF!3OD?Zd~y[o[9' );
define( 'NONCE_KEY',         '[|}IRY)/jR?,S0~]$Pz_fw_jkQmxfk1Q#Q3Qc.iza1|?&*U&Jc_$N2W: S6{:5u6' );
define( 'AUTH_SALT',         '6(j,01:nYWu-<W@l{ll_xK,)[o1|~eUPY?(]h#K,`tm5lU/BKjf5OSo5lW4U=*tC' );
define( 'SECURE_AUTH_SALT',  'Y>GOaYt@z;HZ6|:8:#v9 +0[Eb ;_0]y4i)Ho}<sFPD2[Bld_a7`]@r6wYi1u]z|' );
define( 'LOGGED_IN_SALT',    'edz%e K^Bo7:@6*a%i%eQCj?564}N5k:vpAH%J+;g{:<4o=]EJJq`u_*t+N+m62|' );
define( 'NONCE_SALT',        'xs*YL+FVv I&rGpu_Zc{ 7b8O0z:|gy7L3qguLqhE0cgM[[V9$8tR;n+t*:r&x)@' );
define( 'WP_CACHE_KEY_SALT', ' *K,,Cy%3N|vNI3NdU4ACKu6sglfE=ymdop7dv8D&q|i%{N~{v9/[24VLk5=cWT]' );


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



define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
