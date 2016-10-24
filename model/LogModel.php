<?php

class LogModel
{
    
    
   var $f;
   var $view;
   var $index;
   
    public function BuyProductfail()
    {
      try{
         
          throw new Exception("an order has failed");    // orders get wrong during the buy order
      }
      catch (EXCEPTION $e)
      { 
       
      $ip = $_SERVER['REMOTE_ADDR'];  
      $ipadress = array($_SERVER['REMOTE_ADDR']);
      sort($ipadress);
      
        $f = fopen("store.txt", "a+");
        fwrite($f, "ip : ");
        fwrite($f,$ip);
        fwrite($f,loggthis("an order has failed",$e));
        fwrite($f,"\n");
        fwrite($f, loggThis("include call trace",true));
        fwrite($f,"\n");
        fwrite($f, loggThis("include an object", false, new Exception("foo exception")));
        fwrite($f,date("D dS M,Y h:i a"));
        fwrite($f,"\n");                // write in info and session traces all that in 
        fwrite($f,$e); 
        fwrite($f,"\n");  
        fclose($f);
      }  
    }
        public function ViewIp()
        {
            $f = fopen("store.txt","r");
            $ips = array();
            $currentip; 
            
            while ($line = fgets($f)) 
            {
                $newtext = "";
                $incontain = substr($line, 0,5);                          // return arrays av  IP string och IP adresss skickar sedan till view eller under controller
                 if($incontain == "ip : ")
                 {
                     $currentip = substr($line,5);
                     $ipcontain = substr($line,$ip);
                     $ips[$currentip]['ipadress'] = $ipcontain;           
                     continue;
                 }
                 $newtext = $this->SeperateIp($incontain,$line);
                 $ips[$currentip]['errormessage'] .= $newtext;
           }
            return $ips;
        }
        
    public function SeperateIp($incontain, $line)
    {
        if($incontain !="ip : ")
        {
            $rad = substr($line,0);
        }
        $storedtext.= $rad;
      
     return $storedtext;
    }
}

          