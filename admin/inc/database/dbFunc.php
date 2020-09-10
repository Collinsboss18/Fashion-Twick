<?php
function db_connect()
{
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Connection Error: " . mysqli_connect_error());
    }
    return $conn;
}

function select_query($query)
{
    if ($conn = db_connect()) {
        if ($result = mysqli_query($conn, $query)) {
            return $result;
        }
    }
    return false;
}

function insert_query($query)
{
    if ($conn = db_connect()) {
        mysqli_query($conn, $query);
    }
}