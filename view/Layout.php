<?php


class Layout
{
    public function render($av)
    {
        
         echo '<!DOCTYPE html>
        <html>
        <head>
        <meta charset="utf-8">
        </head>
        <body>
        <h1>Error testing -LogSystem</h1>
        '.$this->ExceptionPage().'<br>
        '.$this->ViewIPSessionTrace().'
        '.$av->response().'                                       
        
        </div>
        </body>
        </html>';
    }
    
    
    public function ExceptionPage()
    {
         if(isset($_GET["ExceptionPage"]))
          {
              return '<a href=?>Custom Ordered!</a>';
              
          }
          else
          {
               return '<a href=?ExceptionPage>Customer Order</a>';
          }
    }
    public function ViewIPSessionTrace()
    {
        if(isset($_GET["View"]))
        {
            return '<a href=?>Return Home</a>';
        }
        else
        {
            return '<a href=?View>View</a>';
        }
        
    }
}