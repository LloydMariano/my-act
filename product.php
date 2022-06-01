<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Products</title>
        
        <?php include "head.php"; ?>
        <script type="text/javascript">
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        });
        </script>
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
          <div class="col-lg-12 mx-auto">
            <div class="page-header clearfix">
            <h2 class="pull-left">Product List</h2>
        <a href="create_a.php" class="btn btn-success pull-right">Add New Product</a>
    </div>
<?php
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM products");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
          <table class='table table-bordered table-striped'>
          <tr>
          <td>Product Name</td>
          <td>Product Price</td>
          <td>Product Quantity</td>
          <td>Action</td>
          </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
          <tr>
          <td><?php echo $row["prod_name"]; ?></td>
          <td><?php echo $row["price"]; ?></td>
          <td><?php echo ($row["prod_qty"])?($row["prod_qty"]):('N/A'); ?></td>
          <td><a href="update_a.php?id=<?php echo $row["id"]; ?>" title='Update Record'><span class='glyphicon glyphicon-pencil'></span></a>
          <a href="delete_a.php?id=<?php echo $row["id"]; ?>" title='Delete Record'><i class='material-icons'><span class='glyphicon glyphicon-trash'></span></a>
          </td>
          </tr>
<?php
$i++;
}
?>
        </table>
<?php
}
else{
echo "No result found";
}
?>
          </div>
          </div>     
          </div>
</body>
</html>