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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ffl_database');

/** MySQL database username */
define('DB_USER', 'jwuerch');

/** MySQL database password */
define('DB_PASSWORD', '0191125a');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '24}Vq?9g_csm4 +,r?pm6pfnMX/^^?xHF L)$TJ0X%KsaT_%]k.tY..r,{ixM7sy');
define('SECURE_AUTH_KEY',  '?Tylk;:w5c3uT<1-S U(> _nJbh|3MV!lf|b+dc6y84HqGD};Zfde>bBdF$^k9Db');
define('LOGGED_IN_KEY',    'n8k3u:?j`,Y(dUn(kpvM57>vh!)R$XtlX1o*{HvIq~aUF`?R[`1r,`(h:N{`1j>^');
define('NONCE_KEY',        'GX m+$QG<wN9*uE$3&fwxG}fUd)5oe{r=Oc,+Su@S!j3x-@gL+Uu.##Uht[kW`Fs');
define('AUTH_SALT',        'mg%O`X)|qX!O8_;{2f#p^~ZSU_F|h8q3TUj2:ZM;gsi.f(8PRHvU};0|%bnJ,Z#]');
define('SECURE_AUTH_SALT', '&90;3Be01lb1tEoXyEunv=hU8CC?wtdoOdf9?k=y?6Cun{l{QLp37P;D+Im3C kB');
define('LOGGED_IN_SALT',   '}ie_d:Se14(cmAQ<_:ot+wdBIe@E*<,HhE]<9w{X%`QBeGCn$C^f[I!X?O+@oMi ');
define('NONCE_SALT',       't:^j PWi~ih8Q0`:N4CB[~^K5+(T2RXU]9:XmA,<k:[lz_B^u-,}gspyq+%ahU[C');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
