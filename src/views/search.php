

<?php


   require_once  (__DIR__ . '/../config.php');
   
   if (isset($_SESSION['search']) == 'empty') {
      $_SESSION['search'] = 'newSearch';
      
		echo $_SESSION['search'];
	}
   
   if(isset($_GET['Submit'])){
         
   }
   
   
?>
<body>   
   <form id="registration_form"
							onsubmit="return checkForm()"
							action="results.php" 
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
      <label for="grape_variety" class="label">
         Select a grape variety from the following list.
      </label>
      <select id="grape_variety" name="grape_variety">         
         <option value="All">All</option>
         <?php $grapeVarieties->generateOutput(); ?>
      </select>
   </div>             
   <br>
   <br>
   <div id="yearSelection">
      <label for="year" class="label">
         Select a year range (please select from drop down box)
      </label>
      <br>
      <br>
      <div id="yearList" style="display:block;">
         <select id="minYear" name="minYear"> 
            <option value=""></option>
            <?php $wineYears->generateOutput(); ?>
         </select>
         <select id="maxYear" name="maxYear">
            <option value=""></option>
            <?php $wineYears->generateOutput(); ?>
         </select>
      </div>
   </div>             
   <br>
   <br>
   <div id="winesInStock">
      <label for="minStock" class="label">
         Input a minimum number of wines in stock (per wine)
      </label>
      <input
         type="text" 
         name="minStock"
         id="minStock">
   </div>
   <br>
   <br>
   <div id="winesOrdered">
      <label for="minOrdered" class="label">
         Input a minimum number of wines ordered (per wine)
      </label>
      <input
         type="text" 
         name="minOrdered"
         id="minOrdered">
   </div>
   <br>
   <br>
   <div id="costRange">
      <label for="wineCostRange" class="label">
         Input a minimum number of wines ordered (per wine)
      </label>
      <br>
      <br>
      <div id="wineCostRange" style="display:block;">
         <input
            type="text" 
            name="minCost"
            id="minCost"
            placeholder="$">
         <input
            type="text" 
            name="maxCost"
            id="maxCost"
            placeholder="$">
      </div>
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