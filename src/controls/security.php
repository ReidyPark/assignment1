<?php
function escape($string){
	return htmlentities(trim($string), ENT_COMPAT, 'UTF-8');
   
}