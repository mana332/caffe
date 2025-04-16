<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item'])) {
    include 'dbconnection.php';

    $item = $conn->real_escape_string($_POST['item']);

    $sql = "INSERT INTO orders (item_name) VALUES ('$item')";

    if ($conn->query($sql) === TRUE) {
        echo "Item '$item' added";
    }

    $conn->close();
}
?>
