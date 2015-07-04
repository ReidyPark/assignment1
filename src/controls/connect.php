<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Connection to database showing any connection errors to screen */
   require_once (__DIR__ . '/../config.php');


   require_once (CONTROL_PATH.'db.php');
   
   //created object for the database.
   try{
      $handler = new PDO($dsn, DB_USER, DB_PW);
      $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch(PDOException $e){
      echo $e->getMessage();
      die('<br>'.'Sorry there is database connection problem');


   } 
   
?>