<?php
session_start();
require_once('./config.php');
if (empty($_SESSION["id"])) {
    header("Location: login.php");
}


if (isset($_GET["submit"])) {
    $posttitle = $_GET["posttitle"];
    $postcontent = $_GET["postcontent"];
    $author = $_GET["author"];
    $date = $_GET["date"];

    $query = "INSERT INTO posts(poststitle,postcontent,author,postdate) VALUES('$posttitle','$postcontent','$author','$date')";
    if (mysqli_query($link, $query)) {
        echo 'posted successfully you will be redirected shortly';
        header("location: blog.php");
    } else {
        'not posted';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Post</title>
    <?php include "./includes/header-scripts.php" ?>
    <?php include "./includes/navbar.php" ?>
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <form action="" method="get">
                <div class="col-sm-12 col-md-8 my-2"><input class="form-control" type="text" name="posttitle" id="" placeholder="Post Title" required></div>
                <div class="col-sm-12 col-md-8"><textarea class="form-control" name="postcontent" id="" cols="30" rows="2" placeholder="Enter your Post" required></textarea></div>
                <input type="text" name="author" value="<?php echo $_SESSION['username']; ?>" hidden>
                <input type="text" name="date" value="<?php echo date('y-m-d') ?>" hidden>
                <div class="my-3">
                    <button type="submit" class="btn btn-success" name="submit">Post</button> <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>