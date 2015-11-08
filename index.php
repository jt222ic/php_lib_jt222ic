<?php


require_once("controller/LogController.php");
require_once("view/LogView.php");
require_once("model/LogItem.php");
require_once("model/LogCollection.php");
require_once("Logger.php");
require_once("view/Layout.php");
require_once("view/AdminView.php");
require_once("view/StandardView.php");
//require_once("example.php");

$lo = new Layout();

$lc = new LogController();

echo "<< index här >>";

if(isset($_GET["ExceptionPage"]))
{
    
$lc->SendingMessage();
}

if(isset($_GET["View"]))
{
    $av = new AdminView();
    $lc->ViewInfo();
}
else 
{
    $av = new StandardView();
}

$lo->render($av);



//försöker pusha skiten

// sidan laddas inte upp