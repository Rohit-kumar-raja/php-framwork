<?php

require 'config.php';
include './methods/crud.php';
include './methods/pagination.php';
include './methods/search_data.php';
include './methods/table.php';
if (isset($_POST['name']) && $_POST['name'] != '') {

    insertAll('address', $_POST);
}

?>
