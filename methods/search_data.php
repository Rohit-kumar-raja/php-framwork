<?php



function search_data($table_name, $edit_url = '', $delete_url = '', $show_url = '', $condition = 1)
{
    global $conn;
    global $database;
    $search_string = '';
    $key = array();

    if (isset($_GET['q'])) {
        $search_string = $_GET['q'];
    }
    $th_query = "SELECT `COLUMN_NAME` FROM information_schema.columns WHERE `table_name`='$table_name' && `table_schema`='$database' ORDER BY 'id' DESC ";
    $th_result = mysqli_query($conn, $th_query);
    $sno = 1;
    // this is the id of the table for goes into the next page
    $id=mysqli_fetch_array($th_result)[0];
    foreach ($th_result as $th_row) {
        array_push($key, $th_row['COLUMN_NAME'] . ' LIKE ' . "'%" . $search_string . "%'");
    }
    $td_query = "SELECT * FROM `$table_name` WHERE " . implode("||", $key) . " && $condition ";
    $td_result = mysqli_query($conn, $td_query);

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
