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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '5{i~=qv)|#:|GyLRNYwC!Ysh ^@M_e>/G1pW8!Gy?$R$Cu8._)E=h??P7p,jV8q:' );
define( 'SECURE_AUTH_KEY',   ';.wp5R~5TUgn8OKAIrBE/+l(I4|xf!KP+JL_A{0+?ta&Eq9r*Rq&l[=*i=c=Yq!d' );
define( 'LOGGED_IN_KEY',     'XQ;4{pfygZs5d3A!7}s>V[jMY0|zCl#k4Hluf]EvU+4]k.oU$9ZvI4`E7XI[>*j)' );
define( 'NONCE_KEY',         '{;<s3*pJUMV^{m/fB7y&?4 77,Od%, 1YaEoX)6{`@U$$}n_@{XG6hZ2J16f9-%y' );
define( 'AUTH_SALT',         'hYFl8s9IMGOYNG[C5R2RK;OnWn<tO@N,e1#a?HluK/!ARz x-^<4us~FQ kQll.=' );
define( 'SECURE_AUTH_SALT',  '1*n(>VvSF3JBiARk{_1-(bFy^Hfq0ze :4K(`wj5*}PNq)>HEW~t6nwJKfo,@Clm' );
define( 'LOGGED_IN_SALT',    '}}>&Gymd)a#M/nc54U|r}Hs<v^)JAUM@/rClj4lFDn/P oMh[{^3YrSIg8/N+?_Y' );
define( 'NONCE_SALT',        '~)cxzUWF<|9c!m&va</h{Csmk0u&<As58>3{up(rMKUv6+S `T.p;,SoL~3JXrK4' );
define( 'WP_CACHE_KEY_SALT', 'MXgs!{&v7j*PmCw/uC}9Oejr85t}@iBU0nT+cUq_=s% =7K@K)o/8N5^Ns3.}a3/' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
