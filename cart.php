<?php 
require_once('./config.php');
session_start();
if (empty($_SESSION["id"])) {
  header("Location: login.php");
}
$name = $_SESSION['username'];

$_SESSION['username'] = $name;

$uid = $_SESSION['id'];

// if(empty($_SESSION['cart'])){
//     $_SESSION['cart']=array();
//   }
//   array_push($_SESSION['cart'],$_GET['id']);



$cartitems = implode(',',array_unique($_SESSION['cart']));

$_SESSION['carts'] = $cartitems;


$books = trim($cartitems,',');

$bookprice = implode(',',array_unique($_SESSION['dbp']));




if(isset($_GET['checkout'])){
  header("location: checkout.php");
}
// $cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <?php include "./includes/header-scripts.php"; ?>
  <?php include "./includes/navbar.php"; ?>
</head>
<body>
    
<div class="container">
    <div class="row">
    <?php
    if(!empty($_SESSION['cart'])){
      $sql = "SELECT * FROM books WHERE id in ($books)";
      if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
          $i = 1;
          while ($row = mysqli_fetch_array($result)) {
      ?>
            <div class="col-sm-12 col-md-4 my-5">
              <div class="card" style="width: 20rem;">
                <img src="<?php echo $row['bookimagelocation'];?>" class="card-img-top" alt="Books">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row['booktitle'];?> </h5>
                  <p class="card-text">By <?php echo $row['bookauthor'];?></p>
                  <h4 class="text-success">&#8377; <?php echo $row['discountbookprice'];?></h4>
                  <p class="text-danger text-decoration-line-through">&#8377; <?php echo $row['bookprice'];?></p>
                  <div class="d-flex justify-content-evenly">
                    <form action="removecart.php?valid=200" method="get">
                  <input type="text" name="book" value="<?php echo $row['id'];?>" style="display:none" >
                  <input type="text" name="bookprice" value="<?php echo $row['discountbookprice'];?>" style="display:none">
                  <button type="submit"  class="btn btn-outline-danger" name="remove">Remove</button>
                    </form>  
                </div>
                </div>
              </div>
            </div>
      <?php $i++;
          }
          mysqli_free_result($result);
        } else {
          echo '<p class="my-5"><b>No Books</b> </p>';
        }
      }?> 

      <div class="d-flex justify-content-center">
       <form class="text-center mx-5" action="checkout.php?" method="get">
        <input type="text" name="valid" value="200" hidden>
        <button class="btn btn-success" type="submit" name="checkout">Checkout</button>
     
    </form>
       <form class="text-center" action="removecart.php" method="get">
       <input type="text" name="valid" value="200" hidden>
      <button class="btn btn-danger" href="removecart.php" type="sumit" name="clearcart" value="clear">Empty Cart</button>
    </form>
      </div>

    <?php 
    $_SESSION['totalprice'] = array_sum($_SESSION['dbp']);
    ?>
    
   <?php }else {
        echo "No Items in cart";
      } ?>
      
    </div>
</div>


   








<?php include "./includes/footer-scripts.php"; ?>
</body>
</html>