

<?php


   require_once  (__DIR__ . '/../config.php');

   require_once (VIEWS_PATH.'templateInclude.php');
   
   if(isset($_GET['Submit'])){
  
      
		$region_name = $_GET['region_name'];
      $wine_name = escape($_GET['wine_name']);
      
      
     
         
         echo '<script type="text/javascript">';
         echo 	'alert("Congratulations '.$region_name.' '.$wine_name.
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
         Input a name of a wine (or part of a name)
      </label>
      <input
         type="text" 
         name="wine_name"
         id="wine_name">
      <span class="extraInfo">
         Please enter all if you are looking for any wine name.
      </span>

   </div>
                     
                     <label for="region_name" class="label">
      Select a region from the following list.
   </label>
   <select id="region_name" name="region_name">   
   <?php $regionNames->generateOutput();
         //unsetting region names to reduce load
         unset($regionNames);?>
   </select>
                
                     
                     
   <ul id="formButtons">
								<li>
									<input 
										class="submitButton" 
										type="submit" 
										name="Submit"
										value="Submit"/>
								</li>
								<li>
									<input 
										class="submitButton" 
										type="reset" 
										value="Reset"/>
								</li>								
							</ul>	
                     
                     
                     
   </form>
    
</body>