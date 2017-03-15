<?php

function midfp($mid, $database='fingerprints.db'){
    $fingerprintdb = readdatabase($database);

    foreach($fingerprintdb as $fingerprintitem){
	if(preg_match($fingerprintitem[1], $mid)){
	    $results[] = $fingerprintitem[0];
	}
    }

    if(count($results) == 0){
	$results[] = 'Unknown implementation.';
    }else{
	sort($results);
    }

    return $results;
}

function readdatabase($sort=1, $database='fingerprints.db'){
    $fingerprintfile = file($database);

    foreach($fingerprintfile as $fingerprint){
	$fingerprintdb[] = explode(';', trim($fingerprint), 2);
    }

    if($sort == 1){
	sort($fingerprintdb);
    }

    return $fingerprintdb;
}

?>
