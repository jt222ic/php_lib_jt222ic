<?php
require_once("Logger.php");


class LogController
{
    var $LogModel;
    var $LogView;
    
    public function __construct($lm,$av)
    {
        $LogModel = $lm;
        $LogView = $av;
        $this->Onclick($LogModel, $LogView);
    }
    public function Onclick($LogModel, $LogView)
    {
        if(isset($_GET["ExceptionPage"]))
        {
      $LogModel->SendingMessage();
        }
        if(isset($_GET["ViewIP"]))
        {
          $ips =$LogModel->ViewIp();  
          $LogView->standard($ips);
      }
}

}


