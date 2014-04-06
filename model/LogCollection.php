<?php

namespace logger;

require_once("LogItem.php");

class LogCollection {
	private static $DEBUGLIST = array();
	
	public static function log($string, $trace = false, $object = null) {
		self::$DEBUGLIST[] = new LogItem($string, $trace, $object);
	}
	
	public static function getList() {
		return self::$DEBUGLIST;
	}
}
