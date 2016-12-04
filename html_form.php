<?php
include "top.php";

$element = "paragraph";
?>


<form action = "<?php print $phpSelf; ?>" method = "get" id = "frmHTML">
    <fieldset class = "listbox <?php if ($htmlERROR) print ' mistake' ?>">
        <label for = "lstHTML">HTML Element to display?</label>
        <select id = "lstHTML"
                name = "lstHTML"
                tabindex = "120">
            <option <?php if ($element == "paragraph") print " selected "; ?>
                value="paragraph">&#60p&#62</option>

            <option <?php if ($element == "head1") print " selected "; ?>
                value="head1">&#60h1&#62</option>

            <option <?php if ($element == "head2") print " selected "; ?>
                value="head2">&#60h2&#62</option>
            
            <option <?php if ($element == "head3") print " selected "; ?>
                value="head3">&#60h3&#62</option>
            
            <option <?php if ($element == "figure") print " selected "; ?>
                value="figure">&#60figure&#62</option>
            
            <option <?php if ($element == "aside") print " selected "; ?>
                value="aside">&#60aside&#62</option>
            
            <option <?php if ($element == "article") print " selected "; ?>
                value="article">&#60article&#62</option>
            
            <option <?php if ($element == "header") print " selected "; ?>
                value="header">&#60header&#62</option>
            
            <option <?php if ($element == "footer") print " selected "; ?>
                value="footer">&#60footer&#62</option>
        </select>
    </fieldset>
    <fieldset class="buttons">
            <legend></legend>
            <input type="submit" id="btnSubmit" name="btn" value="submit" tabindex="900" class="button" >
        </fieldset>

</form>


<?php 
$submitted = htmlentities($_GET["btn"], ENT_QUOTES, "UTF-8");
$element = htmlentities($_GET["lstHTML"], ENT_QUOTES, "UTF-8");
if ($submitted == "submit"){
    print "<a href='html.php?elm=". $element . "'>Check it out!</a>";
}
?>
</body>
</html>