<?php


// for generating the table row
function thGen($table_name, $action = 'false')
{
    global $conn;
    global $database;
    $th_query = "SELECT `COLUMN_NAME` FROM information_schema.columns WHERE `table_name`='$table_name' && `table_schema`='$database' ";
    $th_result = mysqli_query($conn, $th_query);
    echo "<th>S.NO</th>";
    while ($th_row = mysqli_fetch_array($th_result)) {
        if ($th_row['COLUMN_NAME'] != 'id')
            echo "<th>" .  $th_row['COLUMN_NAME'] . "</th>";
    }
    if ($action == 'true') {
        echo "<th> Action  </th>";
    }
}


// it is used for generating the column name
function tdGen($table_name,  $edit_url = '', $delete_url = '', $show_url = '', $condition = 1)
{
    global $conn;
    global $database;
    $th_query = "SELECT `COLUMN_NAME` FROM information_schema.columns WHERE `table_name`='$table_name' && `table_schema`='$database' ORDER BY 'id' DESC ";
    $th_result = mysqli_query($conn, $th_query);
    $sno = 1;
    $td_query = "SELECT * FROM `$table_name` WHERE $condition ";
    $td_result = mysqli_query($conn, $td_query);
    // this is the id of the table for goes into the next page
    $id = mysqli_fetch_array($th_result)[0];

    while ($td_row = mysqli_fetch_array($td_result)) {

        echo "<tr>";
        echo "<td>" . $sno++ . "</td>";
        foreach ($th_result as $th_row) {
            if ($th_row['COLUMN_NAME'] != $id)
                echo "<td>" . $td_row[$th_row['COLUMN_NAME']] . "</td>";
        }
        echo '<td class="text-center" >';
        if ($show_url != '') {
            echo ' <a href="' . $show_url . '?show=' . $td_row[$id] . '"  class="btn btn-primary btn-sm  fas fa-eye "> show</a>';
        }
        if ($edit_url != '') {
            echo ' <a href="' . $edit_url . '?edit=' . $td_row[$id] . '"  class="btn btn-warning btn-sm fas fa-edit "> edit</a>';
        }
        if ($delete_url != '') {
            echo ' <a href="' . $delete_url . '?delete=' . $td_row[$id] . '"  class="btn btn-danger btn-sm fas fa-trash "> delete</a>';
        }
        echo '</td>';
        echo "</tr>";
    }
}

/* this function is used for generating the table row and column according to the requirement
    if you want to display one 1 or 4 or 10 and any more simply pass all the table row into the table 
    th_array and into the td_array simply pass the table column name
*/
function tableGen($table_name, $th_array, $td_array, $action = 'false', $edit_url = '', $delete_url = '', $show_url = '', $condition = 1)
{
    global $conn;
    $sno = 1;
    $id = 'admin_id';
    $table_query = "SELECT  admin_id," . implode(',', $td_array) . " FROM `$table_name` WHERE $condition ";
    $table_result = mysqli_query($conn, $table_query);
    // this is the id of the table for goes into the next page
    $n = 0;
    // for table header generating
    echo "<thead> <tr>";
    echo "<th> S.NO</th>";
    foreach ($th_array as $th) {
        echo "<th>" . $th . "</th>";
    }
    if ($action == 'true') {
        echo "<th> Action </th>";
    }
    echo "</tr></thead>";
    // for table header generating end

    echo "<tbody>"; //for generating table body
    while ($table_row = mysqli_fetch_array($table_result)) {
        echo "<tr>";
        echo "<td>" . $sno++ . "</td>";
        foreach ($td_array as $td) {
            echo "<td>" . $table_row[$td] . "</td>";
        }
        echo "<td>";
        if ($show_url != '') {
            echo ' <a href="' . $show_url . '?show=' . $table_row[$id] . '"  class="btn btn-primary btn-sm  fas fa-eye "> show</a>';
        }
        if ($edit_url != '') {
            echo ' <a href="' . $edit_url . '?edit=' . $table_row[$id] . '"  class="btn btn-warning btn-sm fas fa-edit "> edit</a>';
        }
        if ($delete_url != '') {
            echo ' <a href="' . $delete_url . '?delete=' . $table_row[$id] . '"  class="btn btn-danger btn-sm fas fa-trash "> delete</a>';
        }
        echo '</td>';
        echo "</tr>";
    }
    echo "</tbody>"; //table body end

}
