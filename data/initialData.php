<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Initialise data for the search values on search.php*/


   require_once  (__DIR__ . '/../config.php');

   require_once (CONTROL_PATH.'connect.php');
   require_once (DATA_PATH.'MiniTemplator.class.php');
   
   
   
   $wine_name = $handler->query('SELECT DISTINCT wine_name FROM wine');

   $region_name = $handler->query('SELECT DISTINCT region_name FROM region');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
?>