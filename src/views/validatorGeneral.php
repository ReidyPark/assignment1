<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php
   /* validating user input text */ 
   require_once  (__DIR__ . '/../config.php');
/*check to see if there are any errors in the values input, if there is
then return error message for invalid input */
function checkAnyErrors(&$wine_name, 
                        &$winery_name,
                        &$minCost,
                        &$maxCost,
                        &$minStock,
                        &$minOrdered,
                        &$minInputYear,
                        &$maxInputYear,
                        $minYear,
                        $maxYear){
                              
      if(!checkValidText($wine_name)){
         $wine_name = '';
         return 'Please check that there are no invalid'.
                '\ncharacters entered for Wine name';
      }elseif(!checkValidText($winery_name)){
         $winery_name = '';
         return 'Please check that there are no invalid'.
                '\ncharacters entered for Winery name';
      }elseif(!checkValidCurr($minCost) || !checkValidCurr($maxCost) ){
         $minCost = '';
         $maxCost = '';
         return 'Please check that currency is written in the correct '. 
                '\nformat for cost of Wine with up to 2 decimal places';
      }elseif(!checkValidNum($minStock)){
         $minStock = '';
         return 'Please ensure that a valid whole number is entered'.
                '\nfor the number of Wines in stock';
      }elseif(!checkValidNum($minOrdered)){
         $minOrdered = '';
         return 'Please ensure that a valid whole number is entered'.
                '\nfor the minimum number of Wines ordered';
      }elseif(!checkValidYear($minYear,$maxYear,$minInputYear,$maxInputYear)){
         $minInputYear = '';
         $maxInputYear = '';
         return 'Please make sure that year range is between'.
                '\n'.$minYear.' and '.$maxYear.' for Wine year';
      }else{
         /*reset all fields if no errors*/
         $wine_name = '';
         $winery_name = '';
         $minCost = '';
         $maxCost = '';
         $minStock = '';
         $minOrdered = '';
         $minInputYear = '';
         $maxInputYear = '';
         
         return 'none';
      }
}   
   
function checkValidText($text){
/*used regex for text validation using only letters and spaces
stackoverflow.com/questions/19607402/php-preg-match-regex-to-find
-letters-numbers-and-spaces*/
   if($text != ''){
      if (!preg_match('/^[a-z \']+$/i', $text)) {
         return false; 
      }
   }
   return true;
}
function checkValidCurr($amount){
/*used regex for number validation using none or 2 decimal places
stackoverflow.com/questions/16588086/regular-expression-for-valid
-2-digit-decimal-number*/
   if($amount != ''){
      if(!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $amount)){         
         return false; 
      }
   }      
   return true;
}
   
function checkValidNum($number){
/*used regex for number validation using none or 2 decimal places
stackoverflow.com/questions/16588086/regular-expression-for-valid
-2-digit-decimal-number*/
   if($number != ''){
      if(!preg_match('/^[1-9][0-9]*$/', $number)){         
         return false; 
      }
   }      
   return true;
}
/*checking that year of wine is a valid entry - against min and max year
and that min year is smaller or equal to max year. */
function checkValidYear($minYear,$maxYear,$minInputYear,$maxInputYear){
      
   if($minInputYear != '' || $maxInputYear != ''){
      /* this checks to see that the year is written as yyyy format*/
      if( !(preg_match('/^[0-9]{4}$/',$minInputYear)) || 
      							!(preg_match('/^[0-9]{4}$/',$maxInputYear)) ){
               
         return false;               
      }elseif($minInputYear > $maxInputYear || $maxInputYear < $minInputYear){
         return false;
      }elseif($minInputYear < $minYear || $minInputYear > $maxYear){
         return false;
      }elseif($maxInputYear < $minYear || $maxInputYear > $maxYear){
         return false;
      }
   }
   return true;   
}
?>