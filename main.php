<?php

require 'config.php';
include 'methods/crud.php';
include 'methods/pagination.php';
include 'methods/search_data.php';
include 'methods/table.php';
include 'methods/login.php';

$post=['admin_username'=>'admin','admin_password'=>'Rohit83013@#'];
echo login('tbl_admin','admin_username','admin_password',$post);
?>
