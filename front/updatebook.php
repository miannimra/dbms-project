<?php

session_start();
if (isset($_SESSION['loginID'])) {
} else {
    header("Location: main.html");
}
include_once 'dbh-inc.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>

<body class="bg-light">

    <div class="container">
        <div class="text">
            <img class="d-block mx-auto mb-4" src="" alt="" width="240" height="64">
            <h2></h2>
        </div>

        <?php

        if (isset($_GET['bookid'])) {
            $sql = "SELECT * FROM `book` WHERE `ISBN`=" . $_GET['bookid'];
            $result = mysqli_query($conn, $sql);
            $totalitems = mysqli_num_rows($result);
            if ($totalitems > 0) {
                $row = mysqli_fetch_assoc($result);
                $bookid = $row['ISBN'];
                $title = $row['title'];
                $author = $row['author'];
                $genre = $row['genre'];
        ?>
                <fieldset>
                    <form name="frmContact" class="needs-validation " method="post" action="submitupdatebook.php">
                        <p>
                            <label for="ISBN">ISBN </label><input type="hidden" name="bookid" value="<?php echo $bookid; ?>" />
                            <input type="text" class="form-control" name="title" id="booktitle" placeholder="Title" value="<?php echo $title; ?>" required>
                        <div class="invalid-feedback">
                            Valid title is required.
                        </div>
                        </p>
                        <p>
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author" id="author" placeholder="Author" value="<?php echo $author; ?>" required>
                        </p>
                        <p>
                            <label for="genre">Genre</label>
                            <textarea name="text" class="form-control" id="genre" placeholder="Genre" required><?php echo $genre; ?></textarea>
                        </p>
                        <p>&nbsp;</p>
                        <p>
                            <input type="submit" name="Submit" id="Submit" value="Update" class="btn btn-primary btn-lg btn-block">
                        </p>
                    </form>
                </fieldset>
        <?php
            } else {
                echo "There is no records of this ISBN in this database";
            }
        } else {
            echo "You didn't provide any ISBN number!";
        }
        ?>
    </div>

</body>

</html>