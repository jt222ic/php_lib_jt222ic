<?php
require_once("Logger.php");
class LogController
{
    
    public function SendingMessage()
    {
                    // ska bli true om det innehåller fel info inuti samt
   
       $ip = $_SERVER['REMOTE_ADDR'];  
      $ipadress = array($_SERVER['REMOTE_ADDR']);
      sort($ipadress);
      
      try{
         
          throw new Exception("an order has failed");  
      }
      
      catch (EXCEPTION $e)
      { 
       //  loggthis("fel av någonting",$e);
        $f = fopen("store.txt", "a+");
        fwrite($f, "ip : ");
        fwrite($f,$ip);
        fwrite($f,loggthis("an order has failed",$e));
        fwrite($f,"\n");
        fwrite($f, loggThis("include call trace",true));
        fwrite($f,"\n");
        fwrite($f, loggThis("include an object", false, new \Exception("foo exception")));
        fwrite($f,date("D dS M,Y h:i a"));
        fwrite($f,"\n");
        fwrite($f,$e);
         // ska man göra så? //
        fclose($f);
        
      }  
              
        
    }
    public function ViewInfo()
     {
         //http://html.net/tutorials/php/lesson15.php
     }
    
    
}