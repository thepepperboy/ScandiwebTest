<?php

class Furniture extends Product implements Mesurement
{
    protected $mesurement;
    protected $height;
    protected $width;
    protected $length;
    
    public function __construct($postData)
    {
        parent::__construct($postData);
        $this->height = $postData['height'];
        $this->width = $postData['width'];
        $this->length = $postData['length'];  
    }

    public function getHeight(): string
    {
        return $this->height; 
    }

    public function getWidth(): string
    {
        return $this->width; 
    }

    public function getLength(): string
    {
        return $this->length; 
    }

    public function setMesurement($data): void
    {
        $this->mesurement = $data;
    }

    public function getMesurement(): string
    {
        return $this->mesurement;
    }
};
