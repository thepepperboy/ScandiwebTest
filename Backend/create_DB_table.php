<?php

include('../config.php');

$dsn = "mysql:host=sql213.epizy.com;dbname=epiz_32416454_scandiweb;port=3306;charset=utf8mb4";
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $connection = new \PDO($dsn, DB_USERNAME, DB_PASSWORD, $options); 
} catch (PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
};
  
try {
    $sql = "CREATE TABLE IF NOT EXISTS items(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        SKU VARCHAR(20) NOT NULL UNIQUE,
        name VARCHAR(30) NOT NULL,
        price VARCHAR(30) NOT NULL,
        mesurements VARCHAR(60) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $connection->exec($sql);

    echo "<p>Table created</p>";

} catch (PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
$connection = null;