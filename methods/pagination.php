<?php

// it is function for pagination 
// $con -> is a connection object doing the connection with the database
// $table_name -> is the table name you want the connection
// $perPageRecord -> is the variable how much data you want to show in a page
// $url -> is the url name in which url redirect after clicking into the pagination button
// $id -> is the variable which is have default value is id but if any table have some different id name the pass into the function
// $color-> color is the also a variable which is the default color is blue but you want something different color simply pass into the variable


function  paginate($table_name, $perPageRecord, $url, $condition = 1, $id = 'id', $color = "blue")
{
    global $conn;
    $limit = $perPageRecord;
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    } else {
        $page = 1;
    };
    $query = "SELECT COUNT('$id') FROM `$table_name` WHERE $condition";
    $result_db = mysqli_query($conn, $query);
    $row_db = mysqli_fetch_row($result_db);
    $total_records = $row_db[0];
    $total_pages = $total_records;
    $num_results_on_page = $limit;

    /* echo  $total_pages; */ ?>
    <div class="ml-3">
        <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
            <ul class="pagination">
                <?php if ($page > 1) : ?>
                    <li class="prev page-item"><a href="<?= $url ?>?page=<?php echo $page - 1 ?>">Prev</a></li>
                <?php endif; ?>

                <?php if ($page > 3) : ?>
                    <li class="start"><a href="<?= $url ?>?page=1">1</a></li>
                    <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($page - 2 > 0) : ?><li class="page"><a href="<?= $url ?>?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
                <?php if ($page - 1 > 0) : ?><li class="page"><a href="<?= $url ?>?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

                <li class="currentpage"><a href="<?= $url ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="<?= $url ?>?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
                <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="<?= $url ?>?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
                    <li class="dots">...</li>
                    <li class="end"><a href="<?= $url ?>?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                <?php endif; ?>

                <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
                    <li class="next"><a href="<?= $url ?>?page=<?php echo $page + 1 ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>

    <style>
        .pagination {
            list-style-type: none;
            padding: 10px 0;
            display: inline-flex;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .pagination li {
            box-sizing: border-box;
            padding-right: 5px;
        }

        .pagination li a {
            box-sizing: border-box;
            background-color: #e2e6e6;
            padding: 8px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            color: #616872;
            border-radius: 4px;
        }

        .pagination li a:hover {
            background-color: #d4dada;
        }

        .pagination .next a,
        .pagination .prev a {
            text-transform: uppercase;
            font-size: 12px;
        }

        .pagination .currentpage a {
            background-color: <?php echo $color ?>;
            color: #fff;
        }

        .pagination .currentpage a:hover {
            background-color: #792910a4;
        }
    </style>
<?php

}
?>