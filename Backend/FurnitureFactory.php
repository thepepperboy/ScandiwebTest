<?php

class FurnitureFactory extends BaseFactory implements BeforeSave
{
    protected $furniture;

    public function __construct($postData)
    {
        $this->furniture = new Furniture($postData);
        parent::__construct($postData);
    }

    public function getValues($value)
    {
        return $this->furniture->$value();
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
        if (!is_numeric($this->furniture->getHeight()) || $this->furniture->getHeight() < 0) {
            $this->errors['height'] = 'Please, provide height';
        }

        if (!is_numeric($this->furniture->getWidth()) || $this->furniture->getWidth() < 0) {
            $this->errors['width'] = 'Please, provide width';
        }

        if (!is_numeric($this->furniture->getLength()) || $this->furniture->getLength() < 0) {
            $this->errors['length'] = 'Please, provide length';
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
        $this->furniture->setSku("SKU: " . $this->furniture->getSku());
    }

    protected function formatName()
    {
        $this->furniture->setName("Name: " . $this->furniture->getName());
    }

    protected function formatPrice()
    {
        $this->furniture->setPrice("Price: " . $this->furniture->getPrice() . " &dollar;");
    }

    protected function formatMesurement()
    {
        $this->furniture->setMesurement("Dimensions : " . $this->furniture->getHeight() . "x" . $this->furniture->getWidth() . "x" . $this->furniture->getLength());
    }
}