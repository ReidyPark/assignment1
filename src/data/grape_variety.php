<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php

/* initialising grape_variety for drop down list */

require_once (DATA_PATH.'initialData.php');
   
$grapeVarieties = new MiniTemplator;

$grapeVarieties->readTemplateFromFile ("./../views/templates/grape_variety.htm");   

while($r = $grape_variety->fetch(PDO::FETCH_OBJ)){
   
   $grapeVarieties->setVariable ("grapeName",$r->variety);
   $grapeVarieties->addBlock ("block1");
}