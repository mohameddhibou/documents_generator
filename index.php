<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>FARAHI GSM</title>
    <link rel="shortcut icon" type="image/png" href="imgs/logo.gif">
	<link rel="stylesheet" type="text/css" href="style.css">
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
     <form action="login.php" method="post">
        <div class="logo">
     	<!--<h2>تسجيل الدخول</h2>-->
        <img src="imgs/logo.png"><br>
        </div>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>اسم المستعمل</label>
     	<input type="text" name="uname" placeholder="ادخل اسم المستعمل"><br>

     	<label>الرمز السري</label>
     	<input type="password" name="password" placeholder="ادخل الرمز السري"><br>

     	<button type="submit">الدخول</button>

        <!--<a href="table.php" style="background-color: red">زر خاص</a>-->
     </form>
</body>
</html>