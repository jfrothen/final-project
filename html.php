<?php
include "top.php";


//ok so we need to display whatever element the user wanted
$elementChoice = htmlentities($_GET['elm'], ENT_QUOTES, "UTF-8");

if ($elementChoice == "paragraph") {
    print "<p>This is an example paragraph. There are many like it, but this one is mine.</p>";
}

elseif ($elementChoice == "head1"){
    print "<h1>THIS IS A HEADER</h1>";
}

elseif ($elementChoice == "head2") {
    print "<h2>THIS IS A SLIGHTLY SMALLER HEADER</h2>";
}

elseif ($elementChoice == "head3") {
    print "<h3>THIS IS AN EVEN SLIGHTLY SMALLER HEADER</h3>";
}

elseif ($elementChoice == "figure") {
    print "<figure class='smallFig'>\n";
    print "\t<img src='meandjack.jpg' alt=''>\n";
    print "\t<figcaption>Jack and I working on our project</figcaption>\n";
    print "</figure>";
}

elseif ($elementChoice == "article") {
    print "<article class='right'>\n";
    print "<p>Haha articles essentially just contain paragraphs, but typically have their own classes to differentiate them.</p>\n";
    print "</article>";
}

elseif ($elementChoice == "aside") {
    print "<aside class='right'>\n";
    print "<p>Haha asides essentially just contain paragraphs, but typically have their own classes to differentiate them.</p>\n";
    print "</aside>";
}

elseif ($elementChoice == "header") {
    print "<header>This is a header. Don't get a concussion!</header>";
}

elseif ($elementChoice == "footer") {
    print "<footer>This is a footer. I don't have any puns for it unlike header, sorry.</footer>";
}

print "<p class='gray'>I need to put in some placeholder paragraphs here, otherwise the headers and footers really don't make any sense.</p>";
print "<h4 class='gray'>if you're bored, look up <em>important vidoes</em> on youtube</h4>";
print "<p class='gray'>Batman is probably the best superhero, but I don't really put a lot of thought into it.</p>";
print "<h4 class='gray'>Metaethical response theory should not be considered objective, however it does constitute realism</h4>";

if ($elementChoice == "footer") {
    print "<footer>This is a footer. I don't have any puns for it unlike header, sorry.</footer>";
}

?>
</body>
</html>