<?php

session_start();
if (isset($_SESSION['loginID'])) {
} else {
    header("Location: main.html");
}
include_once 'dbh-inc.php';

if (isset($_POST['bookid'])) {

    $bookid = $_POST['ISBN'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];

    $sql = "INSERT INTO `book` (`ISBN`, `genre`, `title`, `author`) VALUES ('$bookid', '$title', '$author', '$genre')";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Library Records Inserted";
    }
} else if (isset($_POST['readerid'])) {

    $readerid = $_POST['readerid'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `reader` (`readerid`, `first`, `last`, `email`) VALUES ('$readerid', '$first', '$last', '$email')";

    $res = mysqli_query($conn, $sql);
    if ($res) {?>
        <p>Library records Inserted <br> <?php
    }
} else {?>
    <p>Error<br><?php
}
?>
<br />

<a href="main.html">Add New Record</a>