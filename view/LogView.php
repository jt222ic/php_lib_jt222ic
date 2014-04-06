<?php

namespace logger;



class LogView {
	
	public function getDebugData($doDumpSuperGlobals) {


		
		
		$dumps = "
		<hr/>
			<h2>Debug</h2>
			<table>
				<tr>
					<td>";
		
		if ($doDumpSuperGlobals) {
			$dumps .= $this->arrayDump($_GET, "GET");
			$dumps .= $this->arrayDump($_POST, "POST");
			
			$dumps .= $this->arrayDump($_COOKIE, "COOKIES");
			if (isset($_SESSION)) {
				$dumps .= $this->arrayDump($_SESSION, "SESSION");
			}
			$dumps .= $this->arrayDump($_SERVER, "SERVER");
		}
		
		$debugItems = "";
		foreach (\logger\LogCollection::getList() as $item) {
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
			$object = var_export($item->m_object, true);
		else 
			$object = "";
		$ret =  "<li>
					<Strong>$item->m_message </strong> $item->m_calledFrom
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
