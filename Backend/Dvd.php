<?php

class Dvd extends Product implements Mesurement
{
    protected $mesurement;
    protected $size;

    public function __construct($postData)
    {
        parent::__construct($postData);
        $this->size = $postData['size'];
    }

    public function getSize(): string
    {
        return $this->size;
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