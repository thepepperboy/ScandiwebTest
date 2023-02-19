<?php

class ProductSaver
{
    private $errors = [];
    protected $sku;
    protected $name;
    protected $price;
    protected $mesurement;

    public function saveProduct($postData)
    {
        $saveAs = self::createProduct($postData);
        $this->errors = $saveAs->validate();

        if ($this->errors == null) {
            $this->sku = $saveAs->getValues('getSku');
            $this->name = $saveAs->getValues('getName');
            $this->price = $saveAs->getValues('getPrice');
            $this->mesurement = $saveAs->getValues('getMesurement');

            $this->save();
        }    
        return $this->errors;
    }

    public static function createProduct($postData)
    {
        $product = $postData['type'] . 'Factory';
        $create = new $product($postData);

        return $create;
    }

    protected function save() 
    {
        if (empty($this->errors)) {
            $db = new Database(DB_USERNAME, DB_PASSWORD);
            $db->run("INSERT INTO items (SKU, name, price, mesurements) VALUES (?,?,?,?)", [$this->sku, $this->name, $this->price, $this->mesurement]);

            header('Location: http://scandiwebtest.pipars.site');
        }
    }
};
