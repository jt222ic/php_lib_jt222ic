<?php

namespace logger;



class LogView {
	

	/**
	* @param boolean $doDumpSuperGlobals
	* @return string HTML 
	*/
	public function getDebugData($doDumpSuperGlobals = false) {
		
		
		if ($doDumpSuperGlobals) {
			$superGlobals = $this->dumpSuperGlobals();
		} else {
			$superGlobals = "";
		}
		
		$debugItems = "";
		foreach (\logger\LogCollection::getList() as $item) {
			$debugItems .= $this->showDebugItem($item);
		}
		$dumps = "
			<hr/>
			<h2>Debug</h2>
			<table>
				<tr>
					<td>$superGlobals</td>
			   		<td>
			   			<h3>Debug Items</h3>
			   			<ol>
			   				$debugItems
			   			</ol>
				 	</td>
				</tr>
		    </table>";
		return $dumps;
	}

	/**
	* @return string HTML 
	*/
	private function dumpSuperGlobals() {
		$dumps = $this->arrayDump($_GET, "GET");
		$dumps .= $this->arrayDump($_POST, "POST");
		
		$dumps .= $this->arrayDump($_COOKIE, "COOKIES");
		if (isset($_SESSION)) {
			$dumps .= $this->arrayDump($_SESSION, "SESSION");
		}
		$dumps .= $this->arrayDump($_SERVER, "SERVER");

		return $dumps;
	}
	
	/**
	* @param LogItem $item
	* @return string HTML 
	*/
	private function showDebugItem(LogItem $item) {
		
		if ($item->m_debug_backtrace != null) {
			$debug = "<h4>Trace:</h4>
					 <ul>";
			foreach ($item->m_debug_backtrace AS $key => $row) {

				//the two topmost items are part of the logger
				//skip logger
				if ($key < 2) { 
					continue;
				}
				$key = $key - 2;
				$debug .= "<li> $key " . LogItem::cleanFilePath($row['file']) . " Line : " . $row["line"] .  "</li>";
			}
			$debug .= "</ul>";
		} else {
			$debug = "";
		}
		
		if ($item->m_object != null)
			$object = print_r($item->m_object, true);
		else 
			$object = "";

		$ret =  "<li>
					<Strong>$item->m_message </strong> $item->m_calledFrom
					<pre>$object</pre>
					
					$debug
					
				</li>";
				
		return $ret;
	}
	
	
	/**
	* @return string HTML 
	*/
	private function arrayDump($array, $title) {
		$ret = "<h3>$title</h3>
		
				<ul>";
		foreach ($array as $key => $value) {
			$value = htmlspecialchars($value);
			$ret .= "<li>$key => [$value]</li>";
		}
		$ret .= "</ul>";
		return $ret;
	}
}
