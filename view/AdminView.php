<?php


class AdminView{
    
    
    
    public function response()
    {
      $response = $this->EmulateHtml();
      return $response;
    }
    public function EmulateHtml()
    {
      return file_get_contents( "store.txt", $ipadress ); 
    }
}