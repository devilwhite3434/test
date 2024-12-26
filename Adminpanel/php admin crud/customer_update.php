<?php

@include 'configure.php';

$id = $_GET['edit'];

if(isset($_POST['update_customer'])){

   $customer_name = $_POST['customer_name'];
   $customer_password = $_POST['customer_password'];
   $customer_address = $_POST['customer_address'];

   if(empty($customer_name) || empty($customer_password) || empty($customer_address)){
      $message[] = 'please fill out all fields';    
   }else{

      $update_data = "UPDATE customers SET name='$customer_name', password='$customer_password', address='$customer_address' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         header('location:customer_page.php');
      }else{
         $message[] = 'could not update the customer'; 
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">

<div class="admin-customer-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM customers WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post">
      <h3 class="title">Update the customer</h3>
      <input type="text" class="box" name="customer_name" value="<?php echo $row['name']; ?>" placeholder="Enter the customer name">
      <input type="password" class="box" name="customer_password" value="<?php echo $row['password']; ?>" placeholder="Enter the customer password">
      <input type="text" class="box" name="customer_address" value="<?php echo $row['address']; ?>" placeholder="Enter the customer address">
      <input type="submit" value="Update Customer" name="update_customer" class="btn">
      <a href="customer_page.php" class="btn">Go back!</a>
   </form>

   <?php } ?>

</div>

</div>

</body>
</html>
