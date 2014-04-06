<?php


//This has no namespace for convenience, it should really be a common module

require_once("model/LogCollection.php");
require_once("view/LogView.php");


/**
* Logging Method
*/
function loggThis($logMessageString, $logThisObject = null, $includeTrace = false) {
	logger\LogCollection::log($logMessageString, $includeTrace, $logThisObject);
}

/**
* Logging Method
*/
function loggHeader($logMessageString, $logThisObject = null, $includeTrace = false) {
	logger\LogCollection::log("<h2>$logMessageString</h2>", $includeTrace, $logThisObject);
}

/**
* @param boolean $doDumpSuperGlobals
*/
function dumpLog($doDumpSuperGlobals = true) {
	$debug = new \logger\LogView();
	echo $debug->getDebugData($doDumpSuperGlobals);
}