<?php


session_start();

require_once("controller/LogController.php");
require_once("view/LogView.php");
require_once("model/LogItem.php");
require_once("model/LogCollection.php");
require_once("model/LogModel.php");
require_once("Logger.php");
require_once("view/Layout.php");

require_once("view/StandardView.php");

//require_once("example.php");

$lo = new Layout();
$lm = new LogModel();


 $av = new StandardView();
                                             ///  ska kanske ta bort isset påverkar hur jag instatsierar och ordningen på objekt skickningar 

$lc = new LogController($lm, $av);
$lo->render($av);



//försöker pusha skiten

// sidan laddas inte upp