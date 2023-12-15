<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>FARAHI | HOME</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="shortcut icon" type="image/png" href="imgs/logo.gif">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
	<h1>التصريح بعدم العمل</h1>
     
    <form action="process_chomage.php" method="post" enctype='multipart/form-data'>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label> الاسم الكامل </label>
        <input type="text" name="fullname" id="fullname" placeholder="المرجو ادخال الاسم الكامل"><br>
        
        <label>رقم البطاقة الوطنية</label>
        <input type="text" name="cin" id="cin" placeholder="المرجو ادخال رقم البطاقة الوطنية"><br>        

        <label>العنوان</label>
        <input type="text" name="address" id="address" placeholder="المرجو ادخال العنوان"><br>

        <label>مكان التحرير</label>
        <input type="text" name="ville" id="ville" placeholder="المرجو ادخال مكان التحرير"><br>

        <label>تاريخ التحرير</label>
        <input type="date" name="date" id="date" placeholder="المرجو ادخال تاريخ التحرير"><br>

        <label>الجنس</label>
        <select name="sexe">
            <option name="homme" value="homme">ذكر</option>
            <option name="femme" value="femme">أنثى</option>
        </select>

        <button type="submit">نسخ مباشرة</button>
        <button type="reset">حدف المعطيات</button>
     </form><br>
     <form method="post" action="export.php">
     <input style="background-color: #FF2222; color: white" type="submit" name="export" class="btn btn-success" value="تتحميل PDF" disabled/>
    </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>