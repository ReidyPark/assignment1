<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Initialise data for the search values on search.php*/

   require_once  (__DIR__ . '/../config.php');

   require_once (CONTROL_PATH.'connect.php');
   
   $query;
   
   echo buildSearchQuery(), '<br>';
   
   $wine_name = "holdenson";
   $winery_name = "jones";
   
   $query = buildSearchQuery();
   $queryValues = searchQueryValues($wine_name,$winery_name);
   
   $searchQuery = $handler->prepare($query);
   $searchQuery->execute($queryValues);
   
   while($r = $searchQuery->fetch(PDO::FETCH_OBJ)){
   
   echo $r->wineName, ' , ' , $r->wineryName, '<br>' ;
}
   
   
   function buildSearchQuery(){
      
      $str =   '
               SELECT   wine.wine_name AS wineName,
                        winery.winery_name AS wineryName
               FROM wine
               INNER JOIN winery
               ON wine.winery_id = winery.winery_id
               WHERE wine.wine_name = :wine_name
               AND winery.winery_name = :winery_name';
      
      
      return $str;
      
   }
   
   function searchQueryValues($wine_name, $winery_name){
      
      $arr = array(':wine_name' => $wine_name,
                   ':winery_name' => $winery_name);
      
      return $arr;      
      
   }
   
   
   
?>