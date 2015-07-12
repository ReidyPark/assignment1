<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php
/* initialising drop down lists for year range selection */

require_once (DATA_PATH.'initialData.php');
   
$wineYears = new MiniTemplator;

$wineYears->readTemplateFromFile (YEARS_TEMPLATE);  

while($r = $wine_years->fetch(PDO::FETCH_OBJ)){
   
   $wineYears->setVariable ("minYear", $r->minYear);
   $wineYears->setVariable ("maxYear", $r->maxYear);
   $wineYears->addBlock ("block1"); 
   
}

?>