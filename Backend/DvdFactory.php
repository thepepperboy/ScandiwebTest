<?php

class DvdFactory extends BaseFactory implements BeforeSave
{
    protected $dvd;

    public function __construct($postData)
    {
        $this->dvd = new Dvd($postData);
        parent::__construct($postData);
    }

    public function getValues($value)
    {
        return $this->dvd->$value();
    }

    public function validate() 
    {
        parent::validate();
        $this->validateMesurement();
        $this->AddFormat();

        return $this->errors;
    }

    protected function validateMesurement()
    {
        if (!is_numeric($this->dvd->getSize()) || $this->dvd->getSize() < 0) {
            $this->addError('size', 'Please, provide size');
        }
    }

    public function AddFormat()
    {
        if ($this->errors == null) {
            $this->formatSku();
            $this->formatName();
            $this->formatPrice();
            $this->formatMesurement(); 
        }  
    }

    protected function formatSku()
    {
        $this->dvd->setSku("SKU: " . $this->dvd->getSku());
    }

    protected function formatName()
    {
        $this->dvd->setName("Name: " . $this->dvd->getName());
    }

    protected function formatPrice()
    {
        $this->dvd->setPrice("Price: " . $this->dvd->getPrice() . " &dollar;");
    }

    protected function formatMesurement()
    {
        $this->dvd->setMesurement("Size: " . $this->dvd->getSize() . " MB");
    }
};