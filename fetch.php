<?php
session_start();
include 'db.php';

if (empty($_SESSION['room'])) {
    echo "__REDIRECT__";
    exit;
}

$room = $conn->real_escape_string($_SESSION['room']);

$res = $conn->query(
    "SELECT * FROM messages 
     WHERE room_code='$room' 
     ORDER BY id ASC"
);

while ($m = $res->fetch_assoc()) {

    if ($m['sender'] === 'System') {
        echo "<div class='msg system'>{$m['message']}</div>";
        continue;
    }

    echo "<div class='msg'><b>{$m['sender']}:</b> {$m['message']}";
    if (!empty($m['file'])) {
        echo "<br><img src='{$m['file']}' width='160'>";
    }
    echo "</div>";
}
?>
