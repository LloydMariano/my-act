<?php
// Include database connection file
require_once "connection.php";
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE products set  prod_name='" . $_POST['prod_name'] . "', price='" . $_POST['price'] . "' ,prod_qty='" . $_POST['prod_qty'] . "' WHERE id='" . $_POST['id'] . "'");
header("location: product.php");
exit();
}
$result = mysqli_query($conn,"SELECT * FROM products WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Record</title>
<?php include "head.php"; ?>
<style>
            .container{
                margin-left: 15%;
                width: auto;
            }
        </style>
</head>
<?php include_once 'nav.php' ?>
<body>
   <div class="container">
   <div class="row">
   <div class="col-lg-12">
   <div class="page-header">
   <h2>Update Record</h2>
   </div>
      <p>Please edit the input values and submit to update the record.</p>
         <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
            <div class="form-group">
            <label>Product name</label>
            <input type="text" name="prod_name" class="form-control" value="<?php echo $row["prod_name"]; ?>" maxlength="50" required="">
            </div>
            <div class="form-group ">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="<?php echo $row["price"]; ?>" maxlength="30" required="">
            </div>
            <div class="form-group">
            <label>Product Quantity</label>
            <input type="text" name="prod_qty" class="form-control" value="<?php echo $row["prod_qty"]; ?>" maxlength="12"required="">
            </div>
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="product.php" class="btn btn-default">Cancel</a>
         </form>
</div>
</div>  
</div>
</body>
</html>