<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Initialise data for the search values on search.php*/

require_once  (__DIR__ . '/../config.php');


require_once (DATA_PATH.'answerHelper.php');
   
buildAnswerQuery($wine_name = "",
   $winery_name = "",
   $region_name = "barossa valley",
   $grape_variety = "blanc",
   $minCost = "",
   $maxCost = "",
   $minYear = "",
   $maxYear = "",
   $minStock = "",
   $minOrdered = "13");   

   
function buildAnswerQuery( $wine_name,
                           $winery_name,
                           $region_name,
                           $grape_variety,
                           $minCost,
                           $maxCost,
                           $minYear,
                           $maxYear,
                           $minStock,
                           $minOrdered){   
  
   global $handler;
   $query = buildInitialQuery();
   
   $queryValues = searchQueryValues($query,
                                    $wine_name,
                                    $winery_name,
                                    $region_name,
                                    $grape_variety,
                                    $minCost,
                                    $maxCost,
                                    $minYear,
                                    $maxYear,
                                    $minStock,
                                    $minOrdered);
   
   $searchQuery = $handler->prepare($query);
   $searchQuery->execute($queryValues);
   
   while($r = $searchQuery->fetch(PDO::FETCH_OBJ)){
   
      echo  $r->wineName, ' , ' ,
            getGrapeVariety($r->wineId, $handler), 
            $r->year, ' , ' ,
            $r->wineryName, ' , ' ,
            $r->regionName, ' , ' ,
            $r->wineCost, ' , ' ,
            $r->bottlesAvail, ' , ' ,
            getTotalWIneSold($r->wineId, $handler) , ' , ',
            getTotalSoldPrice($r->wineId, $handler) ,'<br>' ;
   }
      
}


?> 