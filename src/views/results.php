<?php

require_once  (__DIR__ . '/../config.php');

?>

<body>

<table style="width:100%">
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
   <?php $resultsTable->generateOutput(); ?>
</table>

</body>