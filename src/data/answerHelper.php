<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* helper functions for the search builder for the file answer.php */

function buildInitialQuery(){
      
   $query = '
            SELECT   
               DISTINCT wine.wine_id AS wineId,
                        wine.wine_name AS wineName,
                        wine.year   AS year,
                        winery.winery_name AS wineryName,
                        region.region_name AS regionName,
                        inventory.cost AS wineCost,
                        inventory.on_hand AS bottlesAvail
               FROM     wine
            INNER
               JOIN  wine_variety
               ON    wine.wine_id = wine_variety.wine_id
            INNER
               JOIN  grape_variety
               ON    wine_variety.variety_id = grape_variety.variety_id
            INNER 
               JOIN  winery
               ON    wine.winery_id = winery.winery_id
            INNER
               JOIN  region
               ON winery.region_id = region.region_id
            INNER
               JOIN  inventory
               ON wine.wine_id = inventory.wine_id
            INNER
               JOIN  items
               ON items.wine_id = wine.wine_id';
            
   return $query;
   
}

function searchQueryValues(&$query,
                           $wine_name, 
                           $winery_name,
                           $region_name,
                           $grape_variety,
                           $minCost,
                           $maxCost,
                           $minYear,
                           $maxYear,
                           $minStock,
                           $minOrdered){
   
   $valueArray = array();
   $queryString = '';
   
   if(checkInput($wine_name)){
     $wineName = "%$wine_name%";
     $queryString .= ' WHERE (wine.wine_name LIKE :wine_name)';        
     $valueArray[':wine_name'] = $wineName;        
   }
   if(checkInput($winery_name)){ 
     $wineryName = "%$winery_name%";
     $queryString .= ' AND (winery.winery_name LIKE :winery_name)';        
     $valueArray[':winery_name'] = $wineryName;        
   }
   if(checkInput($region_name)){
     $queryString .= ' AND (region.region_name = :region_name)';        
     $valueArray[':region_name'] = $region_name;        
   }
   if(checkInput($grape_variety)){
     $queryString .= ' AND (grape_variety.variety = :grape_variety)';        
     $valueArray[':grape_variety'] = $grape_variety;        
   }
   
   /*this will calculate varying cost inquiries whether choosing a maximum
   or a minimum, a range between the max and min or a specific price
   When the cost is calculated, the $queryString and the $valueArray will
   be updated */
   returnCostOfWine($minCost,$maxCost,$queryString,$valueArray);
   
   returnYearOfWine($minYear,$maxYear,$queryString,$valueArray);
   
   returnWineInStock($minStock, $queryString, $valueArray);
   
   //returnWinesOrdered($minOrdered, $queryString, $valueArray);
  
   $query.= $queryString;
   
   return $valueArray;      
   
}

/*this to check if there is a value for the where clause in search query*/
function checkInput($var){
   
   if($var == '' || $var == 'All'){
      return false;
   }      
   return true;
}

function getGrapeVariety($wineId, &$handler){
      
   $query = '
            SELECT   grape_variety.variety  AS grapeVariety
               FROM  grape_variety
            INNER
               JOIN  wine_variety
            ON       wine_variety.variety_id = grape_variety.variety_id
            WHERE    wine_variety.wine_id = :wineId';
   
   $array = array(':wineId' => $wineId);
   
   $grape_variety = $handler->prepare($query);
   $grape_variety->execute($array);
   
   $grapes = '';
   
   while($r = $grape_variety->fetch(PDO::FETCH_OBJ)){
      
      $grapes.= $r->grapeVariety.',';
      
   }
   return $grapes;
   
}   

function getTotalWIneSold($wineId, &$handler){
      
   $query = '
            SELECT   SUM(items.qty) AS totalSoldQty
               FROM  items
            WHERE    items.wine_id = :wineId';
   
   $array = array(':wineId' => $wineId);
   
   $totalWineSold = $handler->prepare($query);
   $totalWineSold->execute($array);
   
   $totalSold = $totalWineSold->fetch(PDO::FETCH_NUM);

   return $totalSold[0];
   
}

function getTotalSoldPrice($wineId, &$handler){
      
   $query = '
            SELECT   SUM(items.price) AS totalSoldPrice
               FROM  items
            WHERE    items.wine_id = :wineId';
   
   $array = array(':wineId' => $wineId);
   
   $totalSold = $handler->prepare($query);
   $totalSold->execute($array);
   
   $totalSoldPrice = $totalSold->fetch(PDO::FETCH_NUM);

   return $totalSoldPrice[0];
   
}

function returnYearOfWine($minYear,$maxYear,&$queryString,&$valueArray){
      
   if($minYear == '' && $maxYear == ''){
      return;
   }elseif($minYear == '' && $maxYear != ''){
      $queryString .= ' AND (wine.year <= :maxYear)';        
      $valueArray[':maxYear'] = $maxYear;
   }elseif($minYear != '' && $maxYear == ''){
      $queryString .= ' AND (wine.year >= :minYear)';        
      $valueArray[':minYear'] = $minYear;
   }else{
      $queryString .= ' AND (wine.year BETWEEN :minYear AND :maxYear)';         
      $valueArray[':minYear'] = $minYear;
      $valueArray[':maxYear'] = $maxYear;
   }
}


function returnCostOfWine($minCost,$maxCost,&$queryString,&$valueArray){
      
   if($minCost == '' && $maxCost == ''){
      return;
   }elseif($minCost == '' && $maxCost != ''){
      $queryString .= ' AND (inventory.cost <= :maxCost)';        
      $valueArray[':maxCost'] = $maxCost;
   }elseif($minCost != '' && $maxCost == ''){
      $queryString .= ' AND (inventory.cost >= :minCost)';        
      $valueArray[':minCost'] = $minCost;
   }else{
      $queryString .= ' AND (inventory.cost BETWEEN :minCost AND :maxCost)';         
      $valueArray[':minCost'] = $minCost;
      $valueArray[':maxCost'] = $maxCost;      
   }
}


   
function returnWineInStock($minStock,&$queryString,&$valueArray){
   
   if($minStock == ''){
      return;
   }else{
      $queryString .= ' AND (inventory.on_hand >= :minStock)';        
      $valueArray[':minStock'] = $minStock;
   }
}

function returnWinesOrdered($minOrdered,&$queryString,&$valueArray){
   
   if($minOrdered == ''){
      return;
   }else{
      $queryString .= ' AND (items.qty >= :minOrdered)';        
      $valueArray[':minOrdered'] = $minOrdered;
   }
}

?>