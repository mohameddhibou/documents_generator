<?php
	$fullname = $_POST['fullname'];
	$cin = $_POST['cin'];
	$address = $_POST['address'];
	$sexe = $_POST['sexe'];
	$relation = $_POST['relation'];
	$fullname2 = $_POST['fullname2'];
	$cin2 = $_POST['cin2'];
	$address2 = $_POST['address2'];
	$duration = $_POST['duration'];
	$sexe2 = $_POST['sexe2'];
	$date = $_POST['date'];

// Database connection
	$conn =new mysqli('localhost','id16202654_farahii','Mohamed@00740902','id16202654_farahistore');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else if (empty($fullname)) {
		header("Location: home1.php?error=المرجو ادخال الاسم الكامل");
	    exit();
	}else if (empty($cin)) {
		header("Location: home1.php?error=المرجو ادخال  رقم البطاقة الوطنية");
	    exit();
	}else if (empty($address)) {
		header("Location: home1.php?error=المرجو ادخال  العنوان");
	    exit();
	}else if (empty($sexe)) {
		header("Location: home1.php?error=المرجو ادخال  الجنس");
	    exit();
	}else if (empty($address)) {
		header("Location: home1.php?error=المرجو ادخال  العنوان");
	    exit();
	}else if (empty($relation)) {
		header("Location: home1.php?error=المرجو ادخال  العلاقة");
	    exit();
	}else if (empty($fullname2)) {
		header("Location: home1.php?error=المرجو ادخال  الاسم الكامل");
	    exit();
	}else if (empty($cin2)) {
		header("Location: home1.php?error=المرجو ادخال  رقم البطاقة الوطنية");
	    exit();
	}else if (empty($address2)) {
		header("Location: home1.php?error=المرجو ادخال  العنوان");
	    exit();
	}else if (empty($date)) {
		header("Location: home1.php?error=المرجو ادخال  تاريخ التحرير");
	    exit();
	}

	/* WHEN DURATION IS EMPTY */
	else if ($sexe == "homme" && $sexe2 == "homme" && empty($duration)) {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقع أسفله: </u></p><br>
      <p>السيد  <b>'.$fullname.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكن ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيد <b>'.$fullname2.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكن ب '.$address2.'، لا يستفيد من الصندوق الوطني للضمان الاجتماعي <b>'.$duration.'</b> ، متوقف عن العمل (عاطل)، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}else if ($sexe == "homme" && $sexe2 == "femme" && empty($duration)) {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقع أسفله: </u></p><br>
      <p>السيد  <b>'.$fullname.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكن ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيدة <b>'.$fullname2.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكنة ب '.$address2.'، لا تستفيد من الصندوق الوطني للضمان الاجتماعي '.$duration.' ، متوقفة عن العمل (عاطلة) وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}else if ($sexe == "femme" && $sexe2 == "homme" && empty($duration)) {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقعة أسفله: </u></p><br>
      <p>السيدة  <b>'.$fullname.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكنة ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيد <b>'.$fullname2.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكن ب '.$address2.'، لا يستفيد من الصندوق الوطني للضمان الاجتماعي <b>'.$duration.'</b> ، متوقف عن العمل (عاطل)، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>

      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}else if ($sexe == "femme" && $sexe2 == "femme" && empty($duration)) {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقعة أسفله: </u></p><br>
      <p>السيدة  <b>'.$fullname.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكنة ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيدة <b>'.$fullname2.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكنة ب '.$address2.'، لا تستفيد من الصندوق الوطني للضمان الاجتماعي  <b>'.$duration.'</b> ، متوقفة عن العمل (عاطلة)، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}


	else if ($sexe == "homme" && $sexe2 == "homme") {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقع أسفله: </u></p><br>
      <p>السيد  <b>'.$fullname.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكن ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيد <b>'.$fullname2.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكن ب '.$address2.'، لا يستفيد من الصندوق الوطني للضمان الاجتماعي ما يزيد عن  <b>'.$duration.'</b> لحد الآن، متوقف عن العمل (عاطل)، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}else if ($sexe == "homme" && $sexe2 == "femme") {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقع أسفله: </u></p><br>
      <p>السيد  <b>'.$fullname.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكن ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيدة <b>'.$fullname2.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكنة ب '.$address2.'، لا تستفيد من الصندوق الوطني للضمان الاجتماعي ما يزيد عن  <b>'.$duration.'</b> لحد الآن، متوقفة عن العمل (عاطلة) وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}else if ($sexe == "femme" && $sexe2 == "homme") {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقعة أسفله: </u></p><br>
      <p>السيدة  <b>'.$fullname.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكنة ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيد <b>'.$fullname2.'</b>، الحامل لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكن ب '.$address2.'، لا يستفيد من الصندوق الوطني للضمان الاجتماعي ما يزيد عن  <b>'.$duration.'</b> لحد الآن، متوقف عن العمل (عاطل)، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>

      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}else if ($sexe == "femme" && $sexe2 == "femme") {

		$stmt = $conn->prepare("insert into chomage2(fullname, cin, address, sexe, relation ,fullname2, cin2 ,address2 ,duration ,sexe2 ,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssssss", $fullname, $cin, $address, $sexe, $relation ,$fullname2, $cin2 ,$address2 ,$duration ,$sexe2 ,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '
		<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>إشهـــــاد بعدم العمل </u></h1>
      <p><u>أنا الموقعة أسفله: </u></p><br>
      <p>السيدة  <b>'.$fullname.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin.'</b>، والساكنة ب '.$address.'</p>
      <p>أشهد على نفسي وبكـــل مؤهلاتي الصحيــــة والعقلية أن  <b>'.$relation.'</b> السيدة <b>'.$fullname2.'</b>، الحاملة لبطاقة التعريف الوطنية رقم: <b>'.$cin2.'</b>، الساكنة ب '.$address2.'، لا تستفيد من الصندوق الوطني للضمان الاجتماعي ما يزيد عن  <b>'.$duration.'</b> لحد الآن، متوقفة عن العمل (عاطلة)، وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>أمضيت هذا الإشهاد قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>حرر في: '.$date.'.</p>
      <p  style="text-align: center;">إمضاء:</p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
</html>';
		$stmt->close();
		$conn->close();
	}
?>