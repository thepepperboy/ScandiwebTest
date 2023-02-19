<?php

class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    public function __construct($postData) 
    {        
        $this->sku = $postData['SKU'];
        $this->name = $postData['name'];
        $this->price = $postData['price'];
        $this->type = $postData['type'];
    }

    public function setSku($SKU): void
    {
        $this->sku = $SKU;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    } 

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getProductType(): string
    {
        return $this->type;
    }
};