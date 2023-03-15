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
define( 'DB_NAME', 'mmiddb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'abwP@ssw0rd' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '8RM%iH-ksQ6Zi3+HcKz>!!*OUI,[.9<*66Nh(K|/!Yd_.EL(-;t@Ga!Cz%m dqZB' );
define( 'SECURE_AUTH_KEY',  'y:v89v ~<R|V=vWAD6zKX-(MOl fdS1T/MltE7!W#NFqOx&&UH?M*e>GPW*=u|CO' );
define( 'LOGGED_IN_KEY',    '<Cnw[!. 244Bw1$&E6,y#Fc86&,C@c~J%.(7HL@GI0|!U*/JZOU/HU]@*pQ[5d+k' );
define( 'NONCE_KEY',        '0F0fSbzJQ:l/SL]L^fqr$ b>g9JoquFRyiJ!MY) xin>@ <2H[ns}SM+4!iF1?&&' );
define( 'AUTH_SALT',        'u DQ&;Y_,iCFV!M/ r&cI8>ZmxL!_7ihsm)<6l<e#sp[rew>[0*5fZU0/[1g2yT`' );
define( 'SECURE_AUTH_SALT', 'XR-I0xNJ`TD+9gaR]=r)529+(w76DFUzG<Q*O@Rvl[Hm6hD1f`|A9#)6}@.<fk$%' );
define( 'LOGGED_IN_SALT',   'xFxMq0ff8U@42&EL,*r=8Ly x?GluW?m<HBF],T*;u.U[1^6Q!BaXRfSp[2qXvO&' );
define( 'NONCE_SALT',       'U.An3+an[k2[9-W*XdP*XRKlO.PVJ,+%0D#u/ojNH$iW?Oh1L6lvGZV- Y>&-iHe' );

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
