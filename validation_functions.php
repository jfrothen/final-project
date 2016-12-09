<?php
print "<!-- BEGIN include validation-functions -->";
//validation for the form, make sure there arent any funky characters in the inputs
function verifyAlphaNum ($testString) {
    // check for letters, numbers and dash, period, space and single quote, and really anything else included in alphaNum
    return (preg_match ("/^([[:alnum:]]|-|\.| |')+$/", $testString));
}
function verifyEmail ($testString) {
    //check for a legitimately formatted email..doesn't have to be the persons
    return filter_var($testString, FILTER_VALIDATE_EMAIL);
}
function verifyNumeric ($testString) {
    //check for numbers and .
    return (is_numeric ($testString));
}
function verifyPhone ($testString) {
    //check for a patriotic phone number
    $regex = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/';
    return (preg_match($regex, $testString));
}
print "<!-- END include validation-functions -->";
?>