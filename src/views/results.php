<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->

 <?php
 
   /* results from search.php input returned as a string */

   require_once  (__DIR__ . '/../config.php');
   require_once (DATA_PATH.'answer.php');

   
   $region_name = $_GET['region_name'];      
   $grape_variety = $_GET['grape_variety'];
   $wine_name = escape($_GET['wine_name']);
   $winery_name = escape($_GET['winery_name']);
   $minCost = escape($_GET['minCost']);
   $maxCost = escape($_GET['maxCost']);
   $minYear = $_GET['minYear'];
   $maxYear = $_GET['maxYear'];
   $minStock = escape($_GET['minStock']);
   $minOrdered = escape($_GET['minOrdered']);
   
   /*if this is a new search, assign result string to session so database
   not called again */
   if($_SESSION['search'] == ""){   
      $_SESSION['search'] = buildAnswerQuery(
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
   } 

   include ('templates/header.htm');

?>


<h2>Search Results</h2>

<table>
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
  <?php //writing out table for result data returned as a string
      if(isset($_SESSION['search'])){
         echo $_SESSION['search']; 
      } ?>
</table>
<?php include ('templates/footer.htm'); ?>