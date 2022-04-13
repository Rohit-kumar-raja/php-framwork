<?php


// for generating the table row
function thGen($table_name, $action = 1)
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
    if ($action == 1) {
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
     $id=mysqli_fetch_array($th_result)[0];

    while ($td_row = mysqli_fetch_array($td_result)) {

        echo "<tr>";
        echo "<td>" . $sno++ . "</td>";
        foreach ($th_result as $th_row) {
            if ($th_row['COLUMN_NAME'] != $id)
                echo "<td>" . $td_row[$th_row['COLUMN_NAME']] . "</td>";
        }
        echo '<td>';
        if ($show_url != '') {
            echo ' <a href="' . $show_url . '?show='.$td_row[$id].'"  class="btn btn-primary">show</a>';
        }
        if ($edit_url != '') {
            echo ' <a href="' . $edit_url . '?edit='.$td_row[$id].'"  class="btn btn-warning">edit</a>';
        }
        if ($delete_url != '') {
            echo ' <a href="' . $delete_url . '?delete='.$td_row[$id].'"  class="btn btn-danger">delete</a>';
        }
        echo '</td>';
        echo "</tr>";
    }
}
