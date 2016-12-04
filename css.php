<?php
include "top.php";


//ok so we need to display whatever css properties the user wanted
$color = htmlentities($_GET['col'], ENT_QUOTES, "UTF-8");
$bgColor = htmlentities($_GET['bgCol'], ENT_QUOTES, "UTF-8");
$float = htmlentities($_GET['float'], ENT_QUOTES, "UTF-8");
$margin = htmlentities($_GET['margin'], ENT_QUOTES, "UTF-8");

print "<p class=" . $color . " " . $bgColor . " " . $float . " " . $margin . ">This is our paragraph that is being modified. Wooh! Go SeaHawks! I'm just kidding. I feel very neutrally about the seahawks.</p>";

?>
</body>
</html>