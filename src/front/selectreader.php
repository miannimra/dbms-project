<?php
session_start();
if (isset($_SESSION['loginID'])) {
} else {header("Location: main.html");}
include_once 'dbh-inc.php';

$sql = "SELECT * FROM `reader` WHERE 1=1";

$result = mysqli_query($conn, $sql);
$totalitems = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Select Reader</title>
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
                $readerid = $row['readerID'];
                $first = $row['firstname'];
                $last = $row['lastname'];
                $email = $row['email'];

                $rowstring .= '<hr/><div class="row">
                <div class="col-md-1">' . $readerid . '</div>
                <div class="col-md-2">' . $first . '</div>
                <div class="col-md-3">' . $last . '</div>
                <div class="col-md-2">' . $email . '</div>
                <div class="col-md-2"><a href="updatereader.php?id=' . $readerid . '">Update</a> | <a href="deletereader.php?id=' . $readerid . '">Delete</a></div>
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