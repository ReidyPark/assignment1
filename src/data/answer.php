<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Initialise data for the search values on search.php*/

   require_once  (__DIR__ . '/../config.php');

   require_once (CONTROL_PATH.'connect.php');
   
   $wine_name = "holdenson";
   $winery_name = "jones";
   
  
   $query = buildInitialQuery();
   
   $queryValues = searchQueryValues($query,$wine_name,$winery_name);
   
   $searchQuery = $handler->prepare($query);
   $searchQuery->execute($queryValues);
   
   while($r = $searchQuery->fetch(PDO::FETCH_OBJ)){
   
   echo $r->wineName, ' , ' , $r->wineryName, '<br>' ;
}
   
   function buildInitialQuery(){
      
      $query = '
               SELECT   wine.wine_name AS wineName,
                        winery.winery_name AS wineryName
               FROM wine
               INNER JOIN winery
               ON wine.winery_id = winery.winery_id';
               
      return $query;
      
   }
   
   
      
   function searchQueryValues(&$query,$wine_name, $winery_name){
      
      $valueArray = array();
      $queryString = '';
      
      if(checkInput($winery_name)){
         
        $queryString .= ' WHERE wine.wine_name = :wine_name';        
        $valueArray[':wine_name'] = $wine_name;
        
      }      
     
      $query.= $queryString;
      
      return $valueArray;      
      
   }
   
   /*this to check if there is a value for the where clause in search query*/
   function checkInput($wine_name){
      
      if($wine_name == '' || $wine_name == 'all'){
         return false;
      }      
      return true;
   }
   
   
   
?>