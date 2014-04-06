<?php

namespace logger;

require_once("LogItem.php");

class LogCollection {
	private static $DEBUGLIST = array();
	

	/**
	* Logging Method
	* @param string $logMessageString The message you intend to log
	* @param mixed $logThisObject An object which state you want to log 
	* @param boolean $includeTrace save callstack
	* @return void
	*/
	public static function log($string, $trace = false, $object = null) {
		self::$DEBUGLIST[] = new LogItem($string, $trace, $object);
	}
	
	/**
	* @return array of logger/LogItem
	*/
	public static function getList() {
		return self::$DEBUGLIST;
	}
}
