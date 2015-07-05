<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Initialise data for the search values on search.php*/

require_once  (__DIR__ . '/../config.php');
require_once (DATA_PATH.'MiniTemplator.class.php');
require_once (DATA_PATH.'answerHelper.php');


$resultsTable = new MiniTemplator;

$resultsTable->readTemplateFromFile ("./../views/templates/results.htm");

   
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
      
      global $resultsTable;
      
      $grapeVariety = getGrapeVariety($r->wineId, $handler);
      $totalWineSold = getTotalWIneSold($r->wineId, $handler);
      $totalSoldPrice = getTotalSoldPrice($r->wineId, $handler);
      
      $resultsTable->setVariable ("wineName",$r->wineName);
      $resultsTable->setVariable ("grapeVariety", $grapeVariety);
      $resultsTable->setVariable ("year", $r->year);
      $resultsTable->setVariable ("wineryName", $r->wineryName);
      $resultsTable->setVariable ("regionName", $r->regionName);
      $resultsTable->setVariable ("wineCost", $r->wineCost);
      $resultsTable->setVariable ("bottlesAvail",$r->bottlesAvail);
      $resultsTable->setVariable ("totalWineSold", $totalWineSold);
      $resultsTable->setVariable ("totalSoldPrice", $totalSoldPrice);
      $resultsTable->addBlock ("block1");
   }
      
}
?> 