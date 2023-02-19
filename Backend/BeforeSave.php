<?php

interface BeforeSave
{
    public function validate();
    public function AddFormat();
    public function getValues($value);
};