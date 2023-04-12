<?php
require_once('./config.php');
session_start();
if (empty($_SESSION["id"])) {
    header("Location: login.php");
}
$name = $_SESSION['username'];

$_SESSION['username'] = $name;

$uid = $_SESSION['id'];





if (isset($_GET["commentsubmit"])) {
    $referenceid = $_GET["referenceid"];
    $comment = $_GET["comment"];
    $commentauthor = $_GET["commentauthor"];

    $query = "INSERT INTO comments(comment,author,referenceid) VALUES('$comment','$commentauthor','$referenceid')";
    if (mysqli_query($link, $query)) {
        echo '<script>
        alert ("commented posted");
        </script>';
    } else {
        echo '<script>
        alert ("comment not posted")
        </script>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books and Blogs | Blog</title>
    <?php include "./includes/header-scripts.php" ?>
    <?php include "./includes/navbar.php" ?>
</head>

<body class="body">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 my-3">
                <h3>Welcome <?php echo $name; ?></h3>
            </div>
            <div class="col-sm-12 col-md-12">
                <a href="add-post.php" class="btn btn-success">&plus;</a>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM posts";
            if ($result = mysqli_query($link, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $pid = $row['id'];
                        $_SESSION['cid'] = $pid;
            ?>
                        <div class="col-sm-12 col-md-8 my-2 posts">
                            <h3 class="text-success"><?php echo $row['poststitle']; ?></h3>
                            <p><?php echo $row['postdate']; ?></p>
                            <p class="postscontent"><?php $content = $row['postcontent'];
                                                    if (strlen($content) > 300) {
                                                        echo substr($content, 0, 300) . '... <a class="text-primary" href="post.php?id=' . $row['id'] . '">Read more</a>';
                                                    } else {
                                                        echo $content;
                                                    }
                                                    ?> <br> <b>By <?php echo $row['author']; ?></b></p>
                            <p> Comments <br>
                                <?php
                                $comments = "SELECT * FROM comments WHERE referenceid = $pid";
                                if ($results = mysqli_query($link, $comments)) {
                                    if (mysqli_num_rows($results) > 0) {
                                        $j = 1;
                                        while ($rows = mysqli_fetch_array($results)) { ?>
                            <div class="col-sm-12 col-md-8">
                                <?php echo $rows['comment']; ?> - by <?php echo $rows['author']; ?>
                            </div>
                <?php $j++;
                                        }
                                        mysqli_free_result($results);
                                    } else {
                                        echo "";
                                    }
                                } else {
                                    echo "Failed";
                                }
                ?>
                <div class="col-sm-12 col-md-4 my-2">
                    <form action="" method="get" class="d-flex">
                        <input class="form-control rounded-pill" id="commentbutton" type="text" name="comment" placeholder="Comment" onkeyup="openbutton()">
                        <input type="text" name="referenceid" value="<?php echo $row['id']; ?>" style="display:none">
                        <input type="text" name="commentauthor" value="<?php echo $name; ?>" style="display:none;">
                        <button class="btn btn-success mt-2 mx-2 rounded-pill" id="button" type="submit" data-toggle="tooltip" data-placement="top" title="Click to submit" name="commentsubmit"><i class="bi bi-caret-right-fill"></i></button>
                    </form>
                </div>
                </p>
                        </div>
                        <hr>
            <?php $i++;
                    }
                    mysqli_free_result($result);
                } else {
                    echo '<p class="my-5"><b>No Post found Click the above button to add </b> </p>';
                }
            } else {
                echo "invalid query";
            } ?>

        </div>
    </div>



    <?php include "./includes/footer-scripts.php"; ?>
    <?php include "./includes/footer.php"; ?>

    <script>
        button = document.getElementById("commentbutton");
        commentbutton = document.getElementById("button");

        function openbutton() {
            if (button.value.length > 1) {
                this.commentbutton.removeAttribute("hidden");
                console.log(button.length);
            } else {
                this.commentbutton.setAttribute("hidden", "true");
            }
        }
    </script>
</body>


<?php include("./includes/footer-scripts.php"); ?>

</html>