<?php

function run_sql($sql) {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_database = "Customer";

    $db = mysqli_connect($db_host, $db_user, $db_pass);
    mysqli_select_db($db, $db_database);
    $result = mysqli_query($db, $sql);

    mysqli_close($db);

    return $result;
}
