<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
   <title>Login Peserta Training</title>
<link rel="icon" type="image/png" href="../web/pav.png"> 
  
  
      <link rel="stylesheet" href="style.css">

  
</head>

<body>
  <div class="main-wrap">
        <div class="login-main">
		 <form action="cekLogin.php" method="post">
            <input type="email" required name="email" placeholder="user name" class="box1 border1">
            <input type="password" required name="password" placeholder="password" class="box1 border2">
            <input type="submit" class="send" value="Go">
			<p>Login dengan email dan tanggal lahir anda</p>
            <!--p>Forgot Your Password? <a href="#">click here</a></p-->  
		</form>
        </div>
        
    </div>
  
  
</body>
</html>
