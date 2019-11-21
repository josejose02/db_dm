<?php

function db_connection(){
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";

    $db = mysqli_connect($db_host, $db_user, $db_pass);

    if (!$db){
        die("Connection failed: " . mysqli_connect_error());
    }
    return $db;
}

function check_str($str){
    $db = db_connection();
    $return = mysqli_real_escape_string($db, $str);
    mysqli_close($db);

    return $return;
}

function run_sql($sql) {
    $db_database = "Customer";
    $db = db_connection();

    mysqli_select_db($db, $db_database);
    $result = mysqli_query($db, $sql);

    mysqli_close($db);

    if (!$result){
        echo "<script> console.log(".mysqli_error($db).")</script>";
        return false;
    }
    return $result;
}
