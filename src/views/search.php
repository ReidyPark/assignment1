

<?php


   require_once  (__DIR__ . '/../config.php');
   
   if(isset($_GET['Submit'])){
  
		$region_name = $_GET['region_name'];      
      $grapeVariety = $_GET['grapeVariety'];
      $wine_name = escape($_GET['wine_name']);
      $winery_name = escape($_GET['winery_name']);
      
      
      
      
      
      
      
     
         
         echo '<script type="text/javascript">';
         echo 	'alert("Congratulations '.$region_name.' '.$wine_name.' '.$winery_name.' '.$grapeVariety.
               '\nYou have successfully registered for a ")';
         echo '</script>';
   }
   
   
?>
<body>   
   <form id="registration_form"
							onsubmit="return checkForm()"
							action="" 
							method="get">	
                     
                     
   <div id="wineInput">
      <label for="wine_name" class="label">
         Input a name of a wine (or part of a name or leave blank)
      </label>
      <input
         type="text" 
         name="wine_name"
         id="wine_name">
   </div>
   <br>
   <br>
   <div id="wineryInput">
      <label for="winery_name" class="label">
         Input a name of a winery (or part of a name or leave blank)
      </label>
      <input
         type="text" 
         name="winery_name"
         id="winery_name">
   </div>
   <br>
   <br>
   <div id="regionSelection">
      <label for="region_name" class="label">
         Select a region from the following list.
      </label>
      <select id="region_name" name="region_name">
         <option value="All">All</option>
         <?php $regionNames->generateOutput(); ?>
      </select>
   </div>
   <br>
   <br>
   <div id="grapeVarietySelection">
      <label for="grapeVariety" class="label">
         Select a grape variety from the following list.
      </label>
      <select id="grapeVariety" name="grapeVariety">         
         <option value="All">All</option>
         <?php $grapeVarieties->generateOutput(); ?>
      </select>
   </div>             
   <br>
   <br>
   <div id="submitButtons">                     
      <ul>
         <li>
            <input 
               class="submitButton" 
               type="submit" 
               name="Submit"
               value="Submit"/>
         </li>
         <br>
         <li>
            <input 
               class="submitButton" 
               type="reset" 
               value="Reset"/>
         </li>								
      </ul>	
   </div>                  
                     
                     
   </form>
    
</body>