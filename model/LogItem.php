<?php

//This has no namespace for convenience, it should really be a common module
namespace logger;

class LogItem {
	//Maybe add some information hiding
	public $m_message;
	public $m_object;
	public $m_debug_backtrace;


	/**
	* @var String
	*/
	public $m_calledFrom;
	
	
	public function __construct($message, $trace = false, $object = null) {

		$this->m_message = $message;

		if ($object != null)
			$this->m_object = var_export($object, true);
		
		$this->m_debug_backtrace = debug_backtrace();

		$this->m_calledFrom = $this->cleanFilePath($this->m_debug_backtrace[2]["file"]) . " " . $this->m_debug_backtrace[2]["line"];


		if (!$trace) {
			$this->m_debug_backtrace = null;
		}
		
	}
	
	public static function cleanFilePath($path) {
		return substr($path, strlen($_SERVER["CONTEXT_DOCUMENT_ROOT"]));
	}
	 
}