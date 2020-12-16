$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

return array(

    /**
     * Set BoxBilling license key. Get license key at http://www.boxbilling.com
     */

    'salt'        => getenv('BB_SALT'),

    /**
     * Full URL where BoxBilling is installed with trailing slash
     */
    'url'     => getenv('BB_URL'),

    'admin_area_prefix' =>  '/bb-admin',

    /**
     * Enable or Disable the display of notices
     */
    'debug'     => getenv('BB_DEBUG'),

    /**
     * Enable or Disable search engine friendly urls.
     * Configure .htaccess file before enabling this feature
     * Set to TRUE if using nginx
     */
    'sef_urls'  => getenv('BB_SEF_URLS'),

    /**
     * Application timezone
     */
    'timezone'    =>  'UTC',

    /**
     * Set BoxBilling locale
     */
    'locale'    =>  'en_US',

    /**
     * Set default date format for localized strings
     * Format information: http://php.net/manual/en/function.strftime.php
     */
    'locale_date_format'    =>  '%A, %d %B %G',

    /**
     * Set default time format for localized strings
     * Format information: http://php.net/manual/en/function.strftime.php
     */
    'locale_time_format'    =>  ' %T',

    /**
     * Set location to store sensitive data
     */
    'path_data'  => dirname(__FILE__) . '/bb-data',

    'path_logs'  => dirname(__FILE__) . '/bb-data/log/application.log',

    'log_to_db'  => true,

    'db'    =>  array(
        /**
         * Database DSN. All config in one string mysql://user:pass@hostname?param=value
         * If BB_DB_DSN is defined, all other params will be ignored
         */
        'dsn'   =>getenv('CLEARDB_DATABASE_URL'),

        /**
         * Database type. Don't change this if in doubt.
         */
        'type'   =>getenv('BB_DB_TYPE'),

        /**
         * Database hostname. Don't change this if in doubt.
         */
        'host'   => $host,

        /**
         * The name of the database for BoxBilling
         */
        'name'   => $db,

        /**
         * Database username
         */
        'user'   => $username,

        /**
         * Database password
         */
        'password'   => $password,
    ),

    'twig'   =>  array(
        'debug'         =>  false,
        'auto_reload'   =>  false,
        'cache'         =>  dirname(__FILE__) . '/bb-data/cache',
    ),

    'api'   =>  array(
        // all requests made to API must have referrer request header with the same url as BoxBilling installation
        'require_referrer_header'   =>  false,

        // empty array will allow all IPs to access API
        'allowed_ips'       =>  array(),

        // Time span for limit in seconds
        'rate_span'         =>  60 * 60,

        // How many requests allowed per time span
        'rate_limit'        =>  1000,
    ),
);
