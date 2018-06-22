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
define('DB_NAME', 'Round13_Wordpress');

/** MySQL database username */
define('DB_USER', 'Round13_login');

/** MySQL database password */
define('DB_PASSWORD', 'R13cl0th1ng');

/** MySQL hostname */
define('DB_HOST', 'ca-mysql2.hspheredns.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'X5QFgJ/0}xL8fTc>8yh}0mP/4M sW`]0mq69$mtiTgxdtzUqV^q)+1MQ6iVJCyOn');
define('SECURE_AUTH_KEY',  '(+:Eakc-P?uQu3^@G*n8cHD3@9<!Lp{SFc]/H4QBRoteydB&C;{j1pT)g]oqo.j5');
define('LOGGED_IN_KEY',    '#6O#}$X923TBU%z.x-d&qLW-E}*/rUny0Z%l*9{SLh64*]^kOc,/+2)p!6Ea0C7!');
define('NONCE_KEY',        'iP`-JeS`:Wqa/-3wu7ivzWUo1`*T* ZwVq&DWdPx,=?1{[b_:)u$GDb2>7B[p?t%');
define('AUTH_SALT',        '{m(Jt;YnQBZm?1q2g4y*$cYdh+:C+}RQ5|SgL:`d*IMPwn!)YV>;SIxxl|5m/BH$');
define('SECURE_AUTH_SALT', ':I~pHi8O@vJU{ILPr/K*g]~-VEv4&l)G;-D!q*r{?0/{W}guCw]Ndt:1*BhzOyAI');
define('LOGGED_IN_SALT',   'ic^}jJD@DaVK6lN^ywC}#*+ddNlyRoQl7:fX|o8{3C#e0tay4&<{_tX%$|#W`d?W');
define('NONCE_SALT',       ' xa#hy+8DJ9L6SOu(5>s={ms$wSZ!O0 lqT97!t/*p=J3=k+RFh|@-H}N$uX%GVx');

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