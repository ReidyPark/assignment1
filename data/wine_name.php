<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php
   /* initiating wine name list for search box in search.php*/
   
   require_once (DATA_PATH.'initialData.php');
   
   $wineNames = new MiniTemplator;

   $wineNames->readTemplateFromFile ("./../views/templates/wine_name.htm");   
   
   while($r = $wine_name->fetch(PDO::FETCH_OBJ)){
      
   $wineNames->setVariable ("wineName",$r->wine_name);
   $wineNames->addBlock ("block1");
}
?>