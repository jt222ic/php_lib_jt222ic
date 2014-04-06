<?php

require_once("Logger.php");


loggThis("write a message");
loggThis("include call trace", true);
loggThis("include an object", false, new \Exception("foo exception"));

dumpLog();
dumpLog(false);




