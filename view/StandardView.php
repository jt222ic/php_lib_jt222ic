<?php


class StandardView
{
   var $count = 0; 
   
    public function standard($ips)
    {
        
        foreach($ips as $newIps)
        {
          
            echo'<a href="?ViewIP&ip='.substr($newIps['ipadress'],5).'">'.$newIps['ipadress'].'</a><br>';
            
        }
        $this->testing($ips);
    }
        public function EmulateHtml()
    {
      
      return file_get_contents( "store.txt", $ipadress ); 
    }
    
    public function testing($ips)
    {     
        if(isset($_GET["ip"]))
           {
               foreach($ips as $newIps){
                   $textIp = trim(substr($newIps['ipadress'], 5));
                   if($_GET['ip'] == $textIp){
                       echo $newIps['errormessage'];
                   }
               }
               //var_dump($newIps);
             //echo $newIps[$_GET["ip"];
           }
                
        
    }
}