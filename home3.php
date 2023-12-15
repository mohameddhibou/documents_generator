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
	<h1>إلتزام السكن (الاشهاد)</h1>
     
    <form action="process_log.php" method="post" enctype='multipart/form-data'>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    <fieldset>
        <legend style="font-size: 20px bold;font-weight: 600;">معلومات عن صاحب المحل السكني</legend>
        <label>الجنس</label>
        <select name="sexe">
            <option name="homme" value="homme">ذكر</option>
            <option name="femme" value="femme">أنثى</option>
        </select>
        <br>

        <label> الاسم الكامل </label>
        <input type="text" name="fullname" id="fullname" placeholder="المرجو ادخال الاسم الكامل"><br>
        
        <label>رقم البطاقة الوطنية</label>
        <input type="text" name="cin" id="cin" placeholder="المرجو ادخال رقم البطاقة الوطنية"><br>        

        <label>العنوان</label>
        <input type="text" name="address" id="address" placeholder="المرجو ادخال العنوان"><br>

        <label>علاقته بالساكن</label><br>
        <input type="text" name="relation" id="relation" placeholder="المرجو ادخال العلاقة" style="width:75%;margin-right: 0;display: inline-block;"><p style="font-weight: bold;display: inline-block;margin-right: 40px">مكتري</p><input type="checkbox" value="مكتري" name="louer" id="louer" style="width:3%;margin-right: 0;display: inline-block;"><br><br>

    </fieldset><br>

    <fieldset>
        <legend style="font-size: 20px bold;font-weight: 600;">معلومات عن الساكن</legend>
        <label>الجنس</label>
        <select name="sexe1">
            <option name="homme" value="homme">ذكر</option>
            <option name="femme" value="femme">أنثى</option>
        </select>
        <br>

        <label> الاسم الكامل </label>
        <input type="text" name="fullname1" id="fullname1" placeholder="المرجو ادخال الاسم الكامل"><br>

        <label>سبب الالتزام</label><br>
        <p style="font-weight: bold;display: inline-block;margin-right: 40px">للحصول على بطاقة التعريف الوطنية</p><input type="radio" value="للحصول على بطاقة التعريف الوطنيةs" name="other" id="forcin" style="width:3%;margin-right: 0;display: inline-block;">

        <p style="font-weight: bold;display: inline-block;margin-right: 40px">أشياء أخرى</p><input type="radio" value="عند الاقتضاء والحاجة" name="other" id="other" style="width:3%;margin-right: 0;display: inline-block;"><br>

    </fieldset><br>    

    <label>مكان التحرير</label>
        <input type="text" name="ville" id="ville" placeholder="المرجو ادخال مكان التحرير">

    <label>تاريخ التحرير</label>
        <input type="date" name="date" id="date"><br>

        <button type="submit">نسخ مباشرة</button>
        <button type="reset">حدف المعطيات</button>
     </form><br>
     <form method="post" action="export.php">
     <input style="background-color: #FF2222; color: white" type="submit" name="export" class="btn btn-success" value="تتحميل PDF" />
    </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>