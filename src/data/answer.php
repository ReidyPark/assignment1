<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  --> 

<?php

/* Initialise data for the search values on search.php*/

require_once  (__DIR__ . '/../config.php');
require_once (DATA_PATH.'MiniTemplator.class.php');
require_once (DATA_PATH.'answerHelper.php');


// $resultsTable = new MiniTemplator;

// $resultsTable->readTemplateFromFile ("./../views/templates/results.htm");

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
   
   return $searchQuery;
     
      
}
?> 