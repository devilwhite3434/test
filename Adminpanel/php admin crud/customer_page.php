<?php

@include 'configure.php';

if(isset($_POST['add_customer'])){

   $customer_name = $_POST['customer_name'];
   $customer_password = $_POST['customer_password'];
   $customer_address = $_POST['customer_address'];

   if(empty($customer_name) || empty($customer_password) || empty($customer_address)){
      $message[] = 'please fill out all fields';
   }else{
      $insert = "INSERT INTO customers(name, password, address) VALUES('$customer_name', '$customer_password', '$customer_address')";
      $upload = mysqli_query($conn, $insert);
      if($upload){
         $message[] = 'new customer added successfully';
      }else{
         $message[] = 'could not add the customer';
      }
   }
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM customers WHERE id = $id");
   header('location:customer_page.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Customer Management</title>

   <!-- custom css file link  -->
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

   <div class="admin-customer-form-container">

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <h3>Add a new customer</h3>
         <input type="text" placeholder="Enter customer name" name="customer_name" class="box">
         <input type="password" placeholder="Enter customer password" name="customer_password" class="box">
         <input type="text" placeholder="Enter customer address" name="customer_address" class="box">
         <input type="submit" class="btn" name="add_customer" value="Add Customer">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM customers");
   
   ?>
   <div class="customer-display">
      <table class="customer-display-table">
         <thead>
         <tr>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
               <a href="customer_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
               <a href="customer_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

</body>
</html>
