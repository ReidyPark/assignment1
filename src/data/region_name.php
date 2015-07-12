<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php
   /* initiating wine name list for search box in search.php*/
   
   require_once (DATA_PATH.'initialData.php');
   
   
   $regionNames = new MiniTemplator;

   $regionNames->readTemplateFromFile (REGION_TEMPLATE);   
   
   while($r = $region_name->fetch(PDO::FETCH_OBJ)){
      
   $regionNames->setVariable ("regionName",$r->region_name);
   $regionNames->addBlock ("block1");
   }
   

?>