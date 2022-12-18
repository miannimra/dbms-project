<?php

session_start();
if (isset($_SESSION['loginID'])) {
} else {
    header("Location: main.html");
}
include_once 'dbh-inc.php';

if (isset($_POST['bookid'])) {
    $bookid = $_POST['ISBN'];
    $title = $row['title'];
    $author = $row['author'];
    $genre = $row['genre'];

    $sql = "UPDATE `book` SET `ISBN` = '$bookid', `genre` = '$genre', `title` = '$title', `author` = '$author' WHERE `book`.`Id` = " . $bookid;
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