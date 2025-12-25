<?php
session_start();
include 'db.php';

if (isset($_POST['name'], $_POST['room'])) {
    $_SESSION['name'] = trim($_POST['name']);
    $_SESSION['room'] = trim($_POST['room']);

    $name = $conn->real_escape_string($_SESSION['name']);
    $room = $conn->real_escape_string($_SESSION['room']);

    $conn->query("INSERT INTO users(display_name, room_code) VALUES('$name','$room')");
    $conn->query("INSERT INTO messages(room_code,sender,message) VALUES('$room','System','$name joined the room')");
}

if (empty($_SESSION['name']) || empty($_SESSION['room'])) {
    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chat Room</title>

<style>
.
  form#f{
 position:fixed;
 bottom:0;
 left:0;
 width:100%;
 display:flex;
 gap:8px;
 padding:8px;
 background:#111;
 align-items:center;
 z-index:100;
 box-sizing:border-box;
}


  .file-btn{
  display:flex;
  align-items:center;
  justify-content:center;
  width:48px;
  height:48px;
  background:#222;
  border-radius:50%;
  cursor:pointer;
  font-size:20px;
  transition:.2s;
}

.file-btn:hover{
  background:#00e676;
  color:#000;
}

.file-btn:active{
  transform:scale(0.95);
}

body{margin:0;background:#000;color:#fff;font-family:sans-serif}
.header{padding:10px;background:#111;display:flex;justify-content:space-between}
#chat{height:70vh;overflow-y:auto;padding:10px}
.msg{background:#222;padding:8px;margin:6px;border-radius:8px}
.system{color:#00e5ff;text-align:center;font-style:italic}

form{display:flex;gap:5px;padding:8px;background:#111}
input[type=text]{width:60%;padding:10px;border-radius:6px;border:none}
input[type=file]{width:15%}
button{width:25%;background:#00e676;border:none;border-radius:6px}
</style>
</head>

<body>

<div class="header">
  <div>Room : <?=htmlspecialchars($_SESSION['room'])?></div>
</div>

<div id="chat"></div>

<form id="f" enctype="multipart/form-data">
  <input id="msg" type="text" name="msg" placeholder="Type message">
 <label class="file-btn">
  📎
  <input type="file" name="file" accept="image/*,gif" hidden>
</label>  <button>Send</button>
</form>

<script>
let chat = document.getElementById('chat');

function loadChat(){
 fetch('fetch.php')
 .then(r=>r.text())
 .then(d=>{
   if(d.trim()==='__REDIRECT__'){
     location.href='index.php';
   }else{
     let atBottom =
       chat.scrollTop + chat.clientHeight >= chat.scrollHeight - 50;

     chat.innerHTML = d;

     if(atBottom){
       chat.scrollTop = chat.scrollHeight;
     }
   }
 });
}

setInterval(loadChat,1000);

setTimeout(()=>{
 chat.scrollTop = chat.scrollHeight;
},500);

document.getElementById('f').onsubmit = e =>{
 e.preventDefault();
 let fd = new FormData(e.target);

 fetch('send.php',{method:'POST',body:fd})
 .then(()=> {
   e.target.reset();
   setTimeout(()=>chat.scrollTop = chat.scrollHeight,200);
 });
};

window.addEventListener('beforeunload',()=>{
 navigator.sendBeacon('exit.php');
});
</script>

</body>
</html>
