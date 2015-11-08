<?php


class StandardView
{
    
    public function response()
    {
        $response = $this->standard();
        return $response;
    }
    
    
    public function standard()
    {
        return '<p>Press to activate 1, to error message </p>';
    }
}