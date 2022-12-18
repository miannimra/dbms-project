<?php

session_start();
if (isset($_SESSION['loginID'])) {
} else {
    header("Location: main.html");
}
include_once 'dbh-inc.php';

if (isset($_POST['readerid'])) {
    $readerid = $_POST['readerID'];
    $first = $row['firstname'];
    $last = $row['lastname'];
    $email = $row['email'];

    $sql = "UPDATE `reader` SET `readerID` = '$readerid', `firstname` = '$first', `lastname` = '$last', `email` = '$email' WHERE `reader`.`readerID` = " . $readerid;
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Library Records updated";
    } 
} else {
    echo "Error Found";
}

?>
<br />
<a href="selectbook.php">Go to list page</a>