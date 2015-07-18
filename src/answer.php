<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php
/* Initialise data for the search values on search.php*/
require_once  ('config.php');
require_once (DATA_PATH.'MiniTemplator.class.php');
require_once (DATA_PATH.'answerHelper.php');

$resultsTable = new MiniTemplator;
$resultsTable->readTemplateFromFile ("views/templates/results.htm");
$outputString = '';

$region_name = $_SESSION['region_name'];
$grape_variety = $_SESSION['grape_variety'];
$wine_name = escape($_SESSION['wine_name']);
$winery_name = escape($_SESSION['winery_name']);
$minCost = escape($_SESSION['minCost']);
$maxCost = escape($_SESSION['maxCost']);
$minInputYear = escape($_SESSION['minInputYear']);
$maxInputYear = escape($_SESSION['maxInputYear']);
$minStock = escape($_SESSION['minStock']);
$minOrdered = escape($_SESSION['minOrdered']);
  
global $handler;
$query = buildInitialQuery();
if($_SESSION['search'] == ""){
   $queryValues = searchQueryValues($query,
                                    $wine_name,
                                    $winery_name,
                                    $region_name,
                                    $grape_variety,
                                    $minCost,
                                    $maxCost,
                                    $minInputYear,
                                    $maxInputYear,
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
   $resultsTable->generateOutputToString($_SESSION['search']);
   header('Location: results.php');
   exit();
   
}else{
   session_destroy();
   header('Location: search.php');
   exit();
   
} 
?> 