<?php
 
   /* results from search.php input returned as a string */
   require_once  (__DIR__ . '/../config.php');
   include ('templates/header.htm');
?>
<div>
   <h2 class="backToSearch">Search Results</h2>
   <button type="button" 
           class="submitButton backButton backToSearch"
           onclick="location.href='./../data/answer.php'">Back to Search</button>
</div>
<table class="searchResults">
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