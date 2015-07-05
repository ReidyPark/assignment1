<?php

require_once  (__DIR__ . '/../config.php');
require_once (DATA_PATH.'answer.php');


$resultsTable = new MiniTemplator;

$resultsTable->readTemplateFromFile ("./../views/templates/results.htm");



$region_name = $_GET['region_name'];      
$grape_variety = $_GET['grape_variety'];
$wine_name = escape($_GET['wine_name']);
$winery_name = escape($_GET['winery_name']);
$minCost = $_GET['minCost'];
$maxCost = $_GET['maxCost'];
$minYear = $_GET['minYear'];
$maxYear = $_GET['maxYear'];
$minStock = $_GET['minStock'];
$minOrdered = $_GET['minOrdered'];

$newSearchQuery;


if (isset($_SESSION['search']) == 'newSearch') { 

   global $newSearchQuery;
   
  $newSearchQuery =  buildAnswerQuery(
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
      $_SESSION['search'] = 'empty';
      
      while($r = $newSearchQuery->fetch(PDO::FETCH_OBJ)){
      
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
	
}else{
   
   
      
		echo $_SESSION['search'];
}





?>

<body>

<table style="width:100%">
   <tr>
      <th>Wine Name</th>
      <th>Grape Varieties</th>
      <th>Year</th>
      <th>Winery</th>
      <th>Region</th>
      <th>Cost $</th>
      <th>Total Avail</th>
      <th>Total Sold</th>
      <th>Total Sales $</th>
   </tr>
   <?php $resultsTable->generateOutput(); ?>
</table>

</body>