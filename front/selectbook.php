<?php
session_start();
if (isset($_SESSION['loginID'])) {
} else {header("Location: main.html");}
include_once 'dbh-inc.php';

$sql = "SELECT * FROM `book` WHERE 1=1";

$result = mysqli_query($conn, $sql);
$totalitems = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Select Book</title>
</head>

<body>

    <div class="container" style="width:1124px; margin:0 auto;">
        <div class="text-center">
            <h2>View All Records</h2>
        </div>

        <?php
        //Check if records are more then 0 
        if ($totalitems > 0) {
            $rowheading = '<hr/><div class="row "  style="font-weight:bold">
                                <div class="col-md-1">ISBN</div>
                                <div class="col-md-2">Title</div>
                                <div class="col-md-3">Author</div>
                                <div class="col-md-2">Genre</div>
                                <div class="col-md-2">Action</div>
                                
                                </div>';

            $rowstring = ''; 
            while ($row = mysqli_fetch_assoc($result)) {
                $bookid = $row['ISBN'];
                $title = $row['title'];
                $author = $row['author'];
                $genre = $row['genre'];

                $rowstring .= '<hr/><div class="row">
                <div class="col-md-1">' . $bookid . '</div>
                <div class="col-md-2">' . $title . '</div>
                <div class="col-md-3">' . $author . '</div>
                <div class="col-md-2">' . $genre . '</div>
                <div class="col-md-2"><a href="updatebook.php?id=' . $bookid . '">Update</a> | <a href="deletebook.php?id=' . $bookid . '">Delete</a></div>
                </div>';
            }
            echo $rowheading . $rowstring;
        } else {
            echo "There is no record in the database";
        }
        ?>

    </div>
</body>
</html>