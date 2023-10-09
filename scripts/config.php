<?php

$conn = null;
$DB_NAME = "db_itim_bookrental";
$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";

function connect($database, $host, $user, $password)
{
    global $conn;
    $conn = mysqli_connect($host, $user, $password)
        or
        die("Could not connect");

    mysqli_select_db($conn, $database)
        or
        die("Error in selecting database!\n" . mysqli_error($conn));
}

// function for opening connection
function openConnection()
{
    global $DB_NAME, $DB_HOST, $DB_USERNAME, $DB_PASSWORD;
    global $conn;

    if ($conn) {
        closeConnection();
    }
    connect($DB_NAME, $DB_HOST, $DB_USERNAME, $DB_PASSWORD);
}

// function for closing connection
function closeConnection()
{
    global $conn;
    mysqli_close($conn);
}

function executeQuery($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    return $result;
}

function executeSelectQuery($query)
{
    $result = executeQuery($query);
    $data = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function selectFrom($table, $column, $value){
    $query = "SELECT * FROM $table WHERE $column=\"$value\"";
    
    $result = executeQuery($query);
    $data = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function selectAllFrom($table){
    
    $result = executeQuery("SELECT * FROM $table");
    $data = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

function selectAllFromWhere($table, $column, $value){
    
    $result = executeQuery("SELECT * FROM $table WHERE $column=\"$value\"");
    $data = array();
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}




// function for executing insert query
function executeInsertQuery($query)
{
    global $conn;
    $result = executeQuery($query);
    if ($result) {
        return mysqli_insert_id($conn);
    } else {
        return false;
    }
}

// function for executing update query
function executeUpdateQuery($query)
{
    global $conn;
    $result = executeQuery($query);
    if ($result) {
        return mysqli_affected_rows($conn);
    } else {
        return false;
    }
}

// function for executing delete query
function executeDeleteQuery($table, $column, $id)
{
    $query = "DELETE FROM $table WHERE $column=\"$id\"";
    return executeUpdateQuery($query);
}

