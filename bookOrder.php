<?php
$servername = "localhost";
$username = "anna";
$password = "password123";
$dbname = "OrderBooks";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$address = $_POST['address'];
$format = $_POST['format'];

$price = ["hardcover" => 20, "paperback" => 10, "ebook" => 5];

if (isset($price[$format])) {
    $total_price = $price[$format];
    
    $sql = "INSERT INTO Orders (customer_name, customer_address, book_format) VALUES ('$name', '$address', '$format')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Order successfully created.<br>";
        echo "Welcome $name<br>";
        echo "Your Address is: $address<br>";
        echo "You Ordered: $format Book<br>";
        echo "Total Price: $$total_price<br>";
    } else {
        echo "Error creating order: " . mysqli_error($conn);
    }
} else {
    echo "Invalid book format selected.";
}

mysqli_close($conn);
?>
