<?php

namespace logger;

require_once("LogCollection.php");

class LogView {
	
	public function getDebugData() {
		
		$dumps = "
		<hr/>
			<h2>Debug</h2>
			<table>
				<tr>
					<td>";
		
		$dumps .= $this->arrayDump($_GET, "GET");
		$dumps .= $this->arrayDump($_POST, "POST");
		
		$dumps .= $this->arrayDump($_COOKIE, "COOKIES");
		if (isset($_SESSION)) {
			$dumps .= $this->arrayDump($_SESSION, "SESSION");
		}
		$dumps .= $this->arrayDump($_SERVER, "SERVER");
		
		$debugItems = "";
		foreach (array_reverse(\logger\LogCollection::getList()) as $item) {
			$debugItems .= $this->showDebugItem($item);
		}
		
		$dumps .= "
					</td>
				   		<td>
				   			<h2>Debug Items</h2>
				   			<ol>
				   				$debugItems
				   			</ol>
					 	</td>
					</tr>
				   </table>";
		//$dumps = print_r(\Debug::getList());
		
		//$dumps .= $this->arrayDump($_SERVER, "SERVER");
		return $dumps;
	}
	
	private function showDebugItem(LogItem $item) {
		
		if ($item->m_debug_backtrace != null) {
			$debug = "<h4>Trace:</h4>
					 <ul>";
			foreach (array_reverse($item->m_debug_backtrace) AS $key => $row) {
				if ($key == 0) { //skip debug
					continue;
				}
				$debug .= "<li> $key " . $row['file'] . " Line : " . $row["line"] .  "</li>";
			}
			$debug .= "</ul>";
		} else {
			$debug = "";
		}
		
		if ($item->m_object != null)
			$object = var_export($item->m_object, true);
		else 
			$object = "";
		$ret =  "<li>
					<Strong>$item->m_item </strong> $item->m_calledFrom
					<pre>$object</pre>
					
					$debug
					
				</li>";
				
		return $ret;
	}
	
	
	
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
