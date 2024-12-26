<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samangri Nepal</title>
    <link rel="stylesheet" href="CSS/UserHomePage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM9sTJMS+0S3iU7hJ2b8pbgaHb5M56Truql00y8" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="logo">
            <img src="Images/SamangriNepal.png" alt="Samangri Nepal Logo">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <button>Search</button>
            
        </div>
    </header>

    <main>
        <section class="top-section">
            <div class="highlights">
                <div class="highlight-item">
                   <a href="#"><img src="Images/Realme-Narzo-70-Pro-5G-Price-in-Nepal.jpg" alt="Realme Narzo 70 Pro"></a>
                   <a href="#"><p>Realme Narzo 70 Pro launching soon in Nepal with Sony IMX890 camera</p> </a> 
                </div>
                <div class="highlight-item">
                    <a href="#"><img src="Images/Moto-Edge-50-Fusion-Review.jpg" alt="Moto Edge 50 Fusion"></a>
                    <a href="#"><p>Moto Edge 50 Fusion review: Elegant, but what else?</p></a>
                </div>
                <div class="highlight-item">
                    <a href="#"><img src="Images/iPad-Pro-M4-Review.jpg" alt="iPad Pro M4"></a>
                    <a href="#"><p>iPad Pro M4 review: A super powerful beast tamed by iPadOS limitations</p></a>
                </div>
            </div>
        </section>

        <section class="categories">
            <h2>Categories:</h2>
            <div class="category-icons">
                <div class="category">
                    <a href="Mobiles.php">
                        <img src="Images/phone.png" alt="Mobiles">
                        <h2>Mobiles</h2>
                    </a>
                </div>
                <div class="category">
                    <a href="Laptops.php">
                        <img src="Images/laptop.png" alt="Laptops">
                        <h2>Laptops</h2>
                    </a>
                </div>
                <div class="category">
                    <a href="Watch.php">
                        <img src="Images/smartwatch.png" alt="Watch">
                        <h2>Watch</h2>
                    </a>
                </div>
                <div class="category">
                    <a href="PCBuild.php">
                        <img src="Images/computer.png" alt="PC Build">
                        <h2>PC Build</h2>
                    </a>
                </div>
                <div class="category">
                    <a href="Earbuds.php">
                        <img src="Images/earphone.png" alt="Earbuds">
                        <h2>Earbuds</h2>
                    </a>
                </div>
            </div>
        </section>

        <section class="products">
            
            <?php
            $conn = new mysqli("localhost", "root", '', "cart_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, price, image FROM products WHERE category = 'Mobiles'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="../php admin crud/uploaded_img/' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<p>' . $row["name"] . '<br>Rs: ' . $row["price"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '<button class="add-to-cart-btn">BUY</button>';
                    echo '</div>';
                }
            } 
            $conn->close();
            ?>
        </section>

        <section class="products">
            
            <?php
            $conn = new mysqli("localhost", "root", "", "cart_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, price, image FROM products WHERE category = 'Laptops'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="../php admin crud/uploaded_img/' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<p>' . $row["name"] . '<br>Rs: ' . $row["price"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '<button class="add-to-cart-btn">BUY</button>';
                    echo '</div>';
                }
            } 

            $conn->close();
            ?>
        </section>

        <section class="products">
            
            <?php
            $conn = new mysqli("localhost", "root", "", "cart_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, price, image FROM products WHERE category = 'Watches'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="../php admin crud/uploaded_img/' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<p>' . $row["name"] . '<br>Rs: ' . $row["price"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '<button class="add-to-cart-btn">BUY</button>';
                    echo '</div>';
                }
            } 

            $conn->close();
            ?>
        </section>

        <section class="products">
         
            <?php
            $conn = new mysqli("localhost", "root", "", "cart_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, price, image FROM products WHERE category = 'Earbuds'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="../php admin crud/uploaded_img/' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<p>' . $row["name"] . '<br>Rs: ' . $row["price"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '<button class="add-to-cart-btn">BUY</button>';
                    echo '</div>';
                }
            } 

            $conn->close();
            ?>
        </section>

        <section class="products">
           
            <?php
            $conn = new mysqli("localhost", "root", "", "cart_db");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, price, image FROM products WHERE category = 'PC Build'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="../php admin crud/uploaded_img/"' . $row["image"] . '" alt="' . $row["name"] . '">';
                    echo '<p>' . $row["name"] . '<br>Rs: ' . $row["price"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '<button class="add-to-cart-btn">BUY</button>';
                    echo '</div>';
                }
            } 

            $conn->close();
            ?>
        </section>
    </main>

    <footer>
        <div class="footer-links">
            <a class="btn" href="AboutUS.html">About Samangri Nepal</a>
            <a class="btn" href="PrivacyPolicy.html">Privacy Policy</a>
            <a class="btn" href="ContactUS.html">Contact</a>
        </div>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cartButtons = document.querySelectorAll(".add-to-cart-btn");

            cartButtons.forEach(button => {
                button.addEventListener("click", (e) => {
                    const action = e.target.textContent.trim();
                    const product = e.target.closest(".product");
                    const productName = product.querySelector("p").textContent.split("Rs")[0].trim();

                    if (action === "Add to Cart") {
                        alert(`${productName} has been added to your cart!`);
                    } else if (action === "BUY") {
                        alert(`Proceeding to buy ${productName}`);
                    }
                });
            });
        });
    </script>
</body>
</html>
