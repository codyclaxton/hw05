<?php
/*Cody Claxton
ITEC 325, Spring 2020
https://php.radford.edu/~itec325/2020spring-ibarland/Homeworks/form-handle/form-handle.html
Resources =  Previous code
*/
error_reporting( E_ALL );


//Returns a pluralized version of $noun with given $number
function pluralize($number, $noun){
        $multiple_noun = $noun;
        //Handles if we have more then 1 or 0 of something
        if($number > 1.0 OR $number == 0){
                $multiple_noun = $multiple_noun."s";
        }

        return "$number "."$multiple_noun";
};

/*
$url(string)-  the url of our image that we want to hyperlink
$linktxt(string) - the text that we want with our photo
Returns an html string containing a properly formatted hyperlink tag
*/
function hyperlink($url, $linktxt){
        $linkcopy = $linktxt;
        if($linktxt == ''){
                $linkcopy = $url;
        }
        return "<a href='"."$url"."'>"."$linkcopy"."</a>";
};

/** normalizeString: ANY -> ANY
 * If `$val` is a string, then normalize its whitespace:
 * collapse adjacent horiz-whitespace into a single space;
 * trim;
 * convert \r\n into \n;
 * collapse adjacent \n's into just one;
 * If `$foldQuotes` then convert both ' and " to ' -- useful for html testing
 * (but slightly dangerous, as any strings-containing-quotes within `$val`
 * become ill-formed as code/html).
 */
function normalizeString($val, $foldQuotes=false) {
  if (!is_string($val)) {
    return $val;
    }
  else {
    $val1 = preg_replace("/(\\p{Z}|\\s)+/"," ", $val);
    $val2 = trim($val1);
    $val5 = $foldQuotes ? preg_replace('/"/',"'",$val2) : $val2;
    return $val5;
    }
  }

/** Return the html for a drop-down menu.                
 * @param $groupName the name and id for the drop-down.
 * @param $entries an array of the drop-down options.
 *        The value is what will be returned in the form;
 *        the visible menu will use the key (if non-numeric), or will also use the value (if key is numeric).
 * @param $intro (optional) An initial, visible entry: if false, no entry; if true, entry "select one"; else a string to use.
 * @return the html for a drop-down menu.
 */
function dropdown( $groupName, $entries, $intro = false ) {
  $rowsSoFar = "";
  if ($intro===true) $intro = "<i>choose one:</i>";
  if ($intro) $rowsSoFar .= "  <option disabled='disabled' selected='selected' value=''>$intro</option>\n";  // An option with no value.
  foreach ($entries as $key=>$val) {
    $rowsSoFar .= "  <option value='$val'>" . (is_string($key) ? $key : $val) . "</option>\n";
    }
  return "<select name='$groupName' id='$groupName'>\n$rowsSoFar</select>";
  }




/*
$url(string) - The link of the photo that we want to use
$width(integer) - How wide we want our photo to be.
Returns a string which is a properly formatted html image tag specifying the width and url.
*/
function thumbnail($url,$width){
        return "<a href='"."$url"."'> <img src='"."$url"."'> width='"."$width"."px' </img> </a>";
};

define('SHOW_SUCCESSFUL_TEST_OUTPUT',true);
define('ERR_MSG_WIDTH',105);
$testCaseCount = 0;
/** Test that the actual-output-string is as expected.
 * @param $act The actual result from a test-case.
 * @param $exp The expected *prefix* from a test-case.
 * If the test fails, an error message is printed.
 * If the test passes, output is only printed if SHOW_SUCCESSFUL_TEST_OUTPUT.
 * If `$normalize` is set, disregard differences in whitespace and quote-marks (useful for testing strings of HTML).
 */
function test( $act, $exp, $normalize=false ) {
  global $testCaseCount;
  ++$testCaseCount;
  $act2 = $normalize ? normalizeString($act,true) : $act;
  $exp2 = $normalize ? normalizeString($exp,true) : $exp;
  if ($act2  === $exp2) {
    if (SHOW_SUCCESSFUL_TEST_OUTPUT) { echo "." . ($testCaseCount%5 == 0 ? " " : ""); } // Test passed.
    }
  else {
    $failedMsgStart = "test #$testCaseCount failed:";
    $divider = (strlen($failedMsgStart)+strlen($act2)+strlen($exp2) > ERR_MSG_WIDTH) ? "\n" : " ";
    echo "test #$testCaseCount failed:$divider'$act2'$divider!==$divider'$exp2'.\n";
    }
  };


/*
$tabledat(strings)-  the column headers of a single row in html format
returns a string of a table header html element with column names coming from $tabledata
*/
function asRow($tableData){
        $thSoFar = "<th> \n";
        foreach ($tableData as $columns) {
                $thSoFar .= "   <tr>". $columns ."</tr>\n";
        }
        $thSoFar .= "</th>";
        return $thSoFar;
}

/*Takes in an array(attribute Keys) of key value pairs and returns "key=value"
*/
function asAttrs($attrKeys){
$result = "";
foreach ($attrKeys as $attribute => $key) {
        $result .= "$attribute"."="."'$key'"." ";
}
return $result;
}

/*creates a row of radio buttons in a table
$name - first column
$remainingcolumns - rest of the columns
*/
function radiotablerow($name,$remainingcolumns){
        $rowsofar = "<tr>\n"
        ."    <td width=15%>"."$name"."</td>\n";
        foreach($remainingcolumns as $cols){
                $rowsofar = $rowsofar."    <td align='center'><input type='radio' name='"."$name"."'"
                ." value='"."$cols"."'"
                ." id='"."$name"."-"."$cols"."'/> </td>\n";
        }
                $rowsofar = $rowsofar."</tr>";
        return $rowsofar;
        }

/*
Creates a radio table full of radio buttons
$name - name of our table
$colheaders - the column headers of our table
$colcontents - the contents of our radio table

*/
function radiotable($name,$colheaders,$columncontents){
$tablesofar = "<table border='4'>\n <tr style='font-weight: bold'>\n";
$tablesofar = $tablesofar."    <td>    </td>\n";
foreach($colheaders as $headers){
        $tablesofar = $tablesofar."    <td align='center'>"."$headers"."</td>\n";
}
$tablesofar = $tablesofar."</tr>\n";

foreach ($columncontents as $rowheader) {
        $tablesofar = $tablesofar.radiotablerow($rowheader, $colheaders)."\n\n";
}
$tablesofar = $tablesofar."</table>";
return $tablesofar;

}



?>
