<?php


class StandardView
{
   var $count = 0; 
   
    public function GenerateIP($ips)
    {
        
        echo'TRACES <br>';
        foreach($ips as $newIps)
        {
          
            echo'<a href="?ViewIP&ip='.substr($newIps['ipadress'],5).'">'.$newIps['ipadress'].'</a><br>';
        }
        $this->ContainSession($ips);
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
      echo file_get_contents( "store.txt", $ipadress ); 
    }
    
    public function logEcho()
    {
        echolog();
    }

}