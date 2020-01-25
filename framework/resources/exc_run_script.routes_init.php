<?php
// Start  phpunit vendor/phphleb/tests/framework/unit/RoutesTest.php


require_once __DIR__ . "/../conf.php";

require_once HLEB_FRAMEWORK_DIR . "Main/Insert/DeterminantStaticUncreated.php";

require_once HLEB_FRAMEWORK_DIR . "Constructor/Routes/LoadRoutes.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/URLHandler.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Request.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/Key.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Handlers/ProtectedCSRF.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Workspace.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/VCreator.php";
require_once HLEB_FRAMEWORK_DIR . "Constructor/Routes/Data.php";

require_once HLEB_FRAMEWORK_DIR . "Main/TryClass.php";

define('HLEB_LOAD_ROUTES_DIRECTORY', HL_FRAMEWORK_TESTS_DIR . '/resources/routes');
define('HLEB_STORAGE_CACHE_ROUTES_DIRECTORY',  HL_FRAMEWORK_TESTS_DIR . '/resources/routes');
define('HLEB_HTTP_TYPE_SUPPORT', ['get', 'post', 'delete', 'put', 'patch', 'options']);
$_SERVER['SERVER_PROTOCOL'] = "HTTP 1.0";

if(!isset($_SESSION)) session_start();

$REQUEST_URI  = $argv[1] ?? '/';
$REQUEST_METHOD  = $argv[2] ?? 'GET';

$SECURITY_TOKEN  = $argv[3] ?? '';

define('HLEB_START', microtime(true));
define('HL_TWIG_CONNECTED', false);
define('HLEB_PROJECT_DEBUG', false);
define('HLEB_PROJECT_VERSION', "1.3.*");
define('HLEB_MAIN_DOMAIN', "test.site");

$_SERVER['REQUEST_URI'] = $REQUEST_URI;
$_SERVER['REQUEST_METHOD'] =  $REQUEST_METHOD;

$_SESSION['_SECURITY_TOKEN'] = $SECURITY_TOKEN;
if(!empty($SECURITY_TOKEN)) {
    $_REQUEST['_token'] =  md5(session_id() . $SECURITY_TOKEN);
}

    function hleb_to0me1cd6vo7gd_data()
{
    return \Hleb\Constructor\Routes\Data::return_data();
}

function hleb_v10s20hdp8nm7c_render($render, $data = null)
{

    if (is_string($render)) {

        $render = [$render];
    }

    return hleb_gop0m3f4hpe10d_all($render, $data, 'render');
}

$opt = (new Hleb\Constructor\Routes\LoadRoutes());

$routes_array = $opt->load_cache() ?? [];

$block = (new Hleb\Constructor\Handlers\URLHandler())->page($routes_array);

$render_map = $routes_array['render'] ?? [];

if ($block) {

    Hleb\Constructor\Handlers\ProtectedCSRF::testPage($block);

    new Hleb\Constructor\Workspace($block, $render_map);

}

die();

