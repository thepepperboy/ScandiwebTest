<?php

include('../autoload.php');
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] !== "POST")
{
    header('Location: http://scandiwebtest.pipars.site');
}

if (isset($_POST['MassDelete']) && count($_POST['check']) > 0 )
{
    $db = new Database(DB_USERNAME, DB_PASSWORD);
    $checked = implode(',', $_POST['check']);

    $delete = $db->run("DELETE FROM items WHERE id IN ($checked)");
}

header('Location: http://scandiwebtest.pipars.site');