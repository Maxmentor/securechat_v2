<?php
session_start();
include 'db.php';

if (empty($_SESSION['room']) || empty($_SESSION['name'])) exit;

$room = $conn->real_escape_string($_SESSION['room']);
$name = $conn->real_escape_string($_SESSION['name']);

$msg = isset($_POST['msg']) ? trim($_POST['msg']) : '';
$msg = $conn->real_escape_string($msg);

$file="";
if (!empty($_FILES['file']['name'])) {
    $file="uploads/".time().basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'],$file);
}

if ($msg!=="" || $file!=="") {
    $conn->query(
      "INSERT INTO messages(room_code,sender,message,file)
       VALUES('$room','$name','$msg','$file')"
    );
}
?>
