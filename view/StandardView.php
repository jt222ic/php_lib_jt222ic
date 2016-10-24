<?php


class StandardView
{
   var $count = 0; 
   var $LogModel;
    public function GenerateIP($ips)
    {

if(isset($_GET["ViewIP"]))
{
        echo'TRACES <br>';
        foreach($ips as $newIps)
        {
            echo'<a href="?ViewIP&ip='.substr($newIps['ipadress'],5).'">'.$newIps['ipadress'].'</a><br>';
        }
        $this->ContainSession($ips);
    }
    
    }
        public function EmulateHtml()
    {
      
      return file_get_contents( "store.txt", $ipadress ); 
    }
    
    public function ContainSession($ips)
    {     
        if(isset($_GET["ip"]))
           {
               foreach($ips as $newIps){
                   $textIp = trim(substr($newIps['ipadress'], 5));
                   if($_GET['ip'] == $textIp){
                       echo $newIps['errormessage'];
                   }
               }
           } 
    }
       public function Showinfo()
    {
         if(isset($_GET["View"]))
        {
      echo file_get_contents( "store.txt", $ipadress ); 
        }
    }
    
    public function logEcho()
    {
           if(isset($_GET["EchoLog"]))
        {
        echolog();
        }
    }
    public function SendingError($LogModel)
    {
         if(isset($_GET["ExceptionPage"]))
        {
         $LogModel->BuyProductfail();
        }
    }
}