<?php 
require_once("./config.php");

$sql = "SELECT * FROM posts";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
      $i=1;  while($row = mysqli_fetch_array($result))
        {
            $id = $row['id'];
           $posttite=$row['poststite'];
           $postcontent=$row['postcontent'];
           $postdate=$row['postdate'];
           $author=$row['author'];
        }
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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    

<?php 
$sql = "SELECT * FROM posts";
if($result = mysqli_query($link, $sql))
{
    if(mysqli_num_rows($result) > 0)
    {
      $i=1;  while($row = mysqli_fetch_array($result))
        { ?>
                    <article class="blogPost">
                        <time datetime="2011-01-12" class="timeStamp font-lato text-center text-uppercase">
                            <strong class="date fw-normal element-block"><?php echo $row['postdate'] ?></strong>
                        </time>
                        <!-- <div class="aligncenter">
                            <img src="" alt="image description">
                        </div> -->
                        <h1><?php echo $row['postcontent'] ?></h1>
                        <!-- postActionsInfo -->
                        <ul class="list-unstyled postActionsInfo text-uppercase">
                            <li><a href="#"><i class="far fa-user icn"></i><?php echo $row['author'] ?></a></li>
                        </ul>
                        <p><?php echo substr($row['post'],0,300) ?></p>
                        <a href="blog-single.php?id=<?php echo $row["id"] ?>" class="btn btn-default text-uppercase">Read More</a>
                    </article>
                    <?php $i++; }
         mysqli_free_result($result);
    }
    else
    {
         echo "F";
    }
}
else
{
    echo "F";
}


?>
</body>
</html>