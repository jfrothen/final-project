<?php
include "top.php";
if (isset($_GET["debug"])) {
    $debug = true;
}
$filelocation = "data/";
$myFileName = "definitions";
$fileExt = ".csv";
$filename = $filelocation . $myFileName . $fileExt;
if ($debug)
    print "\n\n<p>filename is " . $filename;
$file = fopen($filename, "r");
// the variable $file will be empty or false if the file does not open
if ($file) {
    if ($debug)
        print "<p>File Opened</p>\n";
}
// the variable $file will be empty or false if the file does not open
if ($file) {
    if ($debug)
        print "<p>Begin reading data into an array.</p>\n";
    // This reads the first row, which in our case is the column headers
    $headers[] = fgetcsv($file);
    if ($debug) {
        print "<p>Finished reading headers.</p>\n";
        print "<p>My header array<p><pre> ";
        print_r($headers);
        print "</pre></p>";
    }
    // the while (similar to a for loop) loop keeps executing until we reach 
// the end of the file at which point it stops. the resulting variable 
// $records is an array with all our data.
    while (!feof($file)) {
        $records[] = fgetcsv($file);
    }
    //closes the file
    fclose($file);
    if ($debug) {
        print "<p>Finished reading data. File closed.</p>\n";
        print "<p>My data array<p><pre> ";
        print_r($records);
        print "</pre></p>";
    }
} // ends if file was opened
if ($debug)
    print "<p>End of processing.</p>\n";
?>


<article>
    <h3>Want To Expand Your Knowledge?</h3>

    <p class="paragraph">PHP is a great way to expand your coding repertoire beyond HTML and CSS. PHP is most commonly used to create HTML code in mass quantities. Within this website, PHP is used to create the navigation bar to switch between pages, as well as a majority of the controls for the form to sign up for the daily attribute. As opposed to HTML and CSS that are acronyms, Hyper Text Markup Language and Cascading Style Sheet, respectively, PHP stands for PHP: Hypertext Preprocessor. It literally stands for itself! Another common use for PHP is creating tables from pulling information from a .csv file and displaying the values in an array. PHP is also the extension for all of the pages used to create this web page i.e. index.php, form.php, contact.php, etc.</p>

    <h4>Check Out These PHP Tricks</h4> 
    <?php
// print table here
    print "<table>";
    print "<tr><th>Name</th><th>Definiton</th></tr>";
    foreach ($records as $record) {
        print "<tr>";
        print "<td>";
        print $record [0];
        print "</td>";
        print "<td class='nametext'>";
        print $record [1];
        print " ";
        print $record [2];
        print "</td>";
        print "</tr>";
    }
    print "</table>";
    ?>

    <h4>Still Curious?</h4> 

    <p class="paragraph">PHP: Hypertext Preprocessor is displaying the table of PHP variables above and is calling the information from an Excel file saved as a csv, comma separated value, which is linked via PHP to the table elements. PHP: Hypertext Preprocessor is also the driving force behind the errors you may encounter while filling out the form. If your name has a funky character in it, or you don’t check any of the boxes, or even put your email in the wrong format, the errors will be trigged via PHP which will call upon which errors to display all in a lovely ordered list. Another interesting use for PHP is the ability to send emails directly from the source. So, for all the times you’ve wondered how places are able to spam a metric ton of people at once, now you know. But please, do not try that at home, only experience spammers and pranksters can pull off PHP spam email. While on the topic of emails, the daily attribute email will call upon PHP to determine the master list of subscribers who will receive their email, along with the date and any other relevant information. </p>

    <p class="paragraph">To recap, PHP: Hypertext Preprocessor is an extremely useful web design and programming tool that is highly underrated and should be used more often! Don’t forget to sign up for the Daily Attribute…</p>

</article>
    
<?php include "footer.php"; ?>    

</body>
</html>