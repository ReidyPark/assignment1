<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->

<?php
   /*search for wines using values in form */
   require_once  ('config.php');
   include ('views/validatorGeneral.php');    
   include ('views/templates/header.htm');
   
   if(isset($_GET['Submit']) == "Submit"){
      
      $_SESSION['search'] = "";
      
      /*add all the form data to session variables to pass to answer.php*/
      $_SESSION['region_name'] =  $region_name = $_GET['region_name'];      
      $_SESSION['grape_variety'] =  $grape_variety = $_GET['grape_variety'];
      $_SESSION['wine_name'] = $wine_name = $_GET['wine_name'];
      $_SESSION['winery_name'] = $winery_name = $_GET['winery_name'];
      $_SESSION['minCost'] = $minCost = $_GET['minCost'];
      $_SESSION['maxCost'] = $maxCost = $_GET['maxCost'];
      $_SESSION['minInputYear'] = $minInputYear = $_GET['minInputYear'];
      $_SESSION['maxInputYear'] = $maxInputYear = $_GET['maxInputYear'];
      $_SESSION['minStock'] = $minStock = $_GET['minStock'];
      $_SESSION['minOrdered'] = $minOrdered = $_GET['minOrdered'];
      $minYear = $_GET['minYear'];
      $maxYear = $_GET['maxYear'];
      
      /*check for any validation issues in validatorGeneral.php checking for
      * text, currency and number validations */
      $errorType = checkAnyErrors(  $wine_name, 
                                    $winery_name,
                                    $minCost,
                                    $maxCost,
                                    $minStock,
                                    $minOrdered,
                                    $minInputYear,
                                    $maxInputYear,
                                    $minYear,
                                    $maxYear);
           
      if($errorType == 'none'){
         header('Location: answer.php'); 
      }else{
         /* create an alert with the error so user can change it */
         echo '<script type="text/javascript">';
			echo 	'alert("'.$errorType.'")';
			echo '</script>';
      }
   }
     
?>
<div class="search_form">
   <h2>Wine Store Search</h2>   
   <form id="registration_form"
         method="get"
         action="" >	
                     
                     
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
         <select id="region_name" 
                 name="region_name">
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
      <div id="yearSelection buttonInline">
         <label class="label">
            <span>Select a year greater than </span>
            <?php $wineYears->generateOutput(); ?>
         </label> 
        
            <input
            class="input"
            type="text" 
            name="minInputYear"
            id="minInputYear"            
            size="4"
            maxlength="4"
            placeholder="yyyy">
            <input
            class="input"
            type="text" 
            name="maxInputYear"
            id="maxInputYear"
            size="4"
            maxlength="4"
            placeholder="yyyy">
         
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
            id="minStock"
            size="10">
      </div>
      <br>
      <br>
      <div id="winesOrdered">
         <label for="minOrdered" class="label">
            Input a minimum number of wines ordered (per order)
         </label>
         <input
            type="text" 
            name="minOrdered"
            id="minOrdered"
            size="10">
      </div>
      <br>
      <br>
      <div id="costRange buttonInline">
         <label for="wineCostRange" class="label">
            Input a minimum and maximum (or either or none) cost per bottle
         </label>
            <input
               class="input"
               type="text" 
               name="minCost"
               size="5"
               id="minCost"
               placeholder="$">
            <input
               class="input"
               type="text" 
               name="maxCost"               
               size="5"
               id="maxCost"
               placeholder="$">
      </div>
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
</div>
<?php include ('views/templates/footer.htm'); ?>