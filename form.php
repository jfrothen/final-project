<?php
include "top.php";
// initialize variables 
print "<p>Post Array:</p><pre>";
print_r($_POST);
print "</pre>";
// security 
$thisURL = $domain . $phpSelf;
// variables 
$firstName = ""; // text 
$middleName = ""; // text 
$email = "Enter Your Email"; // text 
$student = "yes"; // radio
$yes = true; //checked checkbox
$no = false; //not checked checkbox
$maybeSo = false; //not checked checkbox 
$option = "Option 1"; //pick an option listbox 
$favoriteSong = ""; // text area 
$derivative = ""; // text 
// errors 
$firstNameERROR = false;
$middleNameERROR = false;
$emailERROR = false;
$studentERROR = false;
$yesERROR = false;
$totalChecked = 0;
$optionERROR = false;
$favoriteSongERROR = false;
$derivativeERROR = false;
// error message array 
$errorMsg = array();
// CSV data 
$dataRecord = array();
// mailed information to user 
$mailed = false;
// how form will be submitted 
if (isset($_POST["btnSubmit"])) {
// sanitize     
    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $firstName;
    $middleName = htmlentities($_POST["txtLastName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $middleName;
    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $email;
    $student = htmlentities($_POST["radStudent"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $student;
    $yes = htmlentities($_POST["lstYes"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $yes;
    $favoriteSong = htmlentities($_POST["txtFavoriteSong"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $favoriteSong;
    $derivative = htmlentities($_POST["txtDerivative"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $derivative;
// errors 
    if ($firstName == "") {
        $errorMsg[] = "Please enter your first name";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {
        $errorMsg[] = "Your first name has an extra chartacter.";
        $firstNameERROR = true;
    }
    if ($middleName == "") {
        $errorMsg[] = "Please enter your middle name";
        $middleNameERROR = true;
    } elseif (!verifyAlphaNum($lastName)) {
        $errorMsg[] = "Your middle name has an extra chartacter.";
        $middleNameERROR = true;
    }
    if ($email == "") {
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg [] = "Your email address appears to be incorrect";
        $emailERROR = true;
    }
    if (isset($_POST["chkYes"])) {
        $yes = true;
        $totalChecked++;
    } else {
        $yes = false;
    }
    $dataRecord[] = $yes;
    if (isset($_POST["chkNo"])) {
        $no = true;
        $totalChecked++;
    } else {
        $no = false;
    }
    $dataRecord[] = $no;
    if (isset($_POST["chkMaybeSo"])) {
        $maybeSo = true;
        $totalChecked++;
    } else {
        $maybeSo = false;
    }
    $dataRecord[] = $maybeSo;
    if ($totalChecked < 1) {
        $errorMsg[] = "Please choose at least one option";
        $optionERROR = true;
    }
    if ($favoriteSong != "") {
        if (!verifyAlphaNum($favoriteSong)) {
            $errorMsg[] = "Your song title appears to have extra characters that are not accepted.";
            $favoriteSongERROR = true;
        }
    }
// process when passes 
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";
        // save data 
        $fileExt = ".csv";
        $myFileName = "data/registrationforform";
        $fileName = $myfilename . $fileExt;
        if ($debug) {
            print "\n\n<p>filename is" . $filename;
        }
// open the file 
        $file = fopen($filename, 'a');
// copy info
        fputcsv($file, $dataRecord);
// close csv file
        fclose($file);
        // message to person who filled out form 
        if (isset($_POST['btnSubmit'])) {
            $message = '<h2>Your information.</p>';
            foreach ($_POST as $key => $value) {
                $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));
                //breaks up the form into words
                if ($camelCase[1] != "Submit") {
                    $message .= "<p>";
                    foreach ($camelCase as $one) {
                        $message .= $one . " ";
                    }
                    $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";
                }
            } print $message;
        }
// mail form information to user 
        $to = $email;
        $cc = "";
        $bcc = "";
        $from = "Save The Ceramic Coffee Mugs <noreply@savetheceramiccoffeemugs.com>";
//subject related to site content
        $todaysDate = strftime("%x");
        $subject = "Daily Attribute: " . $todaysDate;
        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);
    }
}
?>

<article id="main">

<?php
// provides user with what they submitted
if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) {
    print "<h2>Thank you for providing your information.</h2>";
    print "<p>For your records a copy of this data has ";
    if (!$mailed) {
        print "not";
    }
    print "has been sent:</p>";
    print "<p>To: " . $email . "</p>";
    print $message;
} else {
    print "<h2>Register</h2>";
    print "<p>Please Enter Your Email To Receive A Daily Attribute</p>";
// displays errors from completing form
    if ($errorMsg) {
        print '<div id="errors">' . "\n";
        print "<h3>Your form has the following mistakes.</h3>";
        print "<ol>\n";
        foreach ($errorMsg as $err) {
            print "<li>" . $err . "</li>\n";
        }
        print "</ol>\n";
        print "</div>\n";
    }
    ?>

        <!-- begins HTML for form --> 
        <form action="<?php print $phpSelf; ?>"
              id="frmRegister"
              method="post">

            <fieldset class="contact">
                <legend>Your Information</legend>

                <label class="required" for="txtFirstName">First Name
                    <input autofocus      
    <?php if ($firstNameERROR) print 'class="mistake"'; ?>    
                           id="txtFirstName"        
                           maxlength="45"
                           name="txtFirstName"
                           onfocus="this.select()"
                           placeholder="Enter your first name"
                           tabindex="100"
                           type="text"
                           value="<?php print $firstName; ?>"
                           >
                </label>
                <br>
                <label class="required" for="txtMiddleName">Middle Name
                    <input
    <?php if ($middlNameERROR) print 'class="mistake'; ?>
                        id="txMiddleName"
                        maxlength="45"
                        name="txtMiddleName"
                        onfocus="this.select()"
                        placeholder="Enter your middle name"
                        tabindex="120"
                        type="text"
                        value="<?php print $middleName; ?>"
                        >
                </label>
                <br>        
                <label class="required" for="txtEmail">Email
                    <input 
    <?php if ($emailERROR) print 'class="mistake"'; ?>
                        id="txtEmail"
                        maxLength="45"
                        name="txtEmail"
                        onfocus="this.select()"
                        placeholder="Jack.Robert@uvm.edu"
                        tabindex="140"
                        type="text"
                        value=""
                        >
                </label>
            </fieldset> <!--ends contact information-->

            <fieldset class="radio <?php if ($studentERROR) print 'mistake'; ?>"> <!-- student radio button -->
                <legend>Are you a student?</legend>
                <label><input <?php if ($student == "yes") print ' checked '; ?>
                        id="radStudent"
                        name="radStudent"
                        tabindex="160"
                        type="radio"
                        value="Yes">Yes</label>
                <label><input <?php if ($student == "No") print ' checked '; ?>
                        id="radStudent"
                        name="radStudent"
                        tabindex="180"
                        type="radio"
                        value="No">No</label>
                <label><input <?php if ($student == "Prefer Not To Answer") print ' checked '; ?>
                        id="radStudent"
                        name="radStudent"
                        tabindex="200"
                        type="radio"
                        value="Prefer Not To Answer">Prefer Not To Answer</label>
            </fieldset> <!-- closes radio button -->
            <br>
            <fieldset class="checkbox <?php if ($yesERROR) print 'mistake'; ?>"> <!-- opens checkbox -->
                <legend>Yes or No?</legend>
                <label><input <?php if ($yes) print "checked"; ?>
                        id="chkYes"
                        name="chkYes"
                        tabindex="220"
                        type="checkbox"
                        value="Yes">Yes</label>
                <label><input <?php if ($no) print "checked"; ?>
                        id="chkNo"
                        name="chkNo"
                        tabindex="240"
                        type="checkbox"
                        value="No">No</label>
                <label><input <?php if ($maybeSo) print "checked"; ?>
                        id="chkMaybeSo"
                        name="chkMaybeSo"
                        tabindex="260"
                        type="checkbox"
                        value="Maybe So">Maybe So</label>
            </fieldset> <!-- ends checkbox -->
            <br>
            <fieldset class="listbox <?php if ($optionERROR) print 'mistake'; ?>"> <!-- begins list box -->
                <label for="lstOption">Favorite Option</label>
                <select id="lstOption"
                        name="lstOption"
                        tabindex="280">
                    <option <?php if ($optoin == "Option 1") print " selected "; ?>
                        value="Option 1">Option 1</option> 

                    <option <?php if ($option == "Option 2") print " selected "; ?>
                        value="Option 2">Option 2</option> 

                    <option <?php if ($option == "Option 3") print " selected "; ?>
                        value="Option 3">Option 3</option>  
                </select>
            </fieldset> <!-- ends list box -->
            <br>
            <fieldset class="textarea"> <!-- text box -->
                <label class="required" for="txtFavoriteSong">What Is Your Favorite Linkin Park Song?</label>
                <textarea <?php if ($favoriteSongERROR) print 'class="mistake"'; ?>
                    id="txtFavoriteSong"
                    name="txtFavoriteSong"
                    onfocus="this.select()"
                    placeholder="Please enter your favorite Linkin Park Song."
                    style="width: 20em; height: 3em;"
                    tabindex="300"><?php print $favoriteSong; ?></textarea>
            </fieldset> <!-- closes text box -->
            <br>
            <fieldset class="derivative <?php if ($derivativeERROR) print 'mistake'; ?>">
                <label class="required" for="txtDerivative">What Is The Derivative Of 2x?
                    <input       
    <?php if ($derivativeERROR) print 'class="mistake"'; ?>    
                        id="txtDerivative"        
                        maxlength="2"
                        name="txtDerivative"
                        onfocus="this.select()"
                        placeholder="Enter your answer"
                        tabindex="320"
                        type="text"
                        value="<?php print $derivative; ?>"
                        >
                </label>
            </fieldset> <!-- closes derivative -->
            <br>
            <fieldset class="buttons">   
                <input class="button" id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Register">       
            </fieldset>   <!-- closing tag for button -->                  
        </form>    <!--ends entire form --> 

    <?php } // ends form submit 
?> 

</article>

    <?php include "footer.php"; ?>

</body>
</html>