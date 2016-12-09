<?php
print "<!-- BEGIN include security -->";
//security checks
function securityCheck($formURL = "") {
    $debugThis = false; 
  $status = true; //
//make sure it submits
if ($formURL !="") {
    $fromPage = htmlentities($_SERVER['HTTP_REFERER'], ENT_QUOTES, "UTF-8");
 //remove http/https
 $fromPage = preg_replace('#^https?:#', '', $fromPage);
 
 if ($debugThis)
     print "<p>From: " . $fromPage . "should match your URL: " . $formURL;
 
 if ($frompage != $formURL) {
     $status = false;
    }
}
 
 return $status; 
}
print "<!-- END include security -->"; 
 ?>