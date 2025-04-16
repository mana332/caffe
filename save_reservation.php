<?php
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['person_name'];
    $people = $_POST['number_of_people'];
    $day = $_POST['day'];

    if ($day === "Tuesday" && $people > 3) {
        echo "<script>alert('Only available for up to 3 persons on tuesday'); window.history.back();</script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO reservations (name, number_of_people, day) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $people, $day);

    if ($stmt->execute()) {
        echo "<script>alert('Reservation successful'); window.location.href = 'reservation.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
