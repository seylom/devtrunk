<?php

define('DB_HOST','devtrunk.local');
define('DB_USER', 'root');
define('DB_PASSWORD','tony99');
define('DB_DATABASE','devtrunkdb');

define('SERVER_URL','http://devtrunk.local');
define('MOBILE_SERVER_URL','http://devtrunk.mobile');

define('APP_FOL','/');
define('TEMPLATE_PATH','../application/templates');
define('ASSETS','../application/assets');
define('ROOT','../');
define('LOGIN_PAGE','/login.php');
define('SERVER_DOC_ROOT',$_SERVER['DOCUMENT_ROOT']);
define('APP_DIR',SERVER_DOC_ROOT.APP_FOL);
define('INCLUDES_DIR',APP_DIR.'inc/');
define('LIB_DIR',APP_DIR.'lib/');
define('UPLOADS_DIR',APP_DIR.'uploads/');
define('CODE_DIR','../application/Code');
define('BUSINESS_OBJECTS','../application/Code/BusinessObjects');
define('CONTROLLERS','../application/Code/Controllers');
define('REPOSITORY','../application/Code/Repository');
define('VIEW_MODELS','../application/Code/ViewModels');
define('MEMBERSHIP','../application/Code/Membership');
define('DAO','../application/Code/DAO');

define('WORDNIK_API_KEY','9ee4afa1e31c13b6d0b350af2ee0e64b3483a21f11ecb6cd5');

//$config = array("db"=>array("db1"=>array(
//                                        "hostname"=>"localhost",
//                                        "databasename"=>"devtrunkdb",
//                                        "username"=>"root",
//                                        "password"=>"tony99"
//                                        ),
//                            "db2"=>array(
//                                        "hostname"=>"",
//                                        "databasename"=>"",
//                                        "username"=>"",
//                                        "password"=>""
//                                        )
//                            ),
//                "paths"=>array("resources"=>"assets",
//                               "images"=>array("content"=> $_SERVER["DOCUMENT_ROOT"]."/assets/img",
//                                               "layout"=>$_SERVER["DOCUMENT_ROOT"]."/assets/img")
//                              )
//               );

//InitRoot();

//defined("LIBRARY_PATH")
//    or define("LIBRARY_PATH",realpath(dirname(__FILE__).'/library'));
//
//defined("TEMPLATE_PATH")
//    or define("TEMPLATE_PATH",realpath(dirname(__FILE__).'/templates'));



//function InitRoot()
//{
//   global $root;
//   if (!$root)
//   {
//       $root = realpath($_SERVER['DOCUMENT_ROOT']);
//   }
//}

$old_error_handler = set_error_handler("myErrorHandler");

function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Unknown error type: [$errno] $errstr<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}

?>
