<?php

require_once("Logger.php");


function loggStuff() {
	loggThis("write a message");
	loggThis("include call trace", null, true);
	loggThis("include an object", new \Exception("foo exception"), false);

}

loggStuff();

//show log
dumpLog();

//do not dump superglobals
dumpLog(false);




