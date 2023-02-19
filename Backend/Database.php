<?php

class Database
{
  public $pdo;
  
  function __construct($username, $password, $options = [])
  {
    $default_options = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];
    $options = array_replace($default_options, $options);
    $dsn = "mysql:host=sql213.epizy.com;dbname=epiz_32416454_scandiweb;port=3306;charset=utf8mb4";

    try {
      $this->pdo = new PDO($dsn, $username, $password, $options); 
    } catch (PDOException $e) {
      throw new PDOException($e->getMessage(), (int)$e->getCode());
    };
  }

  public function __destruct()
	{
		$this->pdo = NULL;
	}

  public function run($sql, $arguments = NULL)
  {
    if (!$arguments)
    {
      return $this->pdo->query($sql);
    }
    $statement = $this->pdo->prepare($sql);
    $statement->execute($arguments);
    return $statement;
  }
};