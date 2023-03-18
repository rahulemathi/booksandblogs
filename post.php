<?php 
require_once('./config.php');
session_start();
if(empty($_SESSION["id"])){
  header("Location: login.php");
}

$pid = $_SESSION['cid'];
$name = $_SESSION['username'];
$id = $_GET["id"];

$sql = "SELECT * FROM posts WHERE id = '$id'";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

            $posttitle = $row['poststitle'];
            $postcontent   = $row['postcontent'];
            $postdate = $row['postdate'];
            $author = $row['author'];
        
         mysqli_free_result($result);
    }
    else
    {
         echo "Unable to fetch Data";
    }
}
else
{
    echo "Failed";
}


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
    <title>Single Post</title>
    <?php include "./includes/header-scripts.php" ?>
    <?php include "./includes/navbar.php" ?>
</head>
<body>
<div class="container">
        <div class="row">
        
  <div class="col-sm-12 col-md-8 my-3 posts">
            <h3><?php echo $posttitle?></h3>
                <p><?php echo $postdate;?></p>
                <p class="postscontent"><?php echo $postcontent;?>
             <br> <b>By <?php echo $author;?></b></p>
             <p>
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
                <!-- <div class="col-sm-12 col-md-4 my-2">
                    <form action="" method="get" class="d-flex">
                        <input class="form-control rounded-pill" id="commentbutton" type="text" name="comment" placeholder="Comment" onkeyup="openbutton()">
                        <input type="text" name="referenceid" value="<?php echo $row['id']; ?>" style="display:none">
                        <input type="text" name="commentauthor" value="<?php echo $name; ?>" style="display:none;">
                        <button class="btn btn-primary mt-2 mx-2 rounded-pill" id="button" type="submit" data-toggle="tooltip" data-placement="top" title="Click to submit" name="commentsubmit"><i class="bi bi-caret-right-fill"></i></button>
                    </form>
                </div> -->
                </p>
            </div>
        </div>
    </div>

    <?php include "./includes/footer-scripts.php";?>
    <?php include "./includes/footer.php";?>
</body>
</html>