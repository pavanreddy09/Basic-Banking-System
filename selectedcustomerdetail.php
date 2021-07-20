<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include 'head.php';
?>
<title>Selected Customer</title>
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  appearance: none;
  margin: 0;
}
</style>
</head>

<body>
<?php
include 'header.php';
?>

<table>
       <tr>
           <th>id</th>
           <th>name</th>
           <th>email</th>
           <th>balance</th>      
        </tr>
        <?php
           $cid = $_GET['id'];
           $sql = "select * from customers where id=$cid";
           $res = mysqli_query($conn,$sql);
           while($row = mysqli_fetch_assoc($res)) {
        ?>
        <tr>
          <td><?php echo $row['id'];?></td>
          <td class="name"><?php echo $row['name'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><i class="fas fa-rupee-sign"></i><?php echo $row['balance'];?></td>
        </tr>
        <?php
           }
        ?>
    </table>
    <form action="" method="post" class="form">
    <label for="to">Select the customer</label>
    <select name="to" required>
       <option value="" selected disabled>choose customer</option>
      <?php
         $cid = $_GET['id'];
         $sql = "select * from customers where id!=$cid";
         $res = mysqli_query($conn,$sql);
         while($row = mysqli_fetch_assoc($res)) {
        ?>
       <option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?>-<?php echo $row['balance']?></option>
      <?php
         }
        ?>
    </select>
    <input type="number" name="amount" placeholder="enter amount" required>
    <button name="submit">Transfer</button>
    </form>

<?php

if(isset($_POST['submit'])) {
    $from = $_GET["id"];
    $to = $_POST["to"];
    $amount = $_POST["amount"];
    
    $sql = "select * from customers where id=$from";
    $res = mysqli_query($conn,$sql);
    $fromcustomer = mysqli_fetch_array($res);
    
    $sql = "select * from customers where id=$to";
    $res = mysqli_query($conn,$sql);
    $tocustomer = mysqli_fetch_array($res);
    
    if($amount < 0) {
   ?>
   <div class="result">
   <h1><?php echo "negative value can't  be Transfered";?></h1>
   </div>
   <?php
    } else if($amount == 0) {
    ?>
    <div class="result">
   <h1><?php echo "amount can't be zero fill something";?></h1>
   </div>
  <?php
    } else if($amount > $fromcustomer['balance']) {
    ?>
        <div class="result">
          <h1><?php echo "Oops! Amount is Larger than current balance";?></h1>
        </div>
    <?php
    } else {
         $updateamount = $fromcustomer['balance'] - $amount;
         $sql = "UPDATE customers set balance=$updateamount where id=$from";
         mysqli_query($conn,$sql);
        
         $updateamount = $tocustomer['balance'] + $amount;
         $sql = "UPDATE customers set balance=$updateamount where id=$to";
         mysqli_query($conn,$sql);
        
        $sender = $fromcustomer['name'];
        $receiver = $tocustomer['name'];
        $sql = "INSERT INTO `transaction` (`sno`, `fromcustomer`, `tocustomer`, `amount`, `datetime`) VALUES 
        (NULL, '$sender', '$receiver', '$amount', current_timestamp())";
        $res = mysqli_query($conn,$sql);
        if($res) {
       ?>
       <div class="result success">
          <h1><?php echo "Transfered Successfully!";?></h1>
        </div>
    <?php
        echo "<script>
              function change() {
                  window.location='transactionhistory.php';
              }
              setTimeout(change,700);
              </script>";
        }
        $updateamount= 0;
        $amount = 0;
    }
}
    
?>
<?php 
include 'script.php';
?>
</body>
</html>