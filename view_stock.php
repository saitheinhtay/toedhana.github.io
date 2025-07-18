
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "111111";
    $dbname = "orders_db";
    
    // Create DB connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    <div class="container mt-5">

        <h1 class="mb-4">All Orders</h1>

        <!-- Chicken Orders -->
        <h3>Chicken Orders</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>CAR</th>
                    <th>CAR Price</th>
                    <th>หมู 9</th>
                    <th>หมู 9 Price</th>
                    <th>หมู PP</th>
                    <th>หมู PP Price</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $result = $conn->query("SELECT * FROM chicken_orders ORDER BY created_at DESC");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['item_name']}</td>
                        <td>{$row['car']}</td>
                        <td>{$row['car_price']}</td>
                        <td>{$row['moo9']}</td>
                        <td>{$row['moo9_price']}</td>
                        <td>{$row['moopp']}</td>
                        <td>{$row['moopp_price']}</td>
                        <td>{$row['created_at']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>No chicken orders found</td></tr>";
            }
            ?>
            </tbody>
        </table>

        <!-- Pork Orders -->
        <h3 class="mt-5">Pork Orders</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Shop</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $result = $conn->query("SELECT * FROM pork_orders ORDER BY created_at DESC");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['shop']}</td>
                        <td>{$row['qty']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['created_at']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No pork orders found</td></tr>";
            }
            ?>
            </tbody>
        </table>

    </div>
</body>
<?php
$conn->close();
?>
</html>
