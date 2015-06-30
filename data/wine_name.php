<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php
   /* initiating wine name list for search box in search.php*/
   
   require_once (DATA_PATH.'initialData.php');
   
   $t = new MiniTemplator;

   $t->readTemplateFromFile ("./../views/templates/output.htm");   
   
   while($r = $wine_name->fetch(PDO::FETCH_OBJ)){
      
   $t->setVariable ("wineName",$r->wine_name);
   $t->addBlock ("block1");
}
   

?>