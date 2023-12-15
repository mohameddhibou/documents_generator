<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="ar">
<head>
	<title>CATEGORIE</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<meta name="viewport" content="width=device-width, initial-scale=0.7">
</head>
<body>
	<h1>المرجو اختيار نوع الوثيقة</h1>
  <div class="grid-container">
  <div class="grid-item"><a class="enabled" href="home.php">التصريح<br>بعدم العمل</a></div>
  <div class="grid-item"><a class="enabled" href="home1.php">الاشهاد<br>بعدم العمل</a></div>
  <div class="grid-item"><a class="enabled" href="home2.php">التزام الأم <br>أو الأب بالأبناء</a></div>
  <div class="grid-item"><a class="enabled" href="home3.php">التزام السكن <br>(الاشهاد)</a></div>
  <div class="grid-item"><a class="disabled" href="#">الوثيقة في <br>طور الانجاز</a></div>
  <div class="grid-item"><a class="disabled" href="#">الوثيقة في <br>طور الانجاز</a></div>
  <div class="grid-item"><a class="disabled" href="#">الوثيقة في <br>طور الانجاز</a></div>
  <div class="grid-item"><a class="disabled" href="#">الوثيقة في <br>طور الانجاز</a></div>
  <div class="grid-item"><a class="disabled" href="#">الوثيقة في <br>طور الانجاز</a></div>
  <style>
    .disabled{
  cursor: not-allowed;
}

.grid-item {
  background-color: #CBDBCD;
}

  </style>
</div>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>