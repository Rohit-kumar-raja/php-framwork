<?php

/* this function for you want to login into the give the login option in your application 
   you defiantly needed the login option this function to you can easily login into the application
    simply Enter the required parameter
    $tableName - > table name is the variable this variable taking the table name to you want to login
    $userNameColumn - > username is the function variable in this variable simply pass the column name of the user
    $passwordColumn - > password column name is also function variable it is simply pass the column name of password
   */
function login($tableName, $userNameColumn, $passwordColumn, $post)
{
    $db_userName = '';
    $db_password = '';

    if (password_check($post[$passwordColumn]) == false) {
        return "password must 0-9,a-z ,A-Z ,[!@#$%^&*-] minimum 8 character ";
    }
    global $conn;
    $password = md5($post[$passwordColumn]);
    $query = "SELECT * FROM `$tableName` WHERE `$userNameColumn`='$post[$userNameColumn]' && `$passwordColumn`='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
        $db_userName = $data[$userNameColumn];
        $db_password = $data[$passwordColumn];
    }

    // getting the userNameColumn and passwordColumn from post
    $userNameColumn = $post[$userNameColumn];
    $passwordColumn = $post[$passwordColumn];

    if ($userNameColumn === $db_userName && $password === $db_password) {
        return "success";
    } else {
        return "These credentials do not match our records.";
    }
}

// for password validation and checking the strong password or not if the password 
//  is strong then  the password_check function return md5 of the password else 
// return false
function password_check($password)
{
    if (preg_match(('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/'), $password)) {
        return md5($password);
    } else {
        return false;
    }
}

// for email validation
function email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return false;
    }
}

