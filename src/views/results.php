<?php
 
   /* results from search.php input returned as a string */
   require_once  (__DIR__ . '/../config.php');
   include ('templates/header.htm');
?>
<div class="block">
<h2>Search Results</h2>
<span>
<button type="button" 
        class="submitButton"
        onclick="location.href='./../data/answer.php'">Back</button>
</span>
</div>
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