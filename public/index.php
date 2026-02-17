<?php

// Check PHP version.
$minPhpVersion = '7.4'; // If you update this, don't forget to update `spark`.
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION
    );

    exit($message);
}

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
chdir(FCPATH);

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// Load our paths config file
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . '../app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Config\Paths();

// Location of the framework bootstrap file.
require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Load environment settings from .env files into $_SERVER and $_ENV
require_once SYSTEMPATH . 'Config/DotEnv.php';
(function () {
    // Map common platform env var names (underscores) to the dotted names CodeIgniter's DotEnv expects.
    $map = [
        'CI_ENVIRONMENT' => 'CI_ENVIRONMENT',
        'APP_BASEURL' => 'app.baseURL',
        'APP_BASE_URL' => 'app.baseURL',
        'DATABASE_DEFAULT_HOSTNAME' => 'database.default.hostname',
        'DATABASE_DEFAULT_DATABASE' => 'database.default.database',
        'DATABASE_DEFAULT_USERNAME' => 'database.default.username',
        'DATABASE_DEFAULT_PASSWORD' => 'database.default.password',
        'DATABASE_DEFAULT_DBDRIVER' => 'database.default.DBDriver',
        'DATABASE_DEFAULT_PORT' => 'database.default.port',
        'MAILCHIMP_API_KEY' => 'MAILCHIMP_API_KEY',
        'MAILCHIMP_LIST_ID' => 'MAILCHIMP_LIST_ID',
    ];

    foreach ($map as $from => $to) {
        $value = getenv($from);
        if ($value === false && isset($_ENV[$from])) {
            $value = $_ENV[$from];
        }
        if ($value === false && isset($_SERVER[$from])) {
            $value = $_SERVER[$from];
        }
        if ($value !== false && $value !== null && $value !== '') {
            // set dotted env name so DotEnv and Config can read it
            putenv("$to=$value");
            $_ENV[$to] = $value;
            $_SERVER[$to] = $value;
        }
    }

    (new CodeIgniter\Config\DotEnv(ROOTPATH))->load();
})();

/*
 * ---------------------------------------------------------------
 * GRAB OUR CODEIGNITER INSTANCE
 * ---------------------------------------------------------------
 *
 * The CodeIgniter class contains the core functionality to make
 * the application run, and does all the dirty work to get
 * the pieces all working together.
 */

$app = Config\Services::codeigniter();
$app->initialize();
$context = is_cli() ? 'php-cli' : 'web';
$app->setContext($context);

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 * Now that everything is set up, it's time to actually fire
 * up the engines and make this app do its thang.
 */

$app->run();
