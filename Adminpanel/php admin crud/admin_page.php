<?php

@include 'config.php';

if (isset($_POST['add_product'])) {

    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;

    if (empty($product_name) || empty($product_price) || empty($product_category) || empty($product_description) || empty($product_image)) {
        $message[] = 'Please fill out all fields';
    } else {
        $insert = $conn->prepare("INSERT INTO products (name, price, category, description, image) VALUES (?, ?, ?, ?, ?)");
        $insert->bind_param("sisss", $product_name, $product_price, $product_category, $product_description, $product_image);
        if ($insert->execute()) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully';
        } else {
            $message[] = 'Could not add the product';
        }
        $insert->close();
    }

}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $delete = $conn->prepare("DELETE FROM products WHERE id = ?");
    $delete->bind_param("i", $id);
    $delete->execute();
    $delete->close();
    header('location:admin_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php

    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<span class="message">' . htmlspecialchars($msg) . '</span>';
        }
    }

    ?>

    <div class="container">

        <div class="admin-product-form-container">

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                <h3>Add a new product</h3>
                <input type="text" placeholder="Enter product name" name="product_name" class="box" required>
                <input type="number" placeholder="Enter product price" name="product_price" class="box" required>
                <input type="text" placeholder="Enter product category" name="product_category" class="box" required>
                <input type="text" placeholder="Enter product description" name="product_description" class="box" required>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box" required>
                <input type="submit" class="btn" name="add_product" value="Add Product">
            </form>

        </div>

        <?php

        $select = mysqli_query($conn, "SELECT * FROM products");

        ?>
        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Category</th>
                        <th>Product Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                    <tr>
                        <td><img src="uploaded_img/<?php echo htmlspecialchars($row['image']); ?>" height="100" alt=""></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td>₹<?php echo htmlspecialchars($row['price']); ?>/-</td>
                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td>
                            <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
                            <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>

</body>

</html>
