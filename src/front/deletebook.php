<?php

session_start();
if (isset($_SESSION['loginID'])) {
} else {
    header("Location: main.html");
}
include_once 'dbh-inc.php';

if (isset($_GET['bookid'])) {
    $sql = "DELETE FROM `book` WHERE `bookid` =  " . $_GET['bookid'];

    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Library Record Deleted";
    }
} else {
    echo "Error";
}
?>
<br />
<a href="selectbook.php">Go to list page</a>