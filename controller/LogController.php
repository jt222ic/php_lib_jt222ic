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
        //if(isset($_GET["ExceptionPage"]))      // hur ska man placera denna i View? //
        //    {
        // $LogModel->SendingMessage();
      $LogView->SendingError($LogModel);
      //  }
       
          $ips =$LogModel->ViewIp();  
          $LogView->GenerateIP($ips);              // har fixat resten för att hitta sidan 
          $LogView->Showinfo();
          $LogView->logEcho();
        
     
}
  // MVC --- CONTROLLER KALLAR TILL VIEW --> medan VIEW ANVÄNDER FRÅN MODELLEN
}


