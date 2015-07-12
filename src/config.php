<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->

<?php

/* defining an absolute path - found on stack overflow
http://stackoverflow.com/questions/8356547/php-absolute-vs-relative-paths 

also decided to use short hand for various functions through out site*/

ini_set('display_errors', 'on');
error_reporting(-1 | E_STRICT);

if ( !defined('ABSPATH') )
    define('ABSPATH', (__DIR__) . '/');
 
define('CONTROL_PATH', ABSPATH. 'controls/');
define('VIEWS_PATH', ABSPATH. 'views/');
define('DATA_PATH', ABSPATH. 'data/');

/*define template paths using strings */
define('REGION_TEMPLATE', VIEWS_PATH.'templates/region.htm');
define('GRAPE_VARIETY_TEMPLATE', VIEWS_PATH.'templates/grape_variety.htm');
define('YEARS_TEMPLATE', VIEWS_PATH.'templates/years.htm');
define('ANSWER_PAGE', DATA_PATH.'answer.php');

session_start();

/* list of included files for global inclusion */
require_once (CONTROL_PATH.'security.php'); 

require_once (DATA_PATH.'region_name.php');
require_once (DATA_PATH.'grape_variety.php');
require_once (DATA_PATH.'years.php');

?>