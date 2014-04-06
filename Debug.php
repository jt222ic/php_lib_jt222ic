<?php

require_once("DebugItem.php");
//This has no namespace for convenience, it should really be a common module

class Debug {
	private static $DEBUGLIST = array();
	
	public static function log($string, $trace = false, $object = null) {
		self::$DEBUGLIST[] = new DebugItem($string, $trace, $object);
	}
	
	public static function getList() {
		return self::$DEBUGLIST;
	}
}
