<?php
	$sexe = $_POST['sexe'];
	$fullname = $_POST['fullname'];
	$cin = $_POST['cin'];
	$address = $_POST['address'];
	$relation = $_POST['relation'];
	$louer = $_POST['louer'];
	$sexe1 = $_POST['sexe1'];
	$fullname1 = $_POST['fullname1'];
	$other = $_POST['other'];
	$ville = $_POST['ville'];
	$date = $_POST['date'];
	

// Database connection
	$conn =new mysqli('localhost','id16202654_farahii','Mohamed@00740902','id16202654_farahistore');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else if (empty($sexe)) {
		header("Location: home3.php?error=المرجو ادخال  الجنس");
	    exit();
	} else if (empty($fullname)) {
		header("Location: home3.php?error=المرجو ادخال الاسم الكامل");
	    exit();
	}else if (empty($cin)) {
		header("Location: home3.php?error=المرجو ادخال  رقم البطاقة الوطنية");
	    exit();
	}else if (empty($address)) {
		header("Location: home3.php?error=المرجو ادخال  العنوان");
	    exit();
	}else if (empty($relation) && !(isset($louer))) {
		header("Location: home3.php?error=المرجو تحديد  العلاقة");
	    exit();
	}else if (!(empty($relation)) && (isset($louer))) {
		header("Location: home3.php?error=لا يجوز ادخال العلاقة والنقر على مكتري في نفس الوقت");
	    exit();
	}else if (empty($sexe1)) {
		header("Location: home3.php?error=المرجو ادخال  الجنس");
	    exit();
	}else if (empty($fullname1)) {
		header("Location: home3.php?error=المرجو ادخال الاسم الكامل");
	    exit();
	}else if (!(isset($other))) {
		header("Location: home3.php?error=المرجو تحديد سبب الالتزام");
	    exit();
	}else if (empty($ville)) {
		header("Location: home3.php?error=المرجو ادخال مكان التحرير");
	    exit();
	}else if (empty($date)) {
		header("Location: home3.php?error=المرجو ادخال  تاريخ التحرير");
	    exit();
	}
	/* G / LOUER / G / OTHER */
	else if ($sexe == "homme" && empty($relation) && isset($louer) && $sexe1 == "homme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته مكتري. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}
	

	/* G / LOUER / F / OTHER */
	else if ($sexe == "homme" && empty($relation) && isset($louer) && $sexe1 == "femme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها مكترية. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / LOUER / G / OTHER */
	else if ($sexe == "femme" && empty($relation) && isset($louer) && $sexe1 == "homme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته مكتري. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / LOUER / F / OTHER */
	else if ($sexe == "femme" && empty($relation) && isset($louer) && $sexe1 == "femme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها مكترية. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}

















	/* G / LOUER / G / CIN */
	else if ($sexe == "homme" && empty($relation) && isset($louer) && $sexe1 == "homme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته مكتري. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}
	

	/* G / LOUER / F / CIN */
	else if ($sexe == "homme" && empty($relation) && isset($louer) && $sexe1 == "femme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها مكترية. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / LOUER / G / CIN */
	else if ($sexe == "femme" && empty($relation) && isset($louer) && $sexe1 == "homme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته مكتري. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / LOUER / F / CIN */
	else if ($sexe == "femme" && empty($relation) && isset($louer) && $sexe1 == "femme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها مكترية. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}

















	/* G / FAM / G / CIN */
	else if ($sexe == "homme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "homme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}
	

	/* G / FAM / F / CIN */
	else if ($sexe == "homme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "femme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / FAM / G / CIN */
	else if ($sexe == "femme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "homme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / FAM / F / CIN */
	else if ($sexe == "femme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "femme" && $other == "للحصول على بطاقة التعريف الوطنيةs") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به للحصول على بطاقة التعريف الوطنية.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}
















	/* G / FAM / G / OTHER */
	else if ($sexe == "homme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "homme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}
	

	/* G / FAM / F / OTHER */
	else if ($sexe == "homme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "femme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقع أسفله:</u></p><br>
      <p>السيد '.$fullname.'، الحامل لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكن: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / FAM / G / OTHER */
	else if ($sexe == "femme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "homme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيد '.$fullname1.'، بأنه يقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفته '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم له هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}



	/* F / FAM / F / OTHER */
	else if ($sexe == "femme" && !(empty($relation)) && !(isset($louer)) && $sexe1 == "femme" && $other == "عند الاقتضاء والحاجة") {
		$stmt = $conn->prepare("insert into logement(sexe,fullname,cin,address,sexe1,fullname1,relation,ville,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("sssssssss", $sexe,$fullname,$cin,$address,$sexe1,$fullname1,$relation,$ville,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo '<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<title>CONFIRMATION</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
      <h1><u>الــتــــــزام السـكـــن</u></h1>
      <p><u>أنا الموقعة أسفله:</u></p><br>
      <p>السيدة '.$fullname.'، الحاملة لبطاقة التعريف الوطنية رقم:'.$cin.' ، والساكنة: '.$address.'</p>
      <p>أشهد على نفسي وبكل مؤهلاتي الصحية والعقلية ومقومات التمييـز والإدراك أنني التزم للسيدة '.$fullname1.'، بأنها تقطن معي في المحل السكني المذكور أعلاه  ('.$address.'  ) بصفتها '.$relation.'. وأتحمل أي مسؤولية مخالفة لهذا التصريح.</p><br>
      <p>سلم لها هذا الالتزام  قصد الإدلاء به عند الاقتضاء والحاجة.</p>
      <p>'.$ville.' في: '.$date.'</p>
      <p  style="text-align: center;"><u>الإمضاء:</u></p>
      <p style="text-align: center;">'.$fullname.'</p>
      <p style="text-align: center;">'.$cin.'</p>
      <form><input type="button" class="ecran" value="تأكيد النسخ" onClick="window.print()"></form>
</body>
';
		$stmt->close();
		$conn->close();
	}
?>