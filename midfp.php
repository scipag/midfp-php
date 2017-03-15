<?php

include 'inc_midfp.php';

$mid = $_GET['mid'];
$midfp = midfp($mid);

echo "<html>\n";
echo "<head>\n";
echo "<title>Message-Id Fingerprint Proof-of-Concept - scip AG</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "<h3>scip AG Message-Id Fingerprint Proof-of-Concept</h3>\n";
echo "<h4>Input</h4>\n";
echo "<form action='?' method='get'>\n";
echo "Message-Id:<br />\n";
echo "<input name='mid' type='text' value='".htmlentities($mid)."' size='50' maxlength='100'> \n";
echo "<input type='submit' value='Analyze'>\n";
echo "</form>\n";
echo "<h4>Results</h4>\n";
echo displayresults($midfp);
echo "<h4>Database</h4>\n";
echo displaydatabase();
echo "<h4>Information</h4>\n";
echo "For more information visit <a href='http://www.scip.ch/?labs'>scip Labs</a>.\n";
echo "</body>\n";
echo "</html>\n";

function displayresults($midfp){
    $midhits = count($midfp);

    $result = "Hits: ".$midhits."<br />\n";
    $result.= "<ul>\n";
    foreach($midfp as $implementation){
	$result.= "<li>".htmlentities($implementation)."</li>\n";
    }
    $result.= "</ul>\n";

    return $result;
}

function displaydatabase($file='fingerprints.db'){
    $database = readdatabase(1, $file);

    $result = "<table>\n";
    $result.= "<tr><th>Implementation</th><th>Pattern</th></tr>\n";
    foreach($database as $entry){
	$result.= "<tr><td>".htmlentities($entry[0])."</td><td>".htmlentities($entry[1])."</td></tr>\n";
    }
    $result.= "</table>\n";

    return $result;
}

?>
