<?php

class BookFactory extends BaseFactory implements BeforeSave
{
    protected $book;

    public function __construct($postData)
    {
        $this->book = new Book($postData);
        parent::__construct($postData);
    }

    public function getValues($value)
    {
        return $this->book->$value();
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
        if (!is_numeric($this->book->getWeight()) || $this->book->getWeight() < 0) {
            $this->errors['weight'] = 'Please, provide weight';
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
        $this->book->setSku("SKU: " . $this->book->getSku());
    }

    protected function formatName()
    {
        $this->book->setName("Name: " . $this->book->getName());
    }

    protected function formatPrice()
    {
        $this->book->setPrice("Price: " . $this->book->getPrice() . " &dollar;");
    }

    protected function formatMesurement()
    {
        $this->book->setMesurement("Weight: " . $this->book->getWeight() . "KG");
    }
}