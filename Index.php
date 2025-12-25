<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Secure Chat</title>
<style>
body{margin:0;font-family:sans-serif;background:#111;color:#fff}
.box{height:100vh;display:flex;align-items:center;justify-content:center}
.card{background:#222;padding:20px;border-radius:12px;width:90%;max-width:350px}
input,button{width:100%;padding:12px;margin:6px 0;border-radius:6px;border:none}
button{background:#00c853;color:#000;font-weight:bold}
input{
  width:93%;
}

@media (max-width: 600px) {
.box form{
  padding: 1rem;
   background-color: #262626;
    border-radius: 1rem;
  box-shadow: rgba(26, 25, 25, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

}

.box {margin:.7rem;
  margin-top:-2rem;
 
 }
}
</style>
</head>
<body>
<div class="box">
<form method="post" action="chat.php">
  <hr>
  <div class="div2" style="text-align:center;font:verana">
  <h2>+ SECURE CHAT +</h2><hr>

</div>
  <input name="name" required autocomplete="off" placeholder="Display Name">
  <input name="room" required autocomplete="off" placeholder="Room Code" type="password">

  <button type="submit">ENTER ROOM</button>

  <div class="div2" style="text-align:center;">
  <h4>By <a style="color:white;" href="https://t.me/maxmentor" >MaxMentor</a></h4>

</div>
<hr>
</form>
<br>

</div>

</body>
</html>