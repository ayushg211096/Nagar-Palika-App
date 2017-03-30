<?php
require_once 'condb.php';

//base url
$siteurl="../";
$sitename="Nagar Palika Newai App";
if(!isset($pheadtitle)){
$pheadtitle="Nagar Palika Newai App";	
}
else{
	$pheadtitle=$pheadtitle." :: Nagar Palika Newai App";
}
$pheaddescrip="Nagar Palika Newai App";

//functions
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
?>