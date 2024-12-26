<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samangri Nepal - Laptops</title>
    <link rel="stylesheet" href="./CSS/mobile.css">
    <script defer src="Laptops.js"></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header">Samangri Nepal</div>
            <ul class="sidebar-menu">
                <li class="sidebar-item"><a href="UserHomePage.php">Home</a></li>
                <li class="sidebar-item"><a href="#">Cart</a></li>
                <li class="sidebar-item"><a href="#">Profile</a></li>
                <li class="sidebar-item"><a href="ContactUS.html">Contact us</a></li>
                <li class="sidebar-item"><a href="#">Setting</a></li>
            </ul>
            <div class="sidebar-footer"><a href="AboutUS.html">About us</a></div>
        </div>
        
        <div class="content">
            <div class="header-icons">
                <span class="icon">🔔</span>
                <span class="icon">👤</span>
            </div>

            <!-- Search Bar -->
            <div class="search">
                <input type="text" id="search" placeholder="Search laptops...">
                <ul id="search-results"></ul>
            </div>

            <div class="filters">
                <h2>Laptops</h2>
                <div class="filter-price">
                    <h3>Filter by price</h3>
                    <label><input type="radio" name="price" value="below-50000"> Below RS:50000</label>
                    <label><input type="radio" name="price" value="50000-80000"> RS:50000-RS:80000</label>
                    <label><input type="radio" name="price" value="80000-150000"> RS:80000-RS:150000</label>
                    <label><input type="radio" name="price" value="150000-200000"> RS:150000-RS:200000</label>
                    <label><input type="radio" name="price" value="200000-above"> RS:200000-Above</label>
                </div>
                <div class="sort-by">
                    <label for="sort">Sort By:</label>
                    <select id="sort">
                        <option value="best-match">Best Match</option>
                        <option value="top-sales">Top Sales</option>
                    </select>
                </div>
            </div>

            <div class="product-list">
                <?php
                $conn = new mysqli("localhost", "root", "", "cart_db");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT name, price, description, image FROM products WHERE category = 'Laptops'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="../php admin crud/uploaded_img/' . $row["image"] . '" alt="' . $row["name"] . '">';
                        echo '<p>' . $row["name"] . '<br>Rs: ' . $row["price"] . '<br> '. $row["description"] . '</p>';
                        echo '<button class="add-to-cart">Add to Cart</button>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
