<?php
session_start();
include 'db.php';

if (!empty($_SESSION['room']) && !empty($_SESSION['name'])) {
    $room = $conn->real_escape_string($_SESSION['room']);
    $name = $conn->real_escape_string($_SESSION['name']);

    // logout system message → sabko dikhe
    $conn->query(
        "INSERT INTO messages(room_code,sender,message)
         VALUES('$room','System','$name logged out')"
    );

    // remove user from active list
    $conn->query(
        "DELETE FROM users WHERE room_code='$room' AND display_name='$name'"
    );

    // delete ALL messages of the room
    $conn->query(
        "DELETE FROM messages WHERE room_code='$room'"
    );
}

session_destroy();
?>
