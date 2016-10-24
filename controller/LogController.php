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
       
      $LogView->SendingError($LogModel);
   
       
          $ips =$LogModel->ViewIp();  
          $LogView->GenerateIP($ips);            
          $LogView->Showinfo();
          $LogView->logEcho();
        
     
}
}


