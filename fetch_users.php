<?php
session_start();
include 'db.php';

if (!isset($_SESSION['room'])) exit;

$room = $conn->real_escape_string($_SESSION['room']);

$res = $conn->query(
    "SELECT display_name FROM users WHERE room_code='$room' ORDER BY id DESC"
);

if ($res->num_rows === 0) {
    echo "<div class='user-item'>No Active User</div>";
    exit;
}

while ($row = $res->fetch_assoc()) {
    echo "<div class='user-item'>".$row['display_name']."</div>";
}
?>
