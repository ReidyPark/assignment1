<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->

<?php

   /*search for wines using values in form */
   include ('validatorGeneral.php');
   
   
   session_unset();   
   if(isset($_GET['Submit'])){
      
      $_SESSION['search'] = "";
      
      $region_name = $_GET['region_name'];      
      $grape_variety = $_GET['grape_variety'];
      $wine_name = $_GET['wine_name'];
      $winery_name = $_GET['winery_name'];
      $minCost = $_GET['minCost'];
      $maxCost = $_GET['maxCost'];
      $minInputYear = $_GET['minInputYear'];
      $maxInputYear = $_GET['maxInputYear'];
      $minYear = $_GET['minYear'];
      $maxYear = $_GET['maxYear'];
      $minStock = $_GET['minStock'];
      $minOrdered = $_GET['minOrdered'];
      
      if(noErrors(   $wine_name, 
                     $winery_name,
                     $minCost,
                     $maxCost,
                     $minStock,
                     $minOrdered )){  
                        
         
         $goToResults = './../data/answer.php';
         
       
      }
     
   }
      
    include ('templates/header.htm');

?>
<h2>Wine Store Search</h2>   
<form id="registration_form"
                  onsubmit="return checkForm()"
                  method="get"
                  action="<?php if(isset($goToResults)){echo $goToResults;} ?>" >	
                  
                  
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
         id="winery_name"
         value=""
         readonly> <!-- known error with part name search for winery if 
                     wine name is empty - WHERE clause not reading -->
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
         <span>Select a year greater than </span>
         <?php $wineYears->generateOutput(); ?>
      </label> 
      
      <br>
      <br>
      <div id="year" class="block">
         <input
         type="text" 
         name="minInputYear"
         id="minInputYear">
         <input
         type="text" 
         name="maxInputYear"
         id="maxInputYear">
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
         Input a minimum and maximum (or either or none) cost per bottle
      </label>
      <br>
      <br>
      <div id="wineCostRange" class="block">
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
   <div id="submitButtons" class="block"> 
      <input 
         class="submitButton" 
         type="submit" 
         name="Submit"
         value="Submit"/>
      <input 
         class="submitButton" 
         type="reset" 
         value="Reset"/>
   </div>         
</form>
<?php include ('templates/footer.htm'); ?>