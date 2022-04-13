<?php 

require 'config.php';
include './methods/crud.php';
include './methods/pagination.php';
include './methods/search_data.php';
include './methods/table.php';

?>


<table border="1">
    <thead>
        <?php  thGen('migrations'); ?>
    </thead>
    <tbody>
    <?php search_data('migrations','#') ?>
    </tbody>
</table>