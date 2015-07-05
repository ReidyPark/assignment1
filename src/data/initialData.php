<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Initialise data for the search values on search.php*/

   require_once  (__DIR__ . '/../config.php');

   require_once (CONTROL_PATH.'connect.php');
   require_once (DATA_PATH.'MiniTemplator.class.php');

   $region_name = $handler->query('SELECT DISTINCT region_name 
                                       FROM region
                                       ORDER BY region_name');
   
   $grape_variety = $handler->query('SELECT DISTINCT variety
                                       FROM grape_variety
                                       ORDER BY variety');
   
   $wine_years = $handler->query('SELECT DISTINCT year FROM wine ORDER BY year');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
   //$winery_name = $handler->query('SELECT DISTINCT winery_name FROM winery');
   
?>