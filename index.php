<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employees</title>
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
            <h2 class="pull-left">Users List</h2>
        <a href="create.php" class="btn btn-success pull-right">Add New User</a>
    </div>
<?php
include_once 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM users");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
          <table class='table table-bordered table-striped'>
          <tr>
          <td>Name</td>
          <td>Email id</td>
          <td>Mobile</td>
          <td>Action</td>
          </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
          <tr>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo ($row["mobile"])?($row["mobile"]):('N/A'); ?></td>
          <td><a href="update.php?id=<?php echo $row["id"]; ?>" title='Update Record'><span class='glyphicon glyphicon-pencil'></span></a>
          <a href="delete.php?id=<?php echo $row["id"]; ?>" title='Delete Record'><i class='material-icons'><span class='glyphicon glyphicon-trash'></span></a>
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