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

        if (isset($_GET['readerid'])) {
            $sql = "SELECT * FROM `reader` WHERE `readerID`=" . $_GET['readerid'];
            $result = mysqli_query($conn, $sql);
            $totalitems = mysqli_num_rows($result);
            if ($totalitems > 0) {
                $row = mysqli_fetch_assoc($result);
                $readerid = $row['readerID'];
                $first = $row['firstname'];
                $last = $row['lastname'];
                $email = $row['email'];
        ?>
                <fieldset>
                    <form name="readerform" class="needs-validation " method="post" action="submitupdatereader.php">
                        <p>
                            <label for="readerid">Reader ID </label><input type="hidden" name="readerid" value="<?php echo $readerid; ?>" />
                            <input type="text" class="form-control" name="first" id="first" placeholder="First name" value="<?php echo $first; ?>" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                        </p>
                        <p>
                            <label for="email">Last Name</label>
                            <input type="text" class="form-control" name="last" id="last" placeholder="Last name" value="<?php echo $last; ?>" >
                        </p>
                        <p>
                            <label for="email">Email</label>
                            <input type="text" name="text" class="form-control" id="email" placeholder="email" required><?php echo $email; ?></textarea>
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