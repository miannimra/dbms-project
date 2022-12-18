<?php

session_start();
if (isset($_SESSION['loginID'])) {
} else {
    header("Location: main.html");
}
include_once 'dbh-inc.php';

if (isset($_GET['readerid'])) {
    $sql = "DELETE FROM `reader` WHERE `readerID` =  " . $_GET['readerid'];

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