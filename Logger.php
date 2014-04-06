<?php


//This has no namespace for convenience, it should really be a common module
require_once("model/LogCollection.php");
require_once("view/LogView.php");


/**
* Logging Method
* @param string $logMessageString The message you intend to log
* @param mixed $logThisObject An object which state you want to log 
* @param boolean $includeTrace save callstack
* @return void
*/
function loggThis($logMessageString, $logThisObject = null, $includeTrace = false) {
	logger\LogCollection::log($logMessageString, $includeTrace, $logThisObject);
}

/**
* Logging Method
* Shows a header item in the log
* @param string $logMessageString The message you intend to log
* @return void
*/
function loggHeader($logMessageString) {
	logger\LogCollection::log("<h2>$logMessageString</h2>", null, false);
}

/**
* echo the log to the output buffer
* 
* @param boolean $doDumpSuperGlobals dump $_GET, $_POST etc
*/
function dumpLog($doDumpSuperGlobals = true) {
	$debug = new \logger\LogView();
	echo $debug->getDebugData($doDumpSuperGlobals);
}