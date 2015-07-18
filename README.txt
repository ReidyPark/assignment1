********************************************************************************
*  Annette Reid s3297925 Web Database Applications Assignment 1
*
*           README.txt     - student/Assignment information
********************************************************************************

Student number -  s3297925
Student email  -  s3297925@student.rmit.edu.au
Contact method -  student email

********************************************************************************
Notes: 

18/07/2015**********************************************************************

GitHub repository address: https://github.com/ReidyPark/assignment1

Assumptions:   I made the assumption that the values for minimum number of wines
               ordered was number of wines ordered per order from items table.

Known bugs:    Have to hit submit button twice in the search page - doing a 
               rethink to get this working - have as yet not resolved it.
               The URL is populated with the results but the fields will go 
               blank and data needs to be re-input.
               
               I tried deleting all php code back to bare bones:
               
                  if(isset($_GET['Submit'])){      
                     $_SESSION['search'] = "";
                     $goToResults = 'answer.php';} 
                  
               <form id="registration_form"
                     method="get"
                     action="<?php if(isset($goToResults))
                                                      {echo $goToResults;} ?>" >
                  
               But still needed to hit submit button twice, I also tried using 
               session data but could not get that to work. I am awaiting an
               email from Halil - to hopefully help clear it up.

Fixed bugs:    Fixed the winery_name search function - now able search for winery
               name without an input for wine name.
               
               Completed validation for user input with a pop up alert for 
               incorrect input. Have added placeholders to help with the format
               for the input and have used the ENT_COMPAT paramater in the 
               htmlentities function to allow for single quotes in name search
               in the security.php file.
               
14/07/2015**********************************************************************

GitHub repository address: https://github.com/ReidyPark/assignment1

Assumptions:   I made the assumption that the values for minimum number of wines
               ordered was number of wines ordered per order from items table.

Known bugs:    

Fixed bugs:    Fixed the winery_name search function - now able search for winery
               name without an input for wine name.
               
               Completed validation for user input with a pop up alert for 
               incorrect input. Have added placeholders to help with the format
               for the input and have used the ENT_COMPAT paramater in the 
               htmlentities function to allow for single quotes in name search
               in the security.php file.

05/07/2015**********************************************************************

GitHub repository address: https://github.com/ReidyPark/assignment1

Assumptions:   I made the assumption that the values for minimum number of wines
               ordered was the total number or wines ordered and choosing a 
               minimum value for this.

Known bugs: The input for the winery name has been disabled due to problems
            with the sql query - if there is no value for the wine name, then
            I have had trouble getting it to generate the query.
            I ran out of time to fix it.
            
            There is no complete error function for checking for input as I ran
            out of time - the values go through a validator - but I didn't get 
            a chance to fully test this.

30/06/2015**********************************************************************

Deleted github repository, and created a new one because I had forgotten to use
the .gitignore for the connection data, exposing this.

********************************************************************************


