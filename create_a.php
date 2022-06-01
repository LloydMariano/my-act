<?php
require_once "connection.php";
if(isset($_POST['save']))
{    
$prod_name = $_POST['prod_name'];
$price = $_POST['price'];
$prod_qty = $_POST['prod_qty'];
$sql = "INSERT INTO products (prod_name,price,prod_qty)
VALUES ('$prod_name','$price','$prod_qty')";
if (mysqli_query($conn, $sql)) {
header("location: product.php");
exit();
} else {
echo "Error: " . $sql . "
" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <title>Create Record</title>
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
        <h2>Create Record</h2>
        </div>
            <p>Please fill this form and submit to add product record to the database.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Product name</label>
                        <input type="text" name="prod_name" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <div class="form-group ">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="" maxlength="30" required="">
                        </div>
                        <div class="form-group">
                        <label>Product quantity</label>
                        <input type="text" name="prod_qty" class="form-control" value="" maxlength="12" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="product.php" class="btn btn-default">Cancel</a>
            </form>
            </div>
            </div> 
            </div>
</body>
</html>