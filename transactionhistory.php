<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include 'head.php';
?>
<title>Transaction history</title>
</head>

<body>
<?php
include 'header.php';
?>
<div class="text">
   <h1>Transfer History</h1>
</div>
<table>
    <tr>
        <th>s.no</th>
        <th>sender</th>
        <th>Receiver</th>
        <th>amount</th>   
        <th>date & time</th>   
    </tr>
    <?php
      $sql = "select * from transaction";
      $res = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($res)) {
    ?>
    <tr>
        <td><?php echo $row['sno'];?></td>
        <td class="name"><?php echo $row['fromcustomer'];?></td>
        <td class="name"><?php echo $row['tocustomer'];?></td>
        <td><i class="fas fa-rupee-sign"></i><?php echo $row['amount'];?></td>
        <td><?php echo $row['datetime'];?></td>
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