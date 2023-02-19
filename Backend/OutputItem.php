<?php

$db = new Database(DB_USERNAME, DB_PASSWORD);
$items = $db->run("SELECT * FROM items")->fetchAll();

foreach ($items as $i) {
    echo 
    "<div class='item_box'>
        <input form='delete' type='checkbox' class='delete-checkbox' name='check[]' value='". $i['id'] ."'>
        <div class='item'>
            <p class='item_values'>" . $i['SKU'] .  "</p>
            <p class='item_values'>" . $i['name'] . "</p>
            <p class='item_values'>" . $i['price'] . "</p>
            <p class='item_values'>" . $i['mesurements'] . "</p>
        </div>
    </div>";
};