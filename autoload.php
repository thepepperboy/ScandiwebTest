<?php

function autoload($className)
{
    $pathToFile = 'Backend/' . $className . '.php';
    
    if (file_exists($pathToFile)) {
		require $pathToFile;
	}
}

function autoloadAddProduct($className)
{
    $pathToFile = '../Backend/' . $className . '.php';
    
    if (file_exists($pathToFile)) {
		require $pathToFile;
	}
}

function backendAutoload($className)
{
    $pathToFile = $className . '.php';
    
    if (file_exists($pathToFile)) {
		require $pathToFile;
	}
}

spl_autoload_register('autoload');
spl_autoload_register('autoloadAddProduct');
spl_autoload_register('backendAutoload');