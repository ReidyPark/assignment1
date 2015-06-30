<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php
   /* initiating wine name list for search box in search.php*/
   
   require_once (DATA_PATH.'initialData.php');
   
   
   $r = new MiniTemplator;

   $r->readTemplateFromFile ("./../views/templates/output.htm");   
   
   while($s = $region_name->fetch(PDO::FETCH_OBJ)){
      
   $r->setVariable ("regionName",$s->region_name);
   $r->addBlock ("block1");
}
   

?>