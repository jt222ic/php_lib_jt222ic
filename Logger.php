<?php


//This has no namespace for convenience, it should really be a common module

require_once("model/LogCollection.php");
require_once("view/LogView.php");


/**
* Logging Method
*/
function loggThis($logMessageString, $includeTrace = false, $logThisObject = null) {
	logger\LogCollection::log($logMessageString, $includeTrace, $logThisObject);
}

/**
* @param boolean $doDumpSuperGlobals
*/
function dumpLog($doDumpSuperGlobals = true) {
	$debug = new \logger\LogView();
	echo $debug->getDebugData($doDumpSuperGlobals);
}