<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include 'head.php';
?>
<title>Customer details</title>
</head>

<body>
<?php
include 'header.php';
?>
<div class="text">
   <h1>Customer details</h1>
</div>
<table>
   <tr>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>balance</th>
      <th>operation</th>
   </tr>
        
   <?php 
      $sql = "select * from customers";
      $result = mysqli_query($conn,$sql);
      while($rows=mysqli_fetch_assoc($result)) {
   ?>
   <tr>
      <td><?php echo $rows['id'];?></td>
      <td class="name"><?php echo $rows['name'];?></td>
      <td><?php echo $rows['email'];?></td>
      <td><i class="fas fa-rupee-sign"></i><?php echo $rows['balance'];?></td>
      <td><a id="view" href="customerprofile.php?rn=<?php echo $rows['id'];?>&fromname='<?php echo $rows['name'];?>'">View Profile</a></td> 
   </tr>
   <?php
      }
   ?>
</table>
<?php 
include 'script.php';
?>
</body>
</html>