<?php
include 'connection.php';
?>

<html>
<head>
<?php 
include 'head.php';
?>
<title>Customer Profile</title>
<style>
.hero {
  height: 100vh;
  width:100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  color:#0400ff60;
}
.profile {
    text-align:center;
    line-height:3rem;
}
.table {
    width:60%;
    margin-top:3rem;
    text-align:center;
}
table {
    width:100%;
}
</style>
</head>

<body>
<?php
include 'header.php';
?>
<div class="hero">
<div class="proflie_img">
  <img src="imgs/profile.jpg">
</div>
<div class="profile">
<?php 
    $cid = $_GET['rn'];
    $sql = "select * from customers where id=$cid";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)) {
?>
    <h1 class="name">Name: <?php echo $row['name'];?></h1>
    <h1>Email: <?php echo $row['email'];?></h1>
    <h1>Current Balnce: <i class="fas fa-rupee-sign" style="font-size:2rem;"></i><?php echo $row['balance'];?></h1>
<?php
}
?>
</div>

<div class="table">
<h1 class="name">All Transactions of <?php echo $_GET['fromname'];?></h1>
<table>
    <tr>
        <th>Receiver</th>
        <th>amount</th>   
        <th>date & time</th>   
    </tr>
    <?php
      $fromname = $_GET['fromname'];
      $sql = "select * from transaction where fromcustomer=$fromname";
      $res = mysqli_query($conn,$sql);
      while($rows=mysqli_fetch_assoc($res)) {
    ?>
    <tr>
        <td class="name"><?php echo $rows['tocustomer'];?></td>
        <td><i class="fas fa-rupee-sign"></i><?php echo $rows['amount'];?></td>
        <td><?php echo $rows['datetime'];?></td>
    </tr>
    <?php
      }
    ?>
</table>
</div>
</div>
<?php 
include 'script.php';
?>
</body>
</html>