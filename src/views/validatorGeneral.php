<!-- submitted by Annette Reid s3297925
 Assignment 1 CPT375  -->
 
<?php
   /* validating user input text */ 
   require_once  (__DIR__ . '/../config.php');
   
   
function checkValidText($text){
/*used regex for text validation using only letters and spaces
stackoverflow.com/questions/19607402/php-preg-match-regex-to-find
-letters-numbers-and-spaces*/
   if($text == ''){
      return true;
   }elseif (!preg_match('/^[a-z ]+$/i', $text)) {
      return false; 
   }
   return true;
}

function checkValidCurr($amount){
/*used regex for number validation using none or 2 decimal places
stackoverflow.com/questions/16588086/regular-expression-for-valid
-2-digit-decimal-number*/

   if($amount == ''){
      return true;
   }elseif(!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $amount)){         
      return false; 
   }      
   return true;
}
   
function checkValidNum($number){
/*used regex for number validation using none or 2 decimal places
stackoverflow.com/questions/16588086/regular-expression-for-valid
-2-digit-decimal-number*/

   if($number == ''){
      return true;
   }elseif(!preg_match('/^[1-9][0-9]*$/', $number)){         
      return false; 
   }      
   return true;
}

/*check to see if there are any errors in the values input*/

function noErrors(         $wine_name, 
                           $winery_name,
                           $minCost,
                           $maxCost,
                           $minStock,
                           $minOrdered ){
                              
      if(!checkValidText($wine_name)){
         return false;
      }elseif(!checkValidText($winery_name)){
         return false;
      }elseif(!checkValidCurr($minCost)){
         return false;
      }elseif(!checkValidCurr($maxCost)){
         return false;
      }elseif(!checkValidNum($minStock)){
         return false;
      }elseif(!checkValidNum($minOrdered)){
         return false;
      }else{
         return true;
      }
}
?>