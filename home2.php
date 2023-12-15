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
	<h1>إلتزام بتحمل المسؤولية (الأبناء)</h1>
     
    <form action="process_pec.php" method="post" enctype='multipart/form-data'>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    <fieldset>
        <legend style="font-size: 20px bold;font-weight: 600;">معلومات عن  الوالي</legend>
        <label>من الملتزم؟</label>
        <select name="sexe">
            <option name="femme" value="femme">الأم</option>
            <option name="homme" value="homme">الأب</option>
        </select>
        <br>

        <label> الاسم الكامل </label>
        <input type="text" name="fullname" id="fullname" placeholder="المرجو ادخال الاسم الكامل"><br>

        <label>تاريخ الازدياد</label>
        <input type="date" name="date_n" id="date_n" placeholder="المرجو  ادخال تاريخ الازدياد"><br>
        
        <label>رقم البطاقة الوطنية</label>
        <input type="text" name="cin" id="cin" placeholder="المرجو ادخال رقم البطاقة الوطنية"><br>        

        <label>العنوان</label>
        <input type="text" name="address" id="address" placeholder="المرجو ادخال العنوان"><br>

    </fieldset><br>

    <fieldset>
        <legend style="font-size: 20px bold;font-weight: 600;">معلومات عن  الأبناء</legend>
        <fieldset>
            <legend style="color:green;font-size: 20px bold;font-weight: 600;">الابن(ة) الأول(ى)</legend>
            <label> الاسم الكامل </label>
        <input type="text" name="fullname1" id="fullname1" placeholder="المرجو ادخال الاسم الكامل">

        <label>تاريخ الازدياد</label>
        <input type="date" name="date_n1" id="date_n1" placeholder="المرجو  ادخال تاريخ الازدياد">

        <label>الجنس</label>
        <select name="sexe1">
            <option name="homme" value="homme">ذكر</option>
            <option name="femme" value="femme">أنثى</option>
        </select>
        </fieldset><br>

        <fieldset>
            <legend style="color:green;font-size: 20px bold;font-weight: 600;">الابن(ة) الثاني(ة)</legend>
            <label> الاسم الكامل </label>
        <input type="text" name="fullname2" id="fullname2" placeholder="المرجو ادخال الاسم الكامل">

        <label>تاريخ الازدياد</label>
        <input type="date" name="date_n2" id="date_n2" placeholder="المرجو  ادخال تاريخ الازدياد">

        <label>الجنس</label>
        <select name="sexe2">
            <option name="homme" value="homme">ذكر</option>
            <option name="femme" value="femme">أنثى</option>
        </select>
        </fieldset><br>

        <fieldset>
            <legend style="color:green;font-size: 20px bold;font-weight: 600;">الابن(ة) الثالث(ة)</legend>
            <label> الاسم الكامل </label>
        <input type="text" name="fullname3" id="fullname3" placeholder="المرجو ادخال الاسم الكامل">

        <label>تاريخ الازدياد</label>
        <input type="date" name="date_n3" id="date_n3" placeholder="المرجو  ادخال تاريخ الازدياد">

        <label>الجنس</label>
        <select name="sexe3">
            <option name="homme" value="homme">ذكر</option>
            <option name="femme" value="femme">أنثى</option>
        </select>
        </fieldset>
    </fieldset><br>

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