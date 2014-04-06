<?php

//This has no namespace for convenience, it should really be a common module


class DebugItem {
	//Maybe add some information hiding
	public $m_item;
	public $m_object;
	public $m_debug_backtrace;
	public $m_calledFrom;
	
	
	public function __construct($string, $trace = false, $object = null) {
		$this->m_item = $string;
		if ($object != null)
			$this->m_object = var_export($object, true);
		
		$this->m_debug_backtrace = debug_backtrace();
		$this->m_calledFrom = $this->cleanFilePath($this->m_debug_backtrace[1]["file"]);
		if (!$trace) {
			$this->m_debug_backtrace = null;
		}
		
	}
	
	private function cleanFilePath($path) {
		//$_SERVER[SCRIPT_FILENAME]
		return $path;
	}
	 
}