<?php

class BaseFactory
{
    protected $product;
    protected $errors = [];

    public function __construct($postData)
    {
        $this->product = new Product($postData);     
    }

    public function getValues($value)
    {
        return $this->product->$value();
    }
    
    public function validate()
    {
        $this->validateSku();
        $this->validateName();
        $this->validatePrice();
        $this->validateType();

        return $this->errors;
    }

    protected function validateSku()
    {        
        if (!preg_match('/^[a-zA-Z0-9]+$/', $this->product->getSku())) {    
            $this->addError('SKU', 'Please, provide SKU');
        }

        $dbSku = 'SKU: ' . $this->product->getSku();
        $db = new Database(DB_USERNAME, DB_PASSWORD);
        $select = $db->run("SELECT SKU FROM items WHERE SKU=?", [$dbSku]);

        if ($select->rowCount() > 0) {
            $this->addError('SKU', 'This SKU already exists');
        }
    }

    protected function validateName()
    {
        if (!preg_match('/^[a-zA-Z0-9 ]+$/', $this->product->getName())) {
            $this->addError('name', 'Please, provide name');
        }
    }

    protected function validatePrice()
    {
        if (!is_numeric($this->product->getPrice()) || $this->product->getPrice() < 0) {
            $this->addError('price', 'Please, provide price');
        }
    }

    protected function validateType()
    {
        if (!in_array($this->product->getProductType(), ['Dvd', 'Book', 'Furniture']) || $this->product->getProductType() == NULL) {
            $this->addError('type', 'Please, select type');
        }
    }

    protected function addError($key, $val)
    {
        $this->errors[$key] = $val;
    }
    
    public function getErrors() 
    {
        return $this->errors;
    }
};