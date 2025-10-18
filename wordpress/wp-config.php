<?php
/**
 * WordPress configuration file
 * 
 * This file contains the following configurations:
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') ?: 'wordpress' );

/** MySQL database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER') ?: 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') ?: 'wordpress123' );

/** MySQL hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') ?: 'mariadb:3306' );

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
define( 'AUTH_KEY',         getenv('WORDPRESS_SALT_1') ?: 'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  getenv('WORDPRESS_SALT_2') ?: 'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    getenv('WORDPRESS_SALT_3') ?: 'put your unique phrase here' );
define( 'NONCE_KEY',        getenv('WORDPRESS_SALT_4') ?: 'put your unique phrase here' );
define( 'AUTH_SALT',        getenv('WORDPRESS_SALT_5') ?: 'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', getenv('WORDPRESS_SALT_6') ?: 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   getenv('WORDPRESS_SALT_7') ?: 'put your unique phrase here' );
define( 'NONCE_SALT',       getenv('WORDPRESS_SALT_8') ?: 'put your unique phrase here' );

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
define( 'WP_DEBUG', getenv('WORDPRESS_DEBUG') === 'true' );
define( 'WP_DEBUG_LOG', getenv('WORDPRESS_DEBUG_LOG') === 'true' );
define( 'WP_DEBUG_DISPLAY', false );

/**
 * Redis configuration for caching
 */
define( 'WP_REDIS_HOST', 'redis' );
define( 'WP_REDIS_PORT', 6379 );
define( 'WP_REDIS_DATABASE', 0 );

/**
 * WordPress Memory Limit
 */
define( 'WP_MEMORY_LIMIT', '256M' );

/**
 * WordPress File Permissions
 */
define( 'FS_METHOD', 'direct' );

/**
 * WordPress Updates
 */
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

/**
 * Security Enhancements
 */
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', false );
define( 'FORCE_SSL_ADMIN', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
