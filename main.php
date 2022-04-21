<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
<?php

require 'config.php';
include 'methods/crud.php';
include 'methods/pagination.php';
include 'methods/search_data.php';
include 'methods/table.php';
include 'methods/login.php';

?>
<table class="table table-striped">
    <?php tableGen('tbl_university_details',['university_details_financial_start_date','university_details_financial_end_date','university_details_academic_start_date'],['university_details_financial_start_date','university_details_financial_end_date','university_details_academic_start_date'],'university_details_id','true','','','lol');
 ?>
</table>
<style>
    .id13{
        display: none;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>