<?php

/* 
 if you want to insert all data of the post request or get request or REQUEST variable of 
 data direct into the database simple call the method for inserting all the data

*/

// $table_name (type string) => simple pass table name where you insert the data
// $post (type Array)  => post is the variable where simple pass all post data or array of the you want to insert
function insertAll($table_name, $post)
{
    global $conn;  // he getting the global connection
    $key = array(); //for storing all the key of the post request
    $data = array(); //for storing the all data of the post request
    foreach ($post as $p => $value) {
        array_push($key, '`' . $p . '`');
        array_push($data, "'" . $value . "'");
    }
    $query = "INSERT INTO `$table_name`(" . implode(',', $key) . ") VALUES (" . implode(',', $data) . ")";
    if (mysqli_query($conn, $query)) {
        return "success";
    } else {
        return $conn->error;
    }
}

/* 
 if you want to update all data of the post request or get request or REQUEST variable of 
 data direct into the database simple call the method for inserting all the data

*/
// $table_name (type string) => simple pass table name where you update the data
// $post (type Array) => post is the variable where simple pass all post data or array of the you want to update
// $condition  (type string) => condition is the variable name in this variable simle pass the condition of the table 
function updateAll($table_name, $post, $condition = 1)
{
    global $conn;  // he getting the global connection
    $data = array(); //for storing the all data of the post request
    foreach ($post as $p => $value) {
        array_push($data, '`' . $p . '`=' . $value);
    }
    $query = "UPDATE `$table_name` SET " . implode(',', $data) . " WHERE" . $condition;
    if (mysqli_query($conn, $query)) {
        return "success";
    } else {
        return $conn->error;
    }
}

function delete($table_name, $condition = 1)
{
    global $conn;  // it is   the global connection
    echo $query = "DELETE FROM `$table_name` WHERE " . $condition;
    if (mysqli_query($conn, $query)) {
        return "success";
    } else {
        return $conn->error;
    }
}
