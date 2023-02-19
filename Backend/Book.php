<?php

class Book extends Product implements Mesurement
{
    protected $mesurement;
    protected $weight;

    public function __construct($postData)
    {
        parent::__construct($postData);
        $this->weight = $postData['weight'];
    }

    public function getWeight(): string
    {
        return $this->weight;
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