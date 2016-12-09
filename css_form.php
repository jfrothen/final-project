<?php
include "top.php";

$lstColor = "black";
$lstBgColor = "white";
$float = "none";
$margin = "small";

?>


<form action = "<?php print $phpSelf; ?>" method = "get" id = "frmCSS">
    <fieldset class = "listbox <?php if ($cssERROR) print ' mistake' ?>">
        <label for = "lstColor">Color</label>
        <select id = "lstColor"
                name = "lstColor"
                tabindex = "120">
            <option <?php if ($color == "red ") print " selected "; ?>
                value="red">red</option>

            <option <?php if ($color == "blue") print " selected "; ?>
                value="blue">blue</option>

            <option <?php if ($color == "black") print " selected "; ?>
                value="black">black</option>
            
            <option <?php if ($color == "gray") print " selected "; ?>
                value="gray">gray</option>
        </select>
    </fieldset>
    
    <fieldset class = "listbox <?php if ($colorERROR) print ' mistake' ?>">
        <label for = "lstBgColor">Background color</label>
        <select id = "lstBgColor"
                name = "lstBgColor"
                tabindex = "220">
            <option <?php if ($bgColor == "white") print " selected "; ?>
                value="whiteBg">white</option>

            <option <?php if ($bgColor == "black") print " selected "; ?>
                value="blackBg">black</option>

            <option <?php if ($bgColor == "gray") print " selected "; ?>
                value="grayBg">gray</option>
            
            <option <?php if ($bgColor == "yellow") print " selected "; ?>
                value="yellowBg">yellow</option>
        </select>
    </fieldset>
    
    <fieldset class="radio" <?php if ($floatERROR) print ' mistake'; ?>">
            <legend>Float</legend>
            <label><input <?php if ($float == "none") print 'checked'; ?>
                    id="radFloatNone"
                    name="radFloat"
                    tabindex="330"
                    type="radio"
                    value="none">none</label>
            
            <label><input <?php if ($float == "left") print 'checked'; ?>
                    id="radFloatLeft"
                    name="radFloat"
                    tabindex="340"
                    type="radio"
                    value="left">left</label>
            
            <label><input <?php if ($gender == "right") print 'checked'; ?>
                    id="radFloatRight"
                    name="radFloat"
                    tabindex="350"
                    type="radio"
                    value="right">right</label>
        </fieldset>
    
    <fieldset class="radio" <?php if ($marginERROR) print ' mistake'; ?>">
            <legend>How big a margin do you desire</legend>
            <label><input <?php if ($margin == "big") print 'checked'; ?>
                    id="radMarginBig"
                    name="radMargin"
                    tabindex="330"
                    type="radio"
                    value="big">10 em</label>
            
            <label><input <?php if ($margin == "small") print 'checked'; ?>
                    id="radMarginSmall"
                    name="radMargin"
                    tabindex="340"
                    type="radio"
                    value="small">5 em</label>
            
            <label><input <?php if ($margin == "none") print 'checked'; ?>
                    id="radMarginNone"
                    name="radMargin"
                    tabindex="350"
                    type="radio"
                    value="none">no margin, you animal</label>
        </fieldset>
    
    
    
    <fieldset class="buttons">
            <legend></legend>
            <input type="submit" id="btnSubmit" name="btn" value="submit" tabindex="900" class="button" >
        </fieldset>

</form>


<?php 
$submitted = htmlentities($_GET["btn"], ENT_QUOTES, "UTF-8");
$color = htmlentities($_GET["lstColor"], ENT_QUOTES, "UTF-8");
$bgColor = htmlentities($_GET["lstBgColor"], ENT_QUOTES, "UTF-8");
$float = htmlentities($_GET["radFloat"], ENT_QUOTES, "UTF-8");
$margin = htmlentities($_GET["radMargin"], ENT_QUOTES, "UTF-8");
if ($submitted == "submit"){
    print "<a href='css.php?col=". $color . "&bgCol=" . $bgColor . "&float=" . $float . "&margin=" . $margin . "'>Check it out!</a>";
}


?>
</body>
</html>