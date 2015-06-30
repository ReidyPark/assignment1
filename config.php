<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->

<?php

/* defining an absolute path - found on stack overflow
http://stackoverflow.com/questions/8356547/php-absolute-vs-relative-paths 

also decided to use short hand for various functions through out site*/

if ( !defined('ABSPATH') )
    define('ABSPATH', (__DIR__) . '/');
 
define('CONTROL_PATH', ABSPATH. 'controls/');
define('VIEWS_PATH', ABSPATH. 'views/');
define('DATA_PATH', ABSPATH. 'data/');


/* list of included files for global inclusion */
require_once (CONTROL_PATH.'security.php'); 

?>